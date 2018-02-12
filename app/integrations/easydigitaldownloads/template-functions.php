<?php
/**
 * Easy Digtal Downloads template functions.
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

function bigbox_edd_get_payment() {
	return bigbox_edd_get_purchase();
}

/**
 * Get a user's theme purchase.
 *
 * @todo Cache... handle non-complete orders.
 *
 * @since 1.0.0
 *
 * @return false|EDD_Payment False if no payment is found.
 */
function bigbox_edd_get_purchase() {
	$payment  = false;
	$payments = edd_get_users_purchases( get_current_user_id(), 20, true, array( 'publish', 'pending', 'failed', 'abandoned', 'processing' ) );

	if ( ! $payments ) {
		return false;
	}

	// Assume we only have one... might chagne...
	foreach ( $payments as $payment ) {
		$payment = new EDD_Payment( $payment->ID );

		continue;
	}

	return $payment;
}

/**
 * Get a user's license.
 *
 * @since 1.0.0
 *
 * @return false|EDD_SL_License False if no license is found.
 */
function bigbox_edd_get_license() {
	$license = false;
	$payment = bigbox_edd_get_purchase();

	$licensing = edd_software_licensing();
	$licenses  = $licensing->get_licenses_of_purchase( $payment->ID );

	if ( ! $licenses ) {
		return $license;
	}

	return current( $licenses );
}

/**
 * Get a user's download.
 *
 * @since 1.0.0
 *
 * @return false|array. False if no download is found.
 */
function bigbox_edd_get_download() {
	$downloa  = false;
	$purchase = bigbox_edd_get_purchase();

	$downloads = edd_get_payment_meta_cart_details( $purchase->ID, true );

	if ( empty( $downloads ) ) {
		return $download;
	}

	$download = current( $downloads );

	return $download;
}

/**
 * Get a user's download URL.
 *
 * @since 1.0.0
 *
 * @return false|string False if no download URL is found.
 */
function bigbox_edd_get_download_url() {
	$url = false;

	$purchase = bigbox_edd_get_purchase();
	$download = bigbox_edd_get_download();

	$price_id      = edd_get_cart_item_price_id( $download );
	$purchase_data = edd_get_payment_meta( $purchase->ID );
	$email         = edd_get_payment_user_email( $purchase->ID );
	$files         = edd_get_download_files( $download['id'], 0 );

	foreach ( $files as $filekey => $file ) {
		$url = edd_get_download_file_url( $purchase_data['key'], $email, $filekey, $download['id'], $price_id );

		continue;
	}

	return $url;
}

/**
 * Get a user's download version.
 *
 * @since 1.0.0
 *
 * @return false|string False if no download is found.
 */
function bigbox_edd_get_download_version() {
	$download = bigbox_edd_get_download();

	return get_post_meta( $download['id'], '_edd_sl_version', true );
}

/**
 * Get a user's subscription.
 *
 * @since 1.0.0
 *
 * @return false|EDD_Subscription False if no subscription is found.
 */
function bigbox_edd_get_subscription() {
	$subscription = false;
	$purchase     = bigbox_edd_get_purchase();

	$subscriber    = new EDD_Recurring_Subscriber( get_current_user_id(), true );
	$subscriptions = $subscriber->get_subscriptions( 0, [ 'active', 'expired', 'cancelled', 'failing', 'trialling' ] );

	if ( ! $subscriptions ) {
		return $subscription;
	}

	return current( $subscriptions );
}

/**
 * Get the URL for a download receipt.
 *
 * @since 1.0.0
 *
 * @return string URL to receipt.
 */
function bigbox_edd_get_receipt_url() {
	$purchase = bigbox_edd_get_purchase();

	return esc_url( add_query_arg( 'payment_key', $purchase->key, home_url( '/account/receipt/' ) ) );
}
