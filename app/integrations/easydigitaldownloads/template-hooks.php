<?php
/**
 * Easy Digtal Downloads template hooks.
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
 * Checkout cleanup
 */

// Remove auto output.
remove_action( 'edd_purchase_form_after_user_info', 'edd_user_info_fields' );
remove_action( 'edd_register_fields_before', 'edd_user_info_fields' );
remove_action( 'edd_after_cc_fields', 'edd_default_cc_address_fields' );
remove_action( 'edd_purchase_form_before_submit', 'edd_checkout_final_total', 999 );
remove_action( 'edd_purchase_form_register_fields', 'edd_get_register_fields' );
remove_action( 'edd_purchase_form_after_cc_form', 'edd_checkout_submit', 9999 );

// Custom Stripe credit card field.
remove_action( 'edd_stripe_cc_form', 'edds_credit_card_form' );
add_action( 'edd_stripe_cc_form', 'bigbox_edd_stripe_cc_form' );

// Add custom output to gateway selection.
add_action( 'edd_purchase_form', 'bigbox_edd_purchase_form_before', 1 );
add_action( 'edd_purchase_form', 'edd_checkout_hidden_fields' );

// Remove empty states (messes with Choices script).
add_filter(
	'edd_shop_states', function( $states ) {
		return array_filter( $states );
	}
);

// Remove required fields.
add_filter(
	'edd_purchase_form_required_fields', function( $fields ) {
		unset( $fields['edd_email'] );
		unset( $fields['edd_first'] );

		return $fields;
	}
);

// No need to log in.
add_filter( 'edd_logged_in_only', '__return_false', 99 );

// Clear cart when upgrading.
add_action( 'edd_sl_license_upgrade', function() {
	edd_empty_cart();
}, 1 );

// Map email to inputted login name.
add_action(
	'edd_pre_process_purchase', function() {
		$_POST['edd_email'] = $_POST['edd_user_login'];
		$_POST['edd_first'] = explode( '@', $_POST['edd_user_login'] )[0];
	}
);

// Move Mailchimp subscription form.
add_action( 'bigbox_after_billing_information', function() {
	global $eddmc;

	if ( $eddmc ) {
		echo $eddmc::$checkout->checkout_fields();
	}
} );
