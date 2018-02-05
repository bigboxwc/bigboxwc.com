<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="block-header">
	<h2 class="block-title">Sign In</h2>
	<p class="block-subtitle">Please sign in to continue</p>
</div>

<div class="row justify-content-center">
	<form class="col align-self-center col-md-6" method="post">

		<?php wc_print_notices(); ?>

		<div class="card card__inner">

			<p class="form-row">
				<label for="username" class="form-label"><?php esc_html_e( 'Username or email address', 'bigbox' ); ?> <span class="required">*</span></label>
				<input type="text" class="form-input" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<p class="form-row">
				<label for="password" class="form-label"><?php esc_html_e( 'Password', 'bigbox' ); ?> <span class="required">*</span></label>
				<input class="form-input" type="password" name="password" id="password" />
			</p>

			<p class="form-row">
				<button type="submit" class="button button--primary" name="login" value="<?php esc_attr_e( 'Sign In', 'bigbox' ); ?>"><?php esc_html_e( 'Sign In', 'bigbox' ); ?></button>

				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			</p>

			<p class="form-row form-row--actions">
				<label class="form-label form-label--checkbox">
					<input class="form-input form-input--submit" name="rememberme" type="checkbox" id="rememberme" value="forever" />
					<span><?php esc_html_e( 'Remember me', 'bigbox' ); ?></span>
				</label>

				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'bigbox' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</div>
	</form>
</div>
