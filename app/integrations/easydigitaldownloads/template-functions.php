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

/**
 * Custom Stripe credit card form.
 *
 * @since 1.0.0
 */
function bigbox_edd_stripe_cc_form() {
	bigbox_partial( 'edd/checkout/credit-card-form' );
}

/**
 * Custom purchase form fields.
 *
 * When PayPal is being used add a custom note. Always add custom hidden fields
 * to ensure the current gateway is known.
 *
 * @since 1.0.0
 */
function bigbox_edd_purchase_form() {
	if ( isset( $_POST['edd_payment_mode'] ) && 'paypal' === $_POST['edd_payment_mode'] ) { // @codingStandardsIgnoreLine
		echo '<p style="margin-bottom: 2rem;">';
		echo 'You will be redirected to PayPal to complete your purchase.';
		echo '</p>';
	}

	edd_checkout_hidden_fields();
}

/**
 * See if our payment is all good to go.
 *
 * @since 1.0.0
 *
 * @param array $data Account data.
 * @return string
 */
function bigbox_edd_allgood( $data = [] ) {
	ob_start();

	$data = wp_parse_args(
		$data, [
			'payment'      => bigbox_edd_get_payment(),
			'license'      => bigbox_edd_get_license(),
			'subscription' => bigbox_edd_get_subscription(),
		]
	);

	if ( ! $data['payment'] ) : // We got nothing.
		bigbox_partial( 'edd/payment/not-found' );
	elseif ( $data['license'] && ! in_array( $data['license']->status, [ 'active', 'inactive' ], true ) ) : // Expired license.
		bigbox_partial(
			'edd/payment/renew-license', [
				'license' => $data['license'],
			]
		);
	elseif ( 'publish' !== $data['payment']->status ) : // Refunded or incomplete.
		if ( $data['payment']->is_recoverable() ) :
			bigbox_partial(
				'edd/payment/recover', [
					'payment' => $data['payment'],
				]
			);
		else :
			bigbox_partial( 'edd/payment/not-found' );
		endif;
	endif;

	return ob_get_clean();
}

/**
 * Get a user's theme purchase.
 *
 * @since 1.0.0
 *
 * @return false|EDD_Payment False if no payment is found.
 */
function bigbox_edd_get_payment() {
	$payment = wp_cache_get( 'payment', 'bigbox' );

	if ( ! $payment ) {
		$payments = edd_get_users_purchases( get_current_user_id(), 1, true, array( 'publish', 'pending', 'failed', 'abandoned', 'processing' ) );

		if ( ! $payments ) {
			return false;
		}

		$payment = new EDD_Payment( current( $payments )->ID );

		wp_cache_set( 'payment', $payment, 'bigbox' );
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
	$payment = bigbox_edd_get_payment();

	if ( ! $payment ) {
		return $license;
	}

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
	$download = false;
	$payment  = bigbox_edd_get_payment();

	$downloads = edd_get_payment_meta_cart_details( $payment->ID, true );

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

	$payment  = bigbox_edd_get_payment();
	$download = bigbox_edd_get_download();

	$price_id     = edd_get_cart_item_price_id( $download );
	$payment_data = edd_get_payment_meta( $payment->ID );
	$email        = edd_get_payment_user_email( $payment->ID );
	$files        = edd_get_download_files( $download['id'], 0 );

	foreach ( $files as $filekey => $file ) {
		$url = edd_get_download_file_url( $payment_data['key'], $email, $filekey, $download['id'], $price_id );

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
	$payment      = bigbox_edd_get_payment();

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
	$payment = bigbox_edd_get_payment();

	return esc_url( add_query_arg( 'payment_key', $payment->key, home_url( '/account/receipt/' ) ) );
}
