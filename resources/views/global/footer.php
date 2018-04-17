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

					<?php
					$lg = 'col-lg-6';
					$posts = get_posts( [
						'posts_per_page' => 4,
					] );

					if ( ! empty( $posts ) ) :
						$lg = 'col-lg-3';
					?>

					<div class="colophon__section col-sm-12 col-lg-6">
						<h4 class="section-title">Tips and Tricks</h4>

						<ul class="list">
							<?php foreach ( $posts as $post ) : ?>
							<li><a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
								<?php echo esc_html( get_the_title( $post->ID ) ); ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>

					<div class="colophon__section col-sm-6 <?php echo esc_attr( $lg ); ?>">
						<h4 class="section-title">Site Links</h4>

						<ul class="list">
							<li><a href="/features/">BigBox WooCommerce Theme</a></li>
							<li><a href="/blog/">Resources &amp; Blog</a></li>
							<li><a href="/contact/">Contact</a></li>
							<li><a href="/account/support/">Support</a></li>
						</ul>
					</div>

					<div class="colophon__section col-sm-6 <?php echo esc_attr( $lg ); ?>">
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
