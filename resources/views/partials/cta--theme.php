<?php
/**
 * CTA: Theme
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

<div class="cta hero-cta hero-cta--theme">
	<div class="container">

		<div class="cta__content">
			<h2 class="cta__title">A WooCommerce Theme That Matches Your Warehouse</h2>
			<div class="cta__description"><?php the_content(); ?></div>

			<a href="#" class="cta__button button">Buy Now</a>
			<a href="#" class="cta__more">View Demo &rarr;</a>
		</div>

		<img src="http://wp-clean.dev/wp-content/uploads/2018/02/latest-featured-image-e1517843046247.jpg" alt="" />

	</div>
</div>
