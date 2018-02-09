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

$purchases = edd_get_users_purchases( get_current_user_id(), 1, true, 'any' );

if ( is_user_logged_in() && $purchases ) {
	wp_safe_redirect( get_permalink( edd_get_option( 'purchase_history_page' ) ) );
	edd_die();
}

$payment_mode = edd_get_chosen_gateway();
$form_action  = esc_url( edd_get_checkout_uri( 'payment-mode=' . $payment_mode ) );

bigbox_view( 'global/header-min' ); ?>

<div class="container">
	<div class="block">

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

						<?php edd_get_template_part( 'checkout/account-information' ); ?>

						<div id="edd_cc_fields" class="edd-do-validate">
							<?php
							edd_get_template_part( 'checkout/billing-information' );
							edd_get_template_part( 'checkout/order-summary' );
							edd_get_template_part( 'checkout/gateway-select' );
							edd_checkout_hidden_fields();
							?>
						</div>

						<div id="edd_purchase_submit">
							<?php echo edd_checkout_button_purchase(); // @codingStandardsIgnoreLine ?>
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
