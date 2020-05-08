<?php

// Load dependencies, if any.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require __DIR__ . '/vendor/autoload.php';
}

// Automatically load all PHP files in the '/includes' directory
$iterator = new RecursiveDirectoryIterator( __DIR__ . '/includes' );
foreach ( new RecursiveIteratorIterator( $iterator ) as $file ) {
	if ( $file->getExtension() === 'php' ) {
		require $file;
	}
}
