<?php

namespace wpscholar\BlockTheme;

use WP_Forge\Helpers\Arr;
use WP_Forge\Helpers\Str;
use wpscholar\WordPress\Context;

/**
 * Class TemplateLoader
 *
 * @package wpscholar\BlockTheme
 */
class TemplateLoader {

	/**
	 * Get a collection of contextual theme template names.
	 *
	 * @param string $prefix
	 * @param string $suffix
	 *
	 * @return array
	 */
	public static function getContextualNames( $prefix = '', $suffix = '' ) {
		return self::applyPrefix( self::applySuffix( Context::getContext(), $suffix ), $prefix );
	}

	/**
	 * Get a collection of theme paths.
	 *
	 * @param string $relative_path
	 *
	 * @return array
	 */
	public static function getThemePaths( $relative_path = '' ) {
		$paths = [ STYLESHEETPATH, TEMPLATEPATH ];
		if ( $relative_path ) {
			$paths = self::applySuffix( $paths, Str::start( $relative_path, DIRECTORY_SEPARATOR ) );
		}

		return array_unique( array_map( 'wp_normalize_path', $paths ) );
	}

	/**
	 * Locate a template given multiple names and paths.
	 *
	 * @param array|string      $names
	 * @param array|string|null $paths
	 *
	 * @return string
	 */
	public static function locateTemplate( $names, $paths = null ) {

		if ( is_null( $paths ) ) {
			$paths = self::getThemePaths();
		}

		$names = Arr::wrap( $names );
		$paths = Arr::wrap( $paths );

		foreach ( $paths as $path ) {
			if ( ! $path ) {
				continue;
			}
			foreach ( $names as $name ) {
				if ( ! $name ) {
					continue;
				}
				$file_path = Str::finish( $path, DIRECTORY_SEPARATOR ) . $name;
				if ( file_exists( $file_path ) ) {
					return $file_path;
				}
			}
		}

		return '';
	}

	/**
	 * Helper function to apply a suffix to every string in an array.
	 *
	 * @param string[] $strings
	 * @param string   $suffix
	 *
	 * @return string[]
	 */
	public static function applySuffix( array $strings, $suffix ) {
		return array_map(
			function ( $string ) use ( $suffix ) {
				return Str::finish( $string, $suffix );
			},
			$strings
		);
	}

	/**
	 * Helper function to apply a prefix to every string in an array.
	 *
	 * @param string[] $strings
	 * @param string   $prefix
	 *
	 * @return string[]
	 */
	public static function applyPrefix( array $strings, $prefix ) {
		return array_map(
			function ( $string ) use ( $prefix ) {
				return Str::start( $string, $prefix );
			},
			$strings
		);
	}

}
