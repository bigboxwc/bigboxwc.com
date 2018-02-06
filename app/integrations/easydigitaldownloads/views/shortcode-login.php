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
		<div class="col-md-5">

			<?php edd_print_errors(); ?>

			<form id="edd_login_form" action="" method="post">

				<p class="edd-login-username">
					<label for="edd_user_login"><?php esc_html_e( 'Username or Email', 'bigbox' ); ?></label>
					<input name="edd_user_login" id="edd_user_login" class="edd-required edd-input" type="text"/>
				</p>

				<p class="edd-login-password">
					<label for="edd_user_pass"><?php esc_html_e( 'Password', 'bigbox' ); ?></label>
					<input name="edd_user_pass" id="edd_user_pass" class="edd-password edd-required edd-input" type="password"/>
				</p>

				<p class="edd-login-remember">
					<label><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
					<?php esc_html_e( 'Remember Me', 'bigbox' ); ?></label>
				</p>

				<p class="edd-login-submit">
					<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_login_redirect ); ?>"/>
					<input type="hidden" name="edd_login_nonce" value="<?php echo wp_create_nonce( 'edd-login-nonce' ); ?>"/>
					<input type="hidden" name="edd_action" value="user_login"/>
					<input id="edd_login_submit" type="submit" class="edd-submit" value="<?php _e( 'Log In', 'bigbox' ); ?>"/>
				</p>

				<p class="edd-lost-password">
					<a href="<?php echo wp_lostpassword_url(); ?>">
						<?php _e( 'Lost Password?', 'bigbox' ); ?>
					</a>
				</p>

				<?php do_action( 'edd_login_fields_after' ); ?>
			</form>

		</div>
	</div>
</div>

<?php endif; ?>