<?php
/**
 * Hero: Blog
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

<div class="cta hero-cta blog-hero hero-cta--center block">
	<div class="container">

		<div class="cta__content cta__content--blog">
			<h2 class="cta__title">WooCommerce Scaling Resources and Tips</h2>
			<div class="cta__description">Tips and tricks for getting the most out of WooCommerce.</div>

			<?php if ( ! is_singular() ) : ?>
			<form action="<?php echo esc_url( home_url() ); ?>" method="GET" class="hero-cta__search">
				<button type="submit" class="button" aria-title="<?php esc_attr_e( 'Submit', 'bigbox' ); ?>">
					<?php bigbox_svg( 'search' ); ?>
				</button>

				<input type="search" placeholder="<?php esc_attr_e( 'Find a topic...', 'bigbox' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" class="form-input" />
			</form>
			<?php endif; ?>
		</div>

	</div>
</div>
