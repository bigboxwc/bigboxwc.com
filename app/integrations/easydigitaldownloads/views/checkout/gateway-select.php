<?php
/**
 * Order summary.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Integration
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$gateways       = edd_get_enabled_payment_gateways( true );
$chosen_gateway = edd_get_chosen_gateway();
?>

<div id="edd_payment_mode_select_wrap" class="payment-method">
	<p class="card__label">Payment Method</p>

	<div id="edd_payment_mode_select">
		<?php do_action( 'edd_payment_mode_top' ); ?>
		<?php do_action( 'edd_payment_mode_before_gateways_wrap' ); ?>

		<div id="edd-payment-mode-wrap">
			<?php
			do_action( 'edd_payment_mode_before_gateways' );

			foreach ( $gateways as $gateway_id => $gateway ) :
				$label         = apply_filters( 'edd_gateway_checkout_label_' . $gateway_id, $gateway['checkout_label'] );
				$checked       = checked( $gateway_id, $chosen_gateway, false );
				$checked_class = $checked ? ' edd-gateway-option-selected' : '';
			?>

				<label for="edd-gateway-<?php echo esc_attr( $gateway_id ); ?>" class="edd-gateway-option<?php echo esc_attr( $checked_class ); ?>" id="edd-gateway-option-<?php echo esc_attr( $gateway_id ); ?>">
					<input type="radio" name="payment-mode" class="edd-gateway" id="edd-gateway-<?php echo esc_attr( $gateway_id ); ?>" value="<?php echo esc_attr( $gateway_id ); ?>" <?php echo esc_attr( $checked ); ?> />

					<?php echo esc_html( $label ); ?>
				</label>

			<?php
			endforeach;

			do_action( 'edd_payment_mode_after_gateways' );
			?>
		</div>

		<?php do_action( 'edd_payment_mode_after_gateways_wrap' ); ?>

	</div>

	<div id="edd_purchase_form_wrap"></div>

	<?php do_action( 'edd_payment_mode_bottom' ); ?>
</div>
