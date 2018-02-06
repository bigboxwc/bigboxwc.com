<?php
/**
 * FAQs
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

<div id="faqs" class="block">
	<div class="container">

		<div class="block-header">
			<h3 class="block-title">Frequenty Asked Questions</h3>
			<p class="block-subtitle">Still have questions about the theme? We've answered some of the most common questions below.</p>
		</div>

		<ul class="faqs">
			<li class="faq">
				<button class="faq__title">
					<?php bigbox_svg( 'plus' ); ?>
					<span>What is included in my purchase?</span>
				</button>

				<div class="faq__answer">
					<p>When purchasing BigBox you receive access to a WordPress theme. Your purchase only contains the WordPress theme files for your website. Once the theme is activated you will be guided through an easy to use installation guide.</p>

					<p>This purchase <strong>does not include</strong> premium 3rd party integrations such as paid WooCommerce extensions, or additional premium plugins recommended throughout the website.</p>

					<p>For further information on setting up the BixBox theme please <a href="/">review the documentation</a>.</p>
				</div>
			</li>

			<li class="faq">
				<button class="faq__title">
					<?php bigbox_svg( 'plus' ); ?>
					<span>Do you offer a trial version of the BigBox theme?</span>
				</button>

				<div class="faq__answer">
					<p>We do not offer a trial period for the BigBox WooCommerce theme, however we have an unconditional 14-day money back guaruntee.</p>

					<p><a href="/demo/">View the demo</a> or <a href="/contact/">ask a presales</a> question before purchasing.</p>
				</div>
			</li>

			<li class="faq">
				<button class="faq__title">
					<?php bigbox_svg( 'plus' ); ?>
					<span>Can I use this theme on WordPress.com?</span>
				</button>

				<div class="faq__answer">
					<p>No. The BigBox theme is only available for self-hosted WordPress installations.</p>
				</div>
			</li>

			<li class="faq">
				<button class="faq__title">
					<?php bigbox_svg( 'plus' ); ?>
					<span>Can WooCommerce support my full product catalog?</span>
				</button>

				<div class="faq__answer">
					<p>Yes! WooCommerce has no strict limits on the number of products it can support. The speed and optimization of these products will rely heavily on your hosting environment.</p>

					<p><a href="#">Read how we we manage a 40,000 item catalog</a> on our blog.</p>
				</div>
			</li>

			<li class="faq">
				<button class="faq__title">
					<?php bigbox_svg( 'plus' ); ?>
					<span>Are all official WooCommerce extensions supported?</span>
				</button>

				<div class="faq__answer">
					<p>Yes! BigBox was built to be extremely flexible and work with all properly developed WordPress and WooCommerce plugins.</p>

					<p>If you have found an incompatibility that you believe is caused by the theme pleaes <a href="/support/">contact support</a>.</p>
				</div>
			</li>
		</ul>

	</div>
</div>

<div class="block-cta">
	Still have a question? <a href="/contact/">Please get in touch &rarr;</a>
</div>
