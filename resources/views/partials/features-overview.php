<?php
/**
 * Theme Features
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

<div class="block block--<?php echo esc_attr( isset( $alt ) ? 'alt' : 'standard' ); ?>">
	<div class="block-header">
		<h3 class="block-title">Build Your eCommerce Powerhouse</h3>
		<p class="block-subtitle">Create a store that matches your brand, your scale, and your specific needs.</p>
	</div>

	<div class="container features__container">

		<ul class="feature-list">

			<li class="feature-item feature-item--mini col-lg-4">
				<?php bigbox_svg( 'illustration-imac' ); ?>

				<div class="feature-item__content">
					<h4>Optimized WooCommerce Theme</h4>
					<p>A beautifully designed WooCommerce theme built for extensive product catalogs. Ensure your product catalog is the focus of your website.</p>
					<p><a href="/buy/">Get the theme &rarr;</a></p>
				</div>
			</li>

			<li class="feature-item feature-item--mini col-lg-4">
				<?php bigbox_svg( 'illustration-imac-filter' ); ?>

				<div class="feature-item__content">
					<h4>Advanced Filtering Support</h4>
					<p>Allowing customers to search for specific departments, specifications, or other criteria ensures every product can easily be discovered.</p>
					<p><a href="/advanced-product-filtering-for-woocommerce/">Learn about filtering &rarr;</a></p>
				</div>
			</li>

			<li class="feature-item feature-item--mini col-lg-4">
				<?php bigbox_svg( 'illustration-swatches' ); ?>

				<div class="feature-item__content">
					<h4>Unlimited Products and Variations</h4>
					<p>No restrictions on the number of products you can create, or how many variations of each product. Grow your catalog as large as you need.</p>
					<p><a href="/why-use-woocommerce/">Learn about WooCommerce &rarr;</a></p>
				</div>
			</li>

			<li class="feature-item feature-item--mini col-lg-4">
				<?php bigbox_svg( 'illustration-money' ); ?>

				<div class="feature-item__content">
					<h4>Flexible Payment Processing</h4>
					<p>Built in Stripe and PayPal support means you can start accepting payments instantly. Dozens of other gateway options means you have flexibility.</p>
					<p><a href="/high-transaction-payment-processing-for-woocommerce/">Learn about payment processing &rarr;</a></p>
				</div>
			</li>

			<li class="feature-item feature-item--mini col-lg-4">
				<?php bigbox_svg( 'illustration-ship' ); ?>

				<div class="feature-item__content">
					<h4>Customize to Match Your Brand</h4>
					<p>Easy-to-use live customization options means your online presence will match your offline presence. No custom coding needed!</p>
					<p><a href="/customizing-a-woocommerce-theme/">Learn about customization &rarr;</a></p>
				</div>
			</li>

			<li class="feature-item feature-item--mini col-lg-4">
				<?php bigbox_svg( 'illustration-businessman' ); ?>

				<div class="feature-item__content">
					<h4>Advanced Search Support</h4>
					<p>Search engine optimization as well as on-site searching optimizations ensures your website and your products are always found.</p>
					<p><a href="/search-engine-optimization-for-woocommerce/">Learn about searching &rarr;</a></p>
				</div>
			</li>

		</ul>

	</div>

	<div class="block-cta">
		<?php if ( isset( $context ) && 'features' === $context ) : ?>
			<a href="/features/" class="button button--primary">View All Features</a> 
		<?php else : ?>
			<a href="/buy/" class="button button--primary">Get BigBox Now</a> 
		<?php endif; ?>

			&nbsp; &nbsp; &nbsp; 

		<a href="/demo/">View Demo &rarr;</a>
	</div>
</div>
