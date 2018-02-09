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

$purchases = edd_get_users_purchases( get_current_user_id(), 1, true, 'any' );

if ( is_user_logged_in() && $purchases ) {
	wp_safe_redirect( get_permalink( edd_get_option( 'purchase_history_page' ) ) );
	edd_die();
}

global $wpdb;

$download = $wpdb->get_var( "SELECT ID from {$wpdb->prefix}posts WHERE post_type = 'download' AND post_status = 'publish'" );

if ( $download ) {
	edd_empty_cart();
	edd_add_to_cart( $download, array() );
	wp_safe_redirect( edd_get_checkout_uri() );
	edd_die();
} else {
	edd_empty_cart();
	wp_safe_redirect( home_url() );
	edd_die();
}
