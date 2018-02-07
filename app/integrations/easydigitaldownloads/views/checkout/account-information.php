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
	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="edd_first" class="form-label"><?php esc_html_e( 'First Name', 'bigbox' ); ?></label>
			<input name="edd_first" id="edd_first" class="form-input" type="text" placeholder="<?php esc_attr_e( 'First Name', 'bigbox' ); ?>" />
		</p>

		<p class="form-row form-row--half">
			<label for="edd_last" class="form-label"><?php esc_html_e( 'Last Name', 'bigbox' ); ?></label>
			<input name="edd_last" id="edd_last" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Last Name', 'bigbox' ); ?>" />
		</p>
	</div>

	<p class="form-row">
		<label for="edd_email" class="form-label"><?php esc_html_e( 'Email Address', 'bigbox' ); ?></label>
		<input name="edd_email" id="edd_email" class="form-input" type="text" placeholder="<?php esc_attr_e( 'Enter your email address', 'bigbox' ); ?>" />
	</p>
</div>
