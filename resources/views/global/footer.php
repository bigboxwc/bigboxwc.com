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

					<div class="colophon__section col-sm-12 col-lg-6">
						<h4 class="section-title">Tips and Tricks</h4>

						<ul class="list">
							<li><a href="#">Offloading WooCommerce Product Images to Amazon S3</a></li>
							<li><a href="#">Choosing a WooCommerce-optimized Host Environment</a></li>
							<li><a href="#">Minimizing Fees on WooCommerce Transaction</a></li>
							<li><a href="#">Decreasing Load Time and Increasing Sales</a></li>
						</ul>
					</div>

					<div class="colophon__section col-sm-6 col-lg-3">
						<h4 class="section-title">Site Links</h4>

						<ul class="list">
							<li><a href="/features/">BigBox WooCommerce Theme</a></li>
							<li><a href="/blog/">Resources &amp; Blog</a></li>
							<li><a href="/contact/">Contact</a></li>
							<li><a href="/about/">About</a></li>
						</ul>
					</div>

					<div class="colophon__section col-sm-6 col-lg-3">
						<h4 class="section-title">Legal</h4>

						<ul class="list">
							<li><a href="/tos/">Terms of Service</a></li>
							<li><a href="/privacy/">Privacy Policy</a></li>
							<li><strong>Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?></strong></li>
						</ul>
					</div>

				</div>

			</div>
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
