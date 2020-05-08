<?php

add_action( 'init', function () {

	register_block_type( 'wpscholar/post-title-link', [
		'render_callback' => function () {
			return '<a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a>';
		}
	] );

} );
