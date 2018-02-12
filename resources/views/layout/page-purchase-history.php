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
?>

<div class="block block--alt">
	<?php echo do_shortcode( '[edd_login redirect="/account/"]' ); ?>
</div>

<?php
else :
	$payment = bigbox_edd_get_payment();

	if ( ! $payment ) :
		bigbox_partial( 'edd/purchase-history/not-found' );
	elseif ( 'publish' !== $payment->status ) :
		if ( $payment->is_recoverable() ) :
			bigbox_partial( 'edd/purchase-history/recover' );
		else :
			bigbox_partial( 'edd/purchase-history/not-found' );
		endif;
	else :
		bigbox_partial( 'edd/purchase-history/hero' );
?>

<div id="features" class="block">
	<div class="container features__container">

		<ul class="feature-list">

			<li class="feature-item feature-item--overlay col-lg-3">
				<a href="<?php echo esc_url( bigbox_edd_get_download_url() ); ?>" class="feature-item__content">
					<?php bigbox_svg( 'illustration-hacker' ); ?>
					<h4>Download BigBox</h4>
					<span class="pill"><?php echo esc_html( bigbox_edd_get_download_version() ); ?></span>
				</a>
			</li>

			<li class="feature-item feature-item--overlay col-lg-3">
				<a href="/docs/" class="feature-item__content">
					<?php bigbox_svg( 'illustration-hand' ); ?>
					<h4>View the Documentation</h4>
				</a>
			</li>

			<li class="feature-item feature-item--overlay col-lg-3">
				<a href="/support/" class="feature-item__content">
					<?php bigbox_svg( 'illustration-globe' ); ?>
					<h4>Contact Technical Support</h4>
				</a>
			</li>

			<li class="feature-item feature-item--overlay col-lg-3">
				<a href="<?php echo esc_url( bigbox_edd_get_receipt_url() ); ?>" class="feature-item__content">
					<?php bigbox_svg( 'illustration-ipod' ); ?>
					<h4>View Receipt &amp; Manage Subscription</h4>
				</a>
			</li>

		</ul>
	</div>
</div>

<?php
	endif;
endif;

bigbox_view( 'global/footer' );
