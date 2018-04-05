<?php
/**
 * Buy redirect.
 *
 * Grabs the only EDD product and adds it to the cart.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

// @codingStandardsIgnoreFile
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$payment = bigbox_edd_get_payment();

if ( is_user_logged_in() && $payment && 'publish' === $payment->status ) {
	wp_safe_redirect( get_permalink( edd_get_option( 'purchase_history_page' ) ) );
	edd_die();
}

edd_empty_cart();

global $wpdb;

$download = $wpdb->get_var( "SELECT ID from {$wpdb->prefix}posts WHERE post_type = 'download' AND post_status = 'publish'" );

if ( $download ) {
	edd_add_to_cart( $download, [
		'price_id' => isset( $_GET['price_id'] ) ? absint( $_GET['price_id'] ) : null,
	] );

	wp_safe_redirect( edd_get_checkout_uri() );
	edd_die();
} else {
	wp_safe_redirect( home_url() );

	edd_die();
}
