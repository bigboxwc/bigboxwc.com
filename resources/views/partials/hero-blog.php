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
			<h2 class="cta__title">Learn About WooCommerce</h2>
			<div class="cta__description">Discover why WooCommerce is the best free eCommerce platform available and how BigBox can make it even better.</div>

			<?php if ( ! is_singular() ) : ?>
			<form action="<?php echo esc_url( home_url() ); ?>" method="GET" class="hero-cta__search">
				<button type="submit" class="button" aria-title="Submit">
					<?php bigbox_svg( 'search' ); ?>
				</button>

				<input type="search" placeholder="Find a topic..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" class="form-input" />
				<input type="hidden" name="post_type" value="post" />
			</form>
			<?php endif; ?>
		</div>

	</div>
</div>
