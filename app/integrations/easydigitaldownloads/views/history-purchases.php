<?php
/**
 * Purchase history.
 *
 * Currently assumes they can only buy the theme.
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

if ( ! is_user_logged_in() ) :
	echo do_shortcode( '[edd_login redirect="/checkout/purchase-history/"]' );
else :
	$payments = edd_get_users_purchases( get_current_user_id(), 20, true, 'any' );

	if ( ! $payments ) :
		edd_get_template_part( 'history/not-found' );
	else :
		edd_get_template_part( 'history/hero' );

		foreach ( $payments as $payment ) :
			$payment   = new EDD_Payment( $payment->ID );
			$downloads = edd_get_payment_meta_cart_details( $payment->ID, true );

			if ( empty( $downloads ) ) {
				continue;
			}

			$download = current( $downloads );
			$files    = edd_get_download_files( $download['id'], 0 );
		print_r( $files );
?>

<div id="features" class="block">
	<div class="container features__container">

		<div class="block-header">
			<h3 class="block-title">Your License Key</h3>
			<p class="block-subtitle">Your license key will automatically renew on February 5, 2019 for $108.</p>

			<input type"text" class="form-input next-steps__license-key" value="773fdc5472b77fb8ad7055a830710da9" onClick="this.select();" />
		</div>

		<ul class="feature-list">

			<li class="feature-item feature-item--overlay col-lg-3">
				<div class="feature-item__content">
					<?php bigbox_svg( 'illustration-hacker' ); ?>
					<h4>Download BigBox</h4>
					<span class="pill">v1.4.0</span>
				</div>
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
					<h4>View Purchase Receipt</h4>
				</div>
			</li>

		</ul>
	</div>
</div>

<?php
		endforeach;
	endif;
endif;
