<?php

namespace wpscholar\BlockTheme;

use WP_Forge\Helpers\Arr;
use WP_Forge\Helpers\Str;

/**
 * Process a specific block template part.
 *
 * @param string $block
 *
 * @return string
 */
function do_block_template_part( $block ) {
	return do_blocks( sprintf( '<!-- wp:template-part {"slug":"%s","theme":"%s"} /-->', $block, wp_get_theme()->get_stylesheet() ) );
}

/**
 * Locate a block template part, process it, and return it.
 *
 * @param string $slug
 * @param string $name
 *
 * @return string
 */
function get_block_template_part( $slug, $name = null ) {
	$templates = [];
	if ( is_string( $name ) || is_array( $name ) ) {
		$templates = TemplateLoader::applyPrefix( Arr::wrap( $name ), "{$slug}-" );
	}
	$templates[] = $slug;

	$paths = TemplateLoader::getThemePaths( '/block-template-parts' );
	$found = TemplateLoader::locateTemplate( TemplateLoader::applySuffix( $templates, '.html' ), $paths );
	$block = Str::replaceLast( '.html', '', basename( $found ) );

	return do_block_template_part( $block );
}
