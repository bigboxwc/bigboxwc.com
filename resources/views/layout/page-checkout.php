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

if ( empty( edd_get_cart_contents() ) ) :
	wp_safe_redirect( home_url( '/' ) );
	exit;
endif;

$payment_mode = edd_get_chosen_gateway();
$form_action  = esc_url( edd_get_checkout_uri( 'payment-mode=' . $payment_mode ) );

bigbox_view(
	'global/header', [
		'min' => true,
	]
); ?>

<div class="block block--alt checkout">
	<div class="container">

		<div class="block-header">
			<h1 class="block-title">BigBox WooCommerce Theme</h3>
			<p class="block-subtitle">Complete your <u>secure</u> purchase below.</p>
		</div>

		<div class="row justify-content-center">
			<div id="edd_checkout_wrap" class="col-lg-8">
				<?php do_action( 'edd_print_errors' ); ?>

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

	</div>
</div>

<?php bigbox_view( 'global/footer-min' ); ?>
