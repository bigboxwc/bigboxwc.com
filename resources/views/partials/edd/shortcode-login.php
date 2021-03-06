<?php
/**
 * EDD Login form.
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

global $edd_login_redirect;

if ( ! is_user_logged_in() ) :
?>

<div class="block-header">
	<h2 class="block-title">Sign In</h2>
	<p class="block-subtitle">Please sign in to continue</p>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">

			<?php edd_print_errors(); ?>

			<form id="edd_login_form" class="card card__inner--mini" action="" method="post">

				<p class="form-row">
					<label for="edd_user_login" class="form-label">Username or Email</label>
					<input name="edd_user_login" id="edd_user_login" class="form-input" type="text"/>
				</p>

				<p class="form-row">
					<label for="edd_user_pass" class="form-label">Password</label>
					<input name="edd_user_pass" id="edd_user_pass" class="form-input" type="password"/>
				</p>

				<p class="form-row form-row--submit">
					<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_login_redirect ); ?>"/>
					<input type="hidden" name="edd_login_nonce" value="<?php echo esc_attr( wp_create_nonce( 'edd-login-nonce' ) ); ?>"/>
					<input type="hidden" name="edd_action" value="user_login"/>
					<input id="edd_login_submit" type="submit" class="button button--size-block" value="Sign In"/>
					<?php wp_nonce_field( 'edd-login-form', 'edd_login_nonce', false, true ); ?>
				</p>

				<p class="form-row form-row--actions">

					<label class="form-label form-label--checkbox">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="form-input form-input--checkbox" />
						<span>Remember Me</span>
					</label>

					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
						Lost Password?
					</a>
				</p>

				<?php do_action( 'edd_login_fields_after' ); ?>
			</form>

		</div>
	</div>
</div>

<?php
endif;
