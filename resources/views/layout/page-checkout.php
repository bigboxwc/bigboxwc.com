<?php
/**
 * Template Name: Checkout
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

$license = bigbox_edd_get_license();

if ( is_user_logged_in() && $license && 'expired' !== $license->status ) {
	wp_safe_redirect( get_permalink( edd_get_option( 'purchase_history_page' ) ) );
	edd_die();
}

$payment_mode = edd_get_chosen_gateway();
$form_action  = esc_url( edd_get_checkout_uri( 'payment-mode=' . $payment_mode ) );

bigbox_view( 'global/header-min' ); ?>

<div class="block block--alt checkout">
	<div class="container">

		<?php if ( empty( edd_get_cart_contents() ) ) : ?>
			<?php esc_html_e( 'Nothing to purchase.', 'bigbox' ); ?>
		<?php else : ?>

		<div class="block-header">
			<h1 class="block-title">Complete Your Purchase</h3>
			<p class="block-subtitle">Your're on your way to a more scalable eCommerce solution.</p>
		</div>

		<div class="row justify-content-center">
			<div id="edd_checkout_wrap" class="col-lg-8">
				<div id="edd_checkout_form_wrap">

					<form id="edd_purchase_form" class="edd_form" action="<?php echo esc_attr( $form_action ); ?>" method="POST">

						<div id="checkout-errors"></div>

						<?php bigbox_partial( 'edd/checkout/account-information' ); ?>

						<div id="edd_cc_fields" class="edd-do-validate">
							<?php
							bigbox_partial( 'edd/checkout/billing-information' );
							bigbox_partial( 'edd/checkout/order-summary' );
							bigbox_partial( 'edd/checkout/gateway-select' );
							?>
						</div>

					</form>

				</div>
			</div>
		</div>

		<?php endif; ?>

	</div>
</div>

<?php
bigbox_view( 'global/footer-min' );
