<?php

add_action( 'after_setup_theme', function () {

	load_theme_textdomain( 'gutenberg-starter-theme-blocks', get_template_directory() . '/languages' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	//add_theme_support( 'custom-background' );
	//add_theme_support( 'custom-header' );
	//add_theme_support( 'custom-logo' );
	//add_theme_support( 'customize-selective-refresh-widgets' );
	//add_theme_support( 'disable-custom-colors' );
	//add_theme_support( 'disable-custom-gradients' );
	//add_theme_support('disable-custom-font-sizes');
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'strong magenta', 'themeLangDomain' ),
				'slug'  => 'strong-magenta',
				'color' => '#a156b4',
			),
		)
	);
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => __( 'Small', 'themeLangDomain' ),
				'size' => 12,
				'slug' => 'small'
			),
		)
	);
	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name'     => __( 'Vivid cyan blue to vivid purple', 'themeLangDomain' ),
				'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
				'slug'     => 'vivid-cyan-blue-to-vivid-purple'
			),
		)
	);
	add_theme_support( 'editor-styles' );
	//add_theme_support( 'dark-editor-style' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	//add_theme_support( 'post-formats' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	//add_theme_support( 'starter-content' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );

	add_editor_style( 'style-editor.css' );

} );
