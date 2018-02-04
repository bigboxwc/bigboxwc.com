<?php
/**
 * Load public assets.
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
 * Enqueue styles.
 *
 * @since 1.0.0
 */
function bigbox_enqueue_styles() {
	$version    = bigbox_get_theme_version();
	$stylesheet = 'bigbox';

	$deps = array();

	wp_enqueue_style( 'select2' );
	wp_enqueue_style( $stylesheet . '-fonts', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Lato' );
	wp_enqueue_style( $stylesheet, get_template_directory_uri() . '/public/css/app.min.css', $deps, $version );
}
add_action( 'wp_enqueue_scripts', 'bigbox_enqueue_styles' );

/**
 * Enqueue scripts.
 *
 * @since 1.0.0
 */
function bigbox_enqueue_scripts() {
	$version    = bigbox_get_theme_version();
	$stylesheet = 'bigbox';

	$deps = array(
		'wp-util',
	);

	// Combined application scripts. See `gulpfile.js` for more.
	wp_enqueue_script( $stylesheet, get_template_directory_uri() . '/public/js/app.min.js', $deps, $version, true );

	// Send information to application scripts.
	wp_localize_script(
		$stylesheet, 'BigBox', apply_filters(
			'bigbox_i18n', array(
				'loginModalLinks' => array(
					'[href="' . wp_login_url() . '"]',
					'[href^="' . wp_login_url() . '?redirect_to"]',
				),
			)
		)
	);
}
add_action( 'wp_enqueue_scripts', 'bigbox_enqueue_scripts' );
