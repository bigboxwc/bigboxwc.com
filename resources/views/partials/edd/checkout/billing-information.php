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

$logged_in = is_user_logged_in();
$customer  = EDD()->session->get( 'customer' );

// @codingStandardsIgnoreStart
$customer  = wp_parse_args( $customer, [
	'address' => [
		'line1'   => isset ( $_POST['card_address'] ) ? $_POST['card_address'] : null,
		'line2'   => '',
		'city'    => isset ( $_POST['card_city'] ) ? $_POST['card_city'] : null,
		'zip'     => isset ( $_POST['card_zip'] ) ? $_POST['card_zip'] : null,
		'state'   => isset ( $_POST['card_state'] ) ? $_POST['card_state'] : null,
		'country' => isset ( $_POST['billing_country'] ) ? $_POST['billing_country'] : null,
	],
] );
// @codingStandardsIgnoreEnd

$customer['address'] = array_map( 'sanitize_text_field', $customer['address'] );

if ( $logged_in ) {
	$user_address = get_user_meta( get_current_user_id(), '_edd_user_address', true );

	foreach ( $customer['address'] as $key => $field ) {
		if ( empty( $field ) && ! empty( $user_address[ $key ] ) ) {
			$customer['address'][ $key ] = $user_address[ $key ];
		} else {
			$customer['address'][ $key ] = '';
		}
	}
}

$customer['address'] = apply_filters( 'edd_checkout_billing_details_address', $customer['address'], $customer );
?>

<p class="card__label">Billing Information</p>

<div class="card card__inner--mini">
	<p class="form-row">
		<label for="card_address" class="form-label">Address</label>
		<input name="card_address" id="card_address" class="form-input card-address" type="text" placeholder="Full Address" value="<?php echo esc_attr( $customer['address']['line1'] ); ?>" />
	</p>

	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="card_city" class="form-label">City</label>
			<input name="card_city" id="card_city" class="form-input card-city" type="text" placeholder="City" value="<?php echo esc_attr( $customer['address']['city'] ); ?>" />
		</p>

		<p class="form-row form-row--half">
			<label for="card_zip" class="form-label">Postal / Zip Code</label>
			<input name="card_zip" id="card_zip" class="form-input card-zip" type="text" placeholder="Postal / Zip Code" value="<?php echo esc_attr( $customer['address']['zip'] ); ?>" />
		</p>
	</div>

	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="billing_country" class="form-label">Country</label>

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
			<label for="card_state" class="form-label">State / Province</label>

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

<?php do_action( 'bigbox_after_billing_information' ); ?>
