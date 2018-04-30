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
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

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

							<label for="edd-gateway-<?php echo esc_attr( $gateway_id ); ?>" class="edd-gateway-option edd-gateway-option--<?php echo esc_attr( $gateway_id ); ?><?php echo esc_attr( $checked_class ); ?>" id="edd-gateway-option-<?php echo esc_attr( $gateway_id ); ?>" aria-title="Click to pay with <?php echo esc_attr( $label ); ?>">
								<input type="radio" name="payment-mode" class="edd-gateway" id="edd-gateway-<?php echo esc_attr( $gateway_id ); ?>" value="<?php echo esc_attr( $gateway_id ); ?>" <?php echo esc_attr( $checked ); ?> />

								<span><?php echo esc_html( $label ); ?></span>
								<?php bigbox_svg( 'graphic-' . $gateway_id ); ?>
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

				<div id="edd_purchase_submit">
					<?php echo edd_checkout_button_purchase(); // @codingStandardsIgnoreLine ?>
				</div>

				<p class="edd-purchase-terms">By clicking "Purchase", you agree to the <strong>BigBox</strong> <a href="/terms/">Terms of Service</a> and <a href="/privacy/">Privacy Policy</a>.</p>

				<p clas="edd-purchase-terms" aria-label="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
					<script type="text/javascript" src="https://seal.websecurity.norton.com/getseal?host_name=bigboxwc.com&amp;size=L&amp;use_flash=NO&amp;use_transparent=Yes&amp;lang=en"></script>
				</p>

			</div>
		</div>
	</div>
</div>
