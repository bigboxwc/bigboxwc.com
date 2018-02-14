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

	$deps = [];

	wp_enqueue_style( 'select2' );
	wp_enqueue_style( $stylesheet . '-fonts', 'https://fonts.googleapis.com/css?family=Lora:700|Lato:300,400,700' );
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

	$deps = [
		'wp-util',
		'wp-api',
	];

	// Combined application scripts. See `gulpfile.js` for more.
	wp_enqueue_script( $stylesheet, get_template_directory_uri() . '/public/js/app.min.js', $deps, $version, true );

	// Send information to application scripts.
	wp_localize_script(
		$stylesheet, 'BigBox', apply_filters(
			'bigbox_i18n', [
				'loginModalLinks' => [
					'[href="' . wp_login_url() . '"]',
					'[href^="' . wp_login_url() . '?redirect_to"]',
				],
			]
		)
	);
}
add_action( 'wp_enqueue_scripts', 'bigbox_enqueue_scripts' );

/**
 * Load script templates.
 *
 * @since 1.0.0
 */
function bigbox_enqueue_tmpls() {
	bigbox_view( 'tmpl/tmpl-modal' );
}
add_action( 'wp_footer', 'bigbox_enqueue_tmpls' );
