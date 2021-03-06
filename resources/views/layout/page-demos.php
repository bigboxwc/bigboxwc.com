<?php
/**
 * Template Name: Demos
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

bigbox_view( 'global/header' );

the_post();
?>

<div class="cta hero-cta hero-cta--center block">
	<div class="container">

		<div class="cta__content">
			<h2 class="cta__title"><?php the_title(); ?></h2>
			<div class="cta__description"><?php the_content(); ?></div>
		</div>

	</div>
</div>

<div class="block feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
				<a href="https://demos.bigboxwc.com/default/">
					<img src="<?php echo get_template_directory_uri(); ?>/public/images/demos/default.png" alt="Large Store Demo" />
				</a>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">
				Mega Store
			</h3>

			<p>Put BigBox to the test by browsing and filtering thousands of products with ease.</p>

			<p><a href="https://demos.bigboxwc.com/default/" class="button">View Demo</a></p>

			<ul class="feature-callout__list feature-callout__list--split">
				<li><a href="https://demos.bigboxwc.com/default/shop/" target="_blank" rel="noindex noopener">Shop Index</a></li>
				<li><a href="https://demos.bigboxwc.com/default/checkout/?add-to-cart=2853" target="_blank" rel="noindex noopener">Cart &amp; Checkout</a></li>
				<li><a href="https://demos.bigboxwc.com/default/product/product-2040/" target="_blank" rel="noindex noopener">Variable Product</a></li>
				<li><a href="https://demos.bigboxwc.com/default/dynamc-shop/" target="_blank" rel="noindex noopener">Custom Shop Landing Page</a></li>
			</ul>

		</div>

	</div>
</div>

<div class="block feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
				<a href="https://demos.bigboxwc.com/lifestyle/">
					<img src="<?php echo get_template_directory_uri(); ?>/public/images/demos/lifestyle.png" alt="Boutique Store Demo" />
				</a>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">
				Lifestyle Store
			</h3>

			<p>An example of BigBox adapting to a smaller boutique store with fewer products.</p>

			<p><a href="https://demos.bigboxwc.com/lifestyle" class="button">View Demo</a></p>

			<ul class="feature-callout__list feature-callout__list--split">
				<li><a href="https://demos.bigboxwc.com/lifestyle/" target="_blank" rel="noindex noopener">Customized Homepage</a></li>
				<li><a href="https://demos.bigboxwc.com/lifestyle/welcome-to-the-gutenberg-editor/" target="_blank" rel="noindex noopener">Blog Post</a></li>
				<li><a href="https://demos.bigboxwc.com/lifestyle/shop/" target="_blank" rel="noindex noopener">Boutique Shop</a></li>
			</ul>
		</div>

	</div>
</div>

<div class="block feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
				<a href="https://demos.bigboxwc.com/deco/">
					<img src="<?php echo get_template_directory_uri(); ?>/public/images/demos/deco.png" alt="Deco Store Demo" />
				</a>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">
				Boutique Shop
			</h3>

			<p>Another example of BigBox adapting to a smaller boutique store with fewer products. <a href="https://bigboxwc.com/deco-free-child-theme-for-bigbox/">Read the blog post &rarr;</a></p>

			<p><a href="https://demos.bigboxwc.com/deco" class="button">View Demo</a></p>

			<ul class="feature-callout__list feature-callout__list--split">
				<li><a href="https://demos.bigboxwc.com/deco/" target="_blank" rel="noindex noopener">Customized Homepage</a></li>
				<li><a href="https://demos.bigboxwc.com/deco/checkout/?add-to-cart=51" target="_blank" rel="noindex noopener">Cart &amp; Checkout</a></li>
				<li><a href="https://demos.bigboxwc.com/deco/product/field-notebook/" target="_blank" rel="noindex noopener">Product Page</a></li>
			</ul>
		</div>

	</div>
</div>

<?php
bigbox_partial( 'cta-buy' );

bigbox_view( 'global/footer' );
