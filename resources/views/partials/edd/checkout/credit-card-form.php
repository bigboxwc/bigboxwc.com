<?php
/**
 * Stripe credit card form.
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

if ( ! wp_script_is( 'edd-stripe-js' ) ) :
	edd_stripe_js( true );
endif;

do_action( 'edd_before_cc_fields' );
?>

<p class="form-row">
	<label for="card_number" class="form-label">Card Number</label>

	<input type="tel" pattern="^[0-9!@#$%^&* ]*$" id="card_number" class="form-input card-number" placeholder="Credit Card Number" autocomplete="cc-number" />
</p>

<div class="form-row-group">
	<div class="form-row form-row--half">
		<label for="card_exp_month" class="form-label">Card Expiration (MM/YY)</label>

		<div class="form-row-group">
			<select id="card_exp_month" class="form-input card-expiry-month" autocomplete="cc-exp-month">
				<?php
				for ( $i = 1; $i <= 12; $i++ ) : // @codingStandardsIgnoreLine
					echo '<option value="' . esc_attr( $i ) . '">' . esc_html( sprintf( '%02d', $i ) ) . '</option>';
				endfor;
				?>
			</select>

			<select id="card_exp_year" class="form-input card-expiry-year" autocomplete="cc-exp-year">
				<?php
				for ( $i = date( 'Y' ); $i <= date( 'Y' ) + 30; $i++ ) : // @codingStandardsIgnoreLine
					echo '<option value="' . esc_attr( $i ) . '">' . esc_html( substr( $i, 2 ) ) . '</option>';
				endfor;
				?>
			</select>
		</div>
	</div>

	<p class="form-row form-row--half">
		<label for="card_cvc" class="form-label">Card CVC / CVV</label>
		<input type="tel" pattern="[0-9]{3,4}" size="4" id="card_cvc" class="form-input card-cvc" placeholder="Card CVC / CVV" autocomplete="cc-csc" />
	</p>
</div>

<?php
do_action( 'edd_after_cc_fields' );
