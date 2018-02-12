<?php
/**
 * Gravity Forms template functions.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Integration
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Modify Gravity Forms input classes.
 *
 * @since 1.0.0
 *
 * @param string $classes List of classes.
 * @return string
 */
function bigbox_gform_field_css_class( $classes ) {
	// $classes .= ' form-input';

	return $classes;
}
