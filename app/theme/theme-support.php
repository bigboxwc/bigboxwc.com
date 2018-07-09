<?php
/**
 * WordPress features.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Declare view support for various built in WordPress features.
 *
 * @since 1.0.0
 */
function bigbox_add_theme_support() {
	// Set the default content width.
	$GLOBALS['content_width'] = 730;

	add_theme_support( 'title-tag' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support(
		'html5', [
			'search-form',
			'comment-form',
			'commentlist',
			'gallery',
			'caption',
		]
	);

	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'gutenberg' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-color-palette', [] );
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'bigbox_add_theme_support' );
