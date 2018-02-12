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

if ( ! is_user_logged_in() ) :
	echo do_shortcode( '[edd_login redirect="/checkout/payment-history/"]' );
else :
	$payment = bigbox_edd_get_payment();

	if ( ! $payment ) :
		bigbox_partial( 'edd/purchase-history/not-found' );
	else :
?>

<div class="block block--alt">

	<div class="block-header">
		<h1 class="block-title">Purchase Receipt</h3>
		<p class="block-subtitle">Details for your <?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $payment->date ) ) ); ?> payment.</p>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<p class="card__label">Purchase Details</p>

				<div class="card card__inner card__inner--mini">

					<div class="order-summary">

						<div class="order-summary__row">
							<span class="order-summary__label">Transaction ID</span>
							<span class="order-summary__value"><?php echo esc_html( $payment->key ); ?></span>
						</div>

						<div class="order-summary__row">
							<span class="order-summary__label">Status</span>
							<span class="order-summary__value order-summary__value--<?php echo esc_attr( edd_get_payment_status( $payment ) ); ?>"><?php echo esc_html( edd_get_payment_status( $payment, true ) ); ?></span>
						</div>

						<div class="order-summary__row">
							<span class="order-summary__label">Method</span>
							<span class="order-summary__value"><?php echo esc_html( edd_get_gateway_checkout_label( edd_get_payment_gateway( $payment->ID ) ) ); ?></span>
						</div>

						<?php
						if ( ( $fees = edd_get_payment_fees( $payment->ID, 'fee' ) ) ) :
							foreach ( $fees as $fee ) :
						?>

						<div class="order-summary__row">
							<span class="order-summary__label"><?php echo esc_html( $fee['label'] ); ?></span>
							<span class="order-summary__value"><?php echo esc_html( edd_currency_filter( edd_format_amount( $fee['amount'] ) ) ); ?></span>
						</div>

						<?php
							endforeach;
						endif;
						?>

						<div class="order-summary__row">
							<span class="order-summary__label"><?php echo esc_html__( 'Subtotal', 'bigbox' ); ?></span>
							<span class="order-summary__value"><?php echo esc_html( edd_payment_subtotal( $payment->ID ) ); ?></span>
						</div>

						<div class="order-summary__row">
							<span class="order-summary__label"><?php echo esc_html__( 'Total', 'bigbox' ); ?></span>
							<span class="order-summary__value"><strong><?php echo esc_html( edd_payment_amount( $payment->ID ) ); ?></strong></span>
						</div>

					</div>

				</div>

				<p class="card__label">Subscription Details</p>

				<div class="card card__inner card__inner--mini">
					<?php echo do_shortcode( '[edd_subscriptions]' ); ?>
				</div>

				<p><a href="<?php echo esc_url( get_permalink( edd_get_option( 'purchase_history_page' ) ) ); ?>">&larr; Back</a></p>

			</div>
		</div>
	</div>
</div>

<?php
	endif;
endif;

bigbox_view( 'global/footer' );
