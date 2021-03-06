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

bigbox_view(
	'global/header', [
		'min' => true,
	]
);

if ( ! is_user_logged_in() ) :
?>

<div class="block block--alt">
	<?php echo do_shortcode( '[edd_login redirect="/account/"]' ); ?>
</div>

<?php
else :
	$license      = bigbox_edd_get_license();
	$subscription = bigbox_edd_get_subscription();

	$allgood = bigbox_edd_allgood( [
		'license'      => $license,
		'subscription' => $subscription,
	] );

	if ( '' !== $allgood ) :
		echo $allgood; // WPCS: XSS okay.
	else : // Valid payment.
		if ( $subscription && 'active' !== $subscription->status ) : // Subscription will end.
			bigbox_partial(
				'edd/payment/reactivate-subscription', [
					'subscription' => $subscription,
					'license'      => $license,
				]
			);
		else : // All good in the hood.
			bigbox_partial(
				'edd/purchase-history/hero', [
					'subscription' => $subscription,
					'license'      => $license,
				]
			);
		endif;
?>

<div id="features" class="block container features__container">

	<ul class="feature-list">

		<li class="feature-item feature-item--overlay col-sm-6 col-lg-3">
			<a href="<?php echo esc_url( bigbox_edd_get_download_url() ); ?>" class="feature-item__content">
				<?php bigbox_svg( 'illustration-download' ); ?>
				<h4>Download BigBox</h4>
				<span class="pill"><?php echo esc_html( bigbox_edd_get_download_version() ); ?></span>
			</a>
		</li>

		<li class="feature-item feature-item--overlay col-sm-6 col-lg-3">
			<a href="https://docs.bigboxwc.com/" class="feature-item__content">
				<?php bigbox_svg( 'illustration-teacher' ); ?>
				<h4>View the Documentation</h4>
			</a>
		</li>

		<li class="feature-item feature-item--overlay col-sm-6 col-lg-3">
			<a href="/account/support/" class="feature-item__content">
				<?php bigbox_svg( 'illustration-woman-support' ); ?>
				<h4>Contact Technical Support</h4>
			</a>
		</li>

		<li class="feature-item feature-item--overlay col-sm-6 col-lg-3">
			<a href="<?php echo esc_url( bigbox_edd_get_receipt_url() ); ?>" class="feature-item__content">
				<?php bigbox_svg( 'illustration-receipt' ); ?>
				<h4>View Receipt &amp; Manage Subscription</h4>
			</a>
		</li>

	</ul>

</div>

<?php
	endif;
endif;

bigbox_view( 'global/footer' );
