<?php
/**
 * Hero: Features
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

<div class="cta hero-cta hero-cta--center block">
	<div class="container">

		<div class="cta__content">
			<h2 class="cta__title">A WooCommerce Theme That Matches Your Warehouse</h2>
			<div class="cta__description"><?php the_content(); ?></div>

			<a href="/buy/" class="cta__button button">Get BigBox Now</a>
			<a href="/demo/" class="cta__more">View Demo &rarr;</a>
		</div>

		<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="" />

	</div>
</div>
