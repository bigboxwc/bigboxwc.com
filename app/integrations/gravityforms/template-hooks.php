<?php
/**
 * Gravity Forms template hooks.
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

// Add `form-input` to fields.
add_filter( 'gform_field_css_class', 'bigbox_gform_field_css_class' );
