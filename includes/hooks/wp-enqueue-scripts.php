<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( basename( __DIR__ ), get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
} );
