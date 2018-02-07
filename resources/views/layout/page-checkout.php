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

$payment_mode = edd_get_chosen_gateway();
$form_action  = esc_url( edd_get_checkout_uri( 'payment-mode=' . $payment_mode ) );

bigbox_view( 'global/header-min' ); ?>

<div class="container">
	<div class="block">

		<div class="block-header">
			<h1 class="block-title">Complete Your Purchase</h3>
			<p class="block-subtitle">Your're on your way to a more scalable eCommerce solution.</p>
		</div>

		<div class="row">
			<div class="col-lg-8">

				<form id="edd_purchase_form" class="edd_form" action="<?php echo esc_attr( $form_action ); ?>" method="POST">

					<p class="card__label">Account Information</p>

					<div class="card card__inner--mini">
						<p class="form-row">
							<label for="edd_email" class="form-label"><?php esc_html_e( 'Email Address', 'bigbox' ); ?></label>
							<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Enter your email address', 'bigbox' ); ?>" />
						</p>

						<p class="form-row">
							<label for="edd_password" class="form-label"><?php esc_html_e( 'Password', 'bigbox' ); ?></label>
							<input name="edd_password" id="edd_password" class="form-input" type="password" placeholder="<?php esc_attr_e( 'Enter a strong password', 'bigbox' ); ?>" />
						</p>
					</div>

					<p class="card__label">Billing Information</p>

					<div class="card card__inner--mini">
						<div class="form-row-group">
							<p class="form-row form-row--half">
								<label for="edd_email" class="form-label"><?php esc_html_e( 'First Name', 'bigbox' ); ?></label>
								<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'First Name', 'bigbox' ); ?>" />
							</p>

							<p class="form-row form-row--half">
								<label for="edd_email" class="form-label"><?php esc_html_e( 'Last Name', 'bigbox' ); ?></label>
								<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Last Name', 'bigbox' ); ?>" />
							</p>
						</div>

						<p class="form-row">
							<label for="edd_email" class="form-label"><?php esc_html_e( 'Address', 'bigbox' ); ?></label>
							<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Full Address', 'bigbox' ); ?>" />
						</p>

						<div class="form-row-group">
							<p class="form-row form-row--half">
								<label for="edd_email" class="form-label"><?php esc_html_e( 'City', 'bigbox' ); ?></label>
								<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'City', 'bigbox' ); ?>" />
							</p>

							<p class="form-row form-row--half">
								<label for="edd_email" class="form-label"><?php esc_html_e( 'Postal / Zip Code', 'bigbox' ); ?></label>
								<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Postal / Zip Code', 'bigbox' ); ?>" />
							</p>
						</div>

						<div class="form-row-group">
							<p class="form-row form-row--half">
								<label for="edd_email" class="form-label"><?php esc_html_e( 'Country', 'bigbox' ); ?></label>
								<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'United States', 'bigbox' ); ?>" />
							</p>

							<p class="form-row form-row--half">
								<label for="edd_email" class="form-label"><?php esc_html_e( 'State / Province', 'bigbox' ); ?></label>
								<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'State / Province', 'bigbox' ); ?>" />
							</p>
						</div>
					</div>

				</form>

			</div>
		</div>

	</div>
</div>

<?php
bigbox_view( 'global/footer-min' );
