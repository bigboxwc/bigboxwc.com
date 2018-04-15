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

	wp_enqueue_style( $stylesheet . '-fonts', 'https://fonts.googleapis.com/css?family=Lora:700|Varela+Round' );
	wp_enqueue_style( $stylesheet, get_template_directory_uri() . '/public/css/app.min.css', [], $version );
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

	// Support scripts.
	wp_register_script( $stylesheet . '-support', get_template_directory_uri() . '/public/js/support.min.js', [ $stylesheet ], $version, true );

	// Send information to application scripts.
	wp_localize_script(
		$stylesheet, 'BigBox', apply_filters(
			'bigbox_i18n', [
				'support' => [
					'apiRoot' => 'https://docs.bigboxwc.com/search/ajax',
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
