<?php
/**
 * Template Name: Coming Soon
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
?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="initial-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

		<title>BigBox - WooCommerce Solutions for Large Stores</title>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="cta hero-cta block coming-soon">
			<div class="container">

				<div class="cta__content">
					<h2 class="cta__title">WooCommerce Solutions for Large Stores</h2>
					<div class="cta__description">Easily manage and scale large product catalogues for WooCommerce with the BigBox WooCommerce theme and other WooCommerce scaling resources.</div>

					<br />

					<!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup">
						<form action="https://bigboxwc.us18.list-manage.com/subscribe/post?u=0f6bf3b55cb6c1fc7fe0c22e6&amp;id=d35e3bbb64" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<div class="mc-field-group">
								<label for="mce-EMAIL">Stay Notified</label>
								<input type="email" value="" placeholder="Enter your email addresss..." name="EMAIL" id="mce-EMAIL" class="form-input" />
							</div>

							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>

							<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0f6bf3b55cb6c1fc7fe0c22e6_d35e3bbb64" tabindex="-1" value=""></div>
							
							<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button cta__button" />
						</form>
					</div>

					<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
					<!--End mc_embed_signup-->
				</div>

			</div>
		</div>

	</body>

	<?php wp_footer(); ?>
</html>
