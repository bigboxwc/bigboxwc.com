<?php
/**
 * Template tag helpers.
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
 * Return the current version of the parent theme.
 *
 * @since 1.0.0
 *
 * @return string
 */
function bigbox_get_theme_version() {
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		return time();
	}

	$version = wp_get_theme()->Version;

	if ( wp_get_theme()->parent() ) {
		$version = wp_get_theme()->parent()->Version;
	}

	return $version;
}

/**
 * Locate a piece of template.
 *
 * @since 1.0.0
 *
 * @param string|array $templates The name of the template.
 * @param array        $args Variables to pass to partial.
 */
function bigbox_view( $templates, $args = [] ) {
	if ( ! is_array( $templates ) ) {
		$templates = [ $templates ];
	}

	// Extract variable to use in template file.
	if ( ! empty( $args ) && is_array( $args ) ) {
		extract( $args ); // @codingStandardsIgnoreLine
	}

	$_templates = [];

	foreach ( $templates as $key => $template_name ) {
		$_templates[] = $template_name . '.php';
		$_templates[] = 'resources/views/' . $template_name . '.php';
	}

	locate_template( $_templates, true, false );
}

/**
 * Output a partial.
 *
 * @since 1.0.0
 *
 * @param string $partial The file name of the partial to load.
 * @param array  $args Variables to pass to partial.
 */
function bigbox_partial( $partial, $args = [] ) {
	echo bigbox_get_partial( $partial, $args ); // XSS: ok.
}

/**
 * Load a template partial in to the output buffer.
 *
 * This serves mainly as an alias for `bigbox_view()` but always looks
 * in the `/partials` directory.
 *
 * @since 1.0.0
 *
 * @param string $partial The file name of the partial to load.
 * @param array  $args Variables to pass to partial.
 * @return string
 */
function bigbox_get_partial( $partial, $args = [] ) {
	ob_start();

	bigbox_view( 'partials/' . $partial, $args );

	return ob_get_clean();
}

/**
 * Echo SVG markup.
 *
 * @since 1.0.0
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 */
function bigbox_svg( $args = [] ) {
	echo bigbox_get_svg( $args ); // WPCS: XSS ok.
}

/**
 * Return SVG markup.
 *
 * @since 1.0.0
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function bigbox_get_svg( $args = [] ) {
	// A string passed is assumed the icon name.
	if ( ! is_array( $args ) ) {
		$icon         = $args;
		$args         = [];
		$args['icon'] = $icon;
	}

	$version = bigbox_get_theme_version();

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'bigbox' );
	}

	// Set defaults.
	$defaults = [
		'icon'     => '',
		'title'    => '',
		'desc'     => '',
		'fallback' => false,
		'classes'  => [],
	];

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Add default classes.
	$args['classes'][] = 'icon';

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="' . implode( ' ', $args['classes'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use xlink:href="' . get_template_directory_uri() . '/public/images/sprite.svg?v=' . $version . '#' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}
