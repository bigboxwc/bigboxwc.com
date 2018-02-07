<?php
/**
 * Global page header.
 *
 * @since 1.0.0
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

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="account-bar">
			<div class="container">

				<nav class="access">
					<a href="/account/" class="access-item">Account</a>
					<a href="/support/" class="access-item">Support</a>
					<a href="/contact/" class="access-item">Contact</a>
				</nav>

			</div>
		</div>

		<div class="brand-bar">
			<div class="container">
				<div class="masthead">

					<div class="branding">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">BigBox</a></h1>
					</div>

					<nav class="access">
						<a href="/features/" class="access-item">All Features</a>
						<a href="/blog/" class="access-item">Blog &amp; Resources</a>
						<a href="/buy-now/" class="access-item access-item--active">Get BigBox</a>
					</nav>

				</div>
			</div>
		</div>
