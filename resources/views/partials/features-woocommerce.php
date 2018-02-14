<?php
/**
 * WooCommerce features.
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

$woocommerce_features = get_posts( [
	'post_parent' => 5601,
	'post_type'   => 'page',
] );
?>

<div id="features" class="block">
	<div class="container features__container">

		<div class="block-header">
			<h3 class="block-title">Why Use WooCommerce?</h3>
			<p class="block-subtitle">WooCommerce is an open-source, completely customizable eCommerce platform for entrepreneurs worldwide.</p>
		</div>

		<ul class="feature-list">

			<?php foreach ( $woocommerce_features as $feature ) : ?>

			<li class="feature-item feature-item--overlay col-lg-3">
				<a href="<?php echo esc_url( get_permalink( $feature->ID ) ); ?>" data-slug="<?php echo esc_attr( $feature->post_name ); ?>" class="feature-item__content js-modal-trigger--ajax">
					<?php bigbox_svg( 'illustration-hacker' ); ?>
					<h4><?php echo esc_html( $feature->post_title ); ?></h4>
				</a>
			</li>

			<?php endforeach; ?>

		</ul>

	</div>
</div>
