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

<p class="card__label">Account Information</p>

<div class="card card__inner--mini">
	<p class="form-row">
		<label for="edd_user_login" class="form-label"><?php esc_html_e( 'Email Address', 'bigbox' ); ?></label>
		<input name="edd_user_login" id="edd_user_login" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Enter your email address', 'bigbox' ); ?>" />
	</p>

	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="edd_user_pass" class="form-label"><?php esc_html_e( 'Password', 'bigbox' ); ?></label>
			<input name="edd_user_pass" id="edd_user_pass" class="form-input" type="text" placeholder="<?php esc_attr_e( '********', 'bigbox' ); ?>" />
		</p>

		<p class="form-row form-row--half">
			<label for="edd_user_pass_confirm" class="form-label"><?php esc_html_e( 'Confirm Password', 'bigbox' ); ?></label>
			<input name="edd_user_pass_confirm" id="edd_user_pass_confirm" class="form-input" type="text" placeholder="<?php esc_attr_e( '********', 'bigbox' ); ?>" />
		</p>
	</div>
</div>
