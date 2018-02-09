<?php
/**
 * Template Name: Page: Receipt
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

bigbox_view( 'global/header-min' );

$session = edd_get_purchase_session();

// @codingStandardsIgnoreStart
if ( isset( $_GET['payment_key'] ) ) {
	$payment_key = urldecode( $_GET['payment_key'] );
} else if ( $session ) {
	$payment_key = $session['purchase_key'];
}
// @codingStandardsIgnoreEnd

global $payment_id;
$payment_id = edd_get_purchase_id_by_key( $payment_key );

if ( ! $payment_id ) :
	edd_get_template_part( 'receipt/not-found' );
	return;
endif;

edd_get_template_part( 'receipt/hero' );
edd_get_template_part( 'receipt/next-steps' );
bigbox_partial( 'from-the-blog' );

bigbox_view( 'global/footer' );
