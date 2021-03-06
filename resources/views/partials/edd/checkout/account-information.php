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

if ( ! is_user_logged_in() ) :
?>

<p class="card__label">Account Information</p>

<div class="card card__inner--mini">
	<p class="form-row">
		<label for="edd_user_login" class="form-label">Email Address</label>
		<input name="edd_user_login" id="edd_user_login" class="form-input" type="text" placeholder="Enter your email address" value="<?php echo esc_attr( isset( $_POST['edd_user_login'] ) ? $_POST['edd_user_login'] : null ); ?>" />
	</p>

	<div class="form-row-group">
		<p class="form-row form-row--half">
			<label for="edd_user_pass" class="form-label">Password</label>
			<input name="edd_user_pass" id="edd_user_pass" class="form-input" type="password" placeholder="********" />
		</p>

		<p class="form-row form-row--half">
			<label for="edd_user_pass_confirm" class="form-label">Confirm Password</label>
			<input name="edd_user_pass_confirm" id="edd_user_pass_confirm" class="form-input" type="password" placeholder="********" />
		</p>
	</div>
</div>

<input type="hidden" name="edd-purchase-var" value="needs-to-register"/>

<?php else : ?>
	<input name="edd_user_login" id="edd_user_login" class="form-input" type="hidden" value="<?php echo esc_attr( wp_get_current_user()->user_email ); ?>" />
<?php endif; ?>
