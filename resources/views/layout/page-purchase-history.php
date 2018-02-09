<?php
/**
 * Template Name: Page: Purchase History
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

if ( ! is_user_logged_in() ) :
	echo do_shortcode( '[edd_login redirect="/checkout/purchase-history/"]' );
else :
	$files    = array();
	$payments = edd_get_users_purchases( get_current_user_id(), 20, true, 'any' );

	if ( ! $payments ) :
		edd_get_template_part( 'purchase-history/not-found' );
	else :
		global $license;

		foreach ( $payments as $payment ) :
			$payment       = new EDD_Payment( $payment->ID );
			$price_id      = edd_get_cart_item_price_id( $download );
			$downloads     = edd_get_payment_meta_cart_details( $payment->ID, true );
			$purchase_data = edd_get_payment_meta( $payment->ID );
			$email         = edd_get_payment_user_email( $payment->ID );

			if ( empty( $downloads ) ) {
				continue;
			}

			$download = current( $downloads );
			$files    = edd_get_download_files( $download['id'], 0 );

			foreach ( $files as $filekey => $file ) :
				$file = edd_get_download_file_url( $purchase_data['key'], $email, $filekey, $download['id'], $price_id );
			endforeach;

			$licensing = edd_software_licensing();
			$licenses  = $licensing->get_licenses_of_purchase( $payment->ID );
			$license   = current( $licenses );
		endforeach;

		edd_get_template_part( 'purchase-history/hero' );
?>

<div id="features" class="block">
	<div class="container features__container">

		<ul class="feature-list">

			<li class="feature-item feature-item--overlay col-lg-3">
				<a href="<?php echo esc_url( $file ); ?>" class="feature-item__content">
					<?php bigbox_svg( 'illustration-hacker' ); ?>
					<h4>Download BigBox</h4>
					<span class="pill"><?php echo esc_html( get_post_meta( $download['id'], '_edd_sl_version', true ) ); ?></span>
				</a>
			</li>

			<li class="feature-item feature-item--overlay col-lg-3">
				<div class="feature-item__content">
					<?php bigbox_svg( 'illustration-hand' ); ?>
					<h4>View the Documentation</h4>
				</div>
			</li>

			<li class="feature-item feature-item--overlay col-lg-3">
				<div class="feature-item__content">
					<?php bigbox_svg( 'illustration-globe' ); ?>
					<h4>Contact Technical Support</h4>
				</div>
			</li>

			<li class="feature-item feature-item--overlay col-lg-3">
				<div class="feature-item__content">
					<?php bigbox_svg( 'illustration-ipod' ); ?>
					<h4>View Receipt &amp; Manage Subscription</h4>
				</div>
			</li>

		</ul>
	</div>
</div>

<?php
	endif;
endif;

bigbox_view( 'global/footer' );
