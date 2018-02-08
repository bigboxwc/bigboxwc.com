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
?>

<p class="card__label">Billing Information</p>

<div class="card card__inner--mini">
	<p class="form-row">
		<label for="card_address" class="form-label"><?php esc_html_e( 'Address', 'bigbox' ); ?></label>
		<input name="card_address" id="card_address" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Full Address', 'bigbox' ); ?>" />
	</p>

	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="card_city" class="form-label"><?php esc_html_e( 'City', 'bigbox' ); ?></label>
			<input name="card_city" id="card_city" class="form-input" type="text" placeholder="<?php esc_attr_e( 'City', 'bigbox' ); ?>" />
		</p>

		<p class="form-row form-row--half">
			<label for="card_zip" class="form-label"><?php esc_html_e( 'Postal / Zip Code', 'bigbox' ); ?></label>
			<input name="card_zip" id="card_zip" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Postal / Zip Code', 'bigbox' ); ?>" />
		</p>
	</div>

	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="billing_country" class="form-label"><?php esc_html_e( 'Country', 'bigbox' ); ?></label>

			<select name="billing_country" id="edd_address_country" class="billing_country edd-select<?php echo esc_attr( edd_field_is_required( 'billing_country' ) ? ' required' : null ); ?>" <?php echo esc_attr( edd_field_is_required( 'billing_country' ) ? ' required ' : null ); ?>>
				<?php
				$selected_country = edd_get_shop_country();

				if ( ! empty( $customer['address']['country'] ) && '*' !== $customer['address']['country'] ) :
					$selected_country = $customer['address']['country'];
				endif;

				$countries = edd_get_country_list();

				foreach ( $countries as $country_code => $country ) :
					if ( '' === $country_code ) :
						continue;
					endif;

					echo '<option value="' . esc_attr( $country_code ) . '"' . selected( $country_code, $selected_country, false ) . '>' . esc_html( $country ) . '</option>';
				endforeach;
				?>
			</select>
		</p>

		<p id="billing-state" class="form-row form-row--half">
			<label for="card_state" class="form-label"><?php esc_html_e( 'State / Province', 'bigbox' ); ?></label>

			<input name="card_state" type="hidden" />

			<?php
			$selected_state = edd_get_shop_state();
			$states         = edd_get_shop_states( $selected_country );

			if ( ! empty( $customer['address']['state'] ) ) :
				$selected_state = $customer['address']['state'];
			endif;

			if ( ! empty( $states ) ) :
			?>
			<select name="card_state" id="card_state" class="card_state edd-select<?php echo esc_attr( edd_field_is_required( 'card_state' ) ? ' required' : null ); ?>">
				<?php
				foreach ( $states as $state_code => $state ) :
					if ( '' === $state_code ) :
						continue;
					endif;

					echo '<option value="' . esc_attr( $state_code ) . '"' . selected( $state_code, $selected_state, false ) . '>' . esc_html( $state ) . '</option>';
				endforeach;
				?>
			</select>
			<?php else : ?>
				<?php $customer_state = ! empty( $customer['address']['state'] ) ? $customer['address']['state'] : ''; ?>
				<input type="text" size="6" name="card_state" id="card_state" class="form-input" value="<?php echo esc_attr( $customer_state ); ?>" placeholder="<?php esc_attr_e( 'State / Province', 'bigbox' ); ?>"/>
			<?php endif; ?>
		</p>
	</div>
</div>
