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

$faqs = get_posts( [
	'post_parent' => 5601,
	'post_type'   => 'page',
] );
?>

<div id="faqs" class="block">
	<div class="container">

		<div class="block-header">
			<h3 class="block-title">Frequenty Asked Questions</h3>
			<p class="block-subtitle">Still have questions about the theme? We've answered some of the most common questions below.</p>
		</div>

		<ul class="faqs">
			<?php foreach ( $faqs as $faq ) : ?>

			<li class="faq">
				<button class="faq__title">
					<?php bigbox_svg( 'plus' ); ?>
					<span><?php echo esc_html( $faq->post_title ); ?></span>
				</button>

				<div class="faq__answer">
					<?php echo wp_kses_post( $faq->post_content ); ?>
				</div>
			</li>

			<?php endforeach; ?>

		</ul>

	</div>

	<div class="block-cta">
		Still have a question? <a href="/contact/">Please get in touch &rarr;</a>
	</div>
</div>
