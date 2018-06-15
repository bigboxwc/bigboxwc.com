<?php
/**
 * Purchase confirmation next steps.
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

<div class="block container">
	<div class="row justify-content-center">
		<div class="col-lg-8">

			<ol class="next-steps">
				<li>
					<span class="next-steps__step">1</span>

					<p>Visit <strong>Appearance &rarr; Themes &rarr; Add New</strong> in WordPress and upload your theme.</p>
					<!-- <p class="next&#45;steps__hint">Need help choosing WordCommerce hosting? <a href="#">Learn more about hosting</a>.</p> -->
				</li>

				<li>
					<span class="next-steps__step">2</span>

					<p>Visit <strong>Apperance &rarr; BigBox</strong> to complete your installation.</p>
					<p class="next-steps__hint">When prompted enter your license key:</p>
					<input type"text" class="form-input next-steps__license-key" value="<?php echo esc_attr( $license->key ); ?>" onClick="this.select();" />
				</li>

				<li>
					<span class="next-steps__step">3</span>

					<p>Learn more about <a href="https://docs.woocommerce.com/document/product-csv-import-suite-importing-products/">importing products</a>, ,<a href="https://docs.bigboxwc.com/">view the documentation</a>, or read <a href="https://blog.bigboxwc.com/">tips &amp; tricks on the blog</a>.</p>
				</li>
			</ol>

		</div>
	</div>
</div>
