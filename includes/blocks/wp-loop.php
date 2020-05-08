<?php

use wpscholar\WordPress\Context;

use function wpscholar\BlockTheme\get_block_template_part;

add_action( 'init', function () {

	register_block_type( 'wpscholar/loop', [
		'render_callback' => function () {
			$loop = '';

			$prefix  = is_singular() ? 'content' : 'entry';
			$context = Context::getContext();

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();

					if ( is_home() || is_archive() || is_search() ) {
						$context = Context::getSingleContext();
						if ( get_post_type() == 'page' ) {
							$context = Context::getPageContext();
						}
						$context[] = 'singular';
					}

					$loop .= get_block_template_part( $prefix, $context );
				}
			} else {
				$loop = 'No posts found.';
			}

			return $loop;
		}
	] );

} );
