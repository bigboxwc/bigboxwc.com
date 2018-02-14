<?php
/**
 * Template Name: Page: Purchase Confirmation
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

$payment = bigbox_edd_get_payment();
$license = bigbox_edd_get_license();

if ( ! $payment ) :
	bigbox_partial( 'edd/payment/not-found' );
elseif ( 'publish' !== $payment->status ) :
	if ( $payment->is_recoverable() ) :
		bigbox_partial( 'edd/payment/recover' );
	else :
		bigbox_partial( 'edd/payment/not-found' );
	endif;
else :
	bigbox_partial( 'edd/purchase-confirmation/hero' );
	bigbox_partial( 'edd/purchase-confirmation/next-steps', [
		'license' => $license,
	] );
endif;

bigbox_view( 'global/footer' );
