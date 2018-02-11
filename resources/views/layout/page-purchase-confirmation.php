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

$purchase = bigbox_edd_get_purchase();

if ( ! $purchase ) :
	edd_get_template_part( 'purchase-confirmation/not-found' );
elseif ( 'publish' !== $purchase->status ) :
	if ( $purchase->is_recoverable() ) :
		edd_get_template_part( 'purchase-confirmation/recover' );
	else :
		edd_get_template_part( 'purchase-confirmation/not-found' );
	endif;
else :
	edd_get_template_part( 'purchase-confirmation/hero' );
	edd_get_template_part( 'purchase-confirmation/next-steps' );
endif;

bigbox_view( 'global/footer' );
