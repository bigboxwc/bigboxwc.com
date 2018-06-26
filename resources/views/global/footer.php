<?php
/**
 * Global page footer.
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

		<footer class="mastfoot block">
			<div class="container">

				<div class="colophon row">

					<div class="colophon__section col-sm-6 col-lg-5">
						<a class="twitter-timeline" data-height="300" data-link-color="#3c64ff" href="https://twitter.com/bigboxwc?ref_src=twsrc%5Etfw">Tweets by bigboxwc</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>

					<div class="colophon__section col-sm-6 col-lg-3">
						<h4 class="section-title">Site Links</h4>

						<ul class="list">
							<li><a href="/features/">All Features</a></li>
							<li><a href="https://blog.bigboxwc.com/">Resources &amp; Blog</a></li>
							<li><a href="/contact/">Contact</a></li>
							<li><a href="/account/support/">Support</a></li>
						</ul>
					</div>

					<div class="colophon__section col-sm-6 col-lg-4">
						<h4 class="section-title">Legal</h4>

						<ul class="list">
							<li><a href="/terms/">Terms of Service</a></li>
							<li><a href="/privacy/">Privacy Policy</a></li>
							<li><strong>Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> BigBoxWC, LLC</strong></li>
						</ul>
					</div>

				</div>

			</div>
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
