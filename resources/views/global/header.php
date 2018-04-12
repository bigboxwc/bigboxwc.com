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
		
		<?php if ( ! is_user_logged_in() ) : ?>
			<!-- Start of Async Drift Code -->
			<script>
			!function() {
				var t;
				if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0, 
				t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
				t.factory = function(e) {
					return function() {
						var n;
						return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
					};
				}, t.methods.forEach(function(e) {
					t[e] = t.factory(e);
				}), t.load = function(t) {
					var e, n, o, i;
					e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"), 
					o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js", 
					n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
				});
			}();
			drift.SNIPPET_VERSION = '0.3.1';
			drift.load('hb923fsm69mb');
			</script>
			<!-- End of Async Drift Code -->
		<?php endif; ?>

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-6014551077436942",
			enable_page_level_ads: true
			});
		</script>
	</head>

	<body <?php body_class(); ?>>

		<div class="brand-bar <?php echo esc_attr( isset( $min ) && $min ? 'brand-bar--static' : null ); ?>">
			<div class="container">
				<div class="masthead">
					<?php bigbox_partial( 'branding' ); ?>

					<a href="#access" class="access-toggle access-toggle--open" aria-expanded="false" aria-controls="access" aria-label="Open menu" role="button">
						<?php bigbox_svg( 'hamburger' ); ?>
					</a>

					<?php
					if ( is_user_logged_in() && '' === bigbox_edd_allgood() ) :
						bigbox_partial( 'access' );
					else :
						bigbox_partial( 'access-guest' );
					endif;
					?>

					<a id="access-toggle" href="#access-toggle" class="access-backdrop" tabindex="-1" aria-hidden="true" aria-label="Close menu" hidden=""></a>
				</div>
			</div>
		</div>
