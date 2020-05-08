<?php

add_action( 'init', function () {

	register_block_type( 'wpscholar/site-description', [
		'render_callback' => function () {
			return get_bloginfo( 'description' );
		}
	] );

} );
