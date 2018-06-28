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

bigbox_view(
	'global/header', [
		'min' => true,
	]
);
?>

<div class="block">

	<div class="block-header" style="padding-bottom: 0;">
		<h2 class="block-title">Flexible Enough for Any Brand</h2>
		<p class="block-subtitle">BigBox's customization options make it simple to match your brand's ethos. Below are a couple examples of how BigBox can be used.</p>
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
			<h3 class="feature-callout__title feature-callout__title--with-button">
				Mega Store

				<a href="https://demos.bigboxwc.com/default/" class="button button--size-sm">View Demo</a>
			</h3>

			<p>Put BigBox to the test by browsing and filtering thousands of products with ease.</p>

			<ul class="feature-callout__list">
				<li><a href="https://demos.bigboxwc.com/default/shop/" target="_blank" rel="noindex noopener">Shop</a></li>
				<li><a href="https://demos.bigboxwc.com/default/product/product-2040/" target="_blank" rel="noindex noopener">Variable Product</a></li>
				<li><a href="https://demos.bigboxwc.com/default/checkout/?add-to-cart=2853" target="_blank" rel="noindex noopener">Checkout</a></li>
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
			<h3 class="feature-callout__title feature-callout__title--with-button">
				Boutique Shop

				<a href="https://demos.bigboxwc.com/lifestyle" class="button button--size-sm">View Demo</a>
			</h3>

			<p>An example of BigBox adapting to a smaller boutique store with fewer products.</p>

			<ul class="feature-callout__list">
				<li><a href="https://demos.bigboxwc.com/lifestyle/" target="_blank" rel="noindex noopener">Landing Page</a></li>
				<li><a href="https://demos.bigboxwc.com/lifestyle/shop/" target="_blank" rel="noindex noopener">Shop</a></li>
				<li><a href="https://demos.bigboxwc.com/lifestyle/welcome-to-the-gutenberg-editor/" target="_blank" rel="noindex noopener">Blog Post</a></li>
			</ul>
		</div>

	</div>
</div>

<?php
bigbox_partial( 'cta-buy' );

bigbox_view( 'global/footer' );
