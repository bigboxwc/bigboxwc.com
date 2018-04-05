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

/**
 * Dynamically load authorized website licenses.
 *
 * @since 1.0.0
 *
 * @param array $form Form to check.
 */
add_filter( 'gform_pre_render', function( $form ) {
	$fields = $form['fields'];

	foreach ( $fields as $field ) {
		if ( 'sites' !== $field->inputName ) {
			continue;
		}

		$license = bigbox_edd_get_license();

		if ( $license->sites ) {
			foreach ( $license->sites as $site ) {
				$field->choices[] = [
					'value' => esc_url( $site ),
					'text'  => esc_url( $site ),
				];
			}
		}
	}

	return $form;
} );

/**
 * Populate a `license` field with the current license.
 *
 * @since 1.0.0
 *
 * @param string $value Current value.
 * @return string
 */
add_filter( 'gform_field_value_license', function( $value ) {
	$license = bigbox_edd_get_license();

	return $license->key;
} );

/**
 * Populate a `subscription_id` field with the current subscription ID.
 *
 * @since 1.0.0
 *
 * @param string $value Current value.
 * @return string
 */
add_filter( 'gform_field_value_subscription_id', function( $value ) {
	$subscription = bigbox_edd_get_subscription();

	return $subscription->id;
} );
