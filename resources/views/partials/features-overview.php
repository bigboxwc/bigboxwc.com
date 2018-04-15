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

$page  = get_page_by_path( 'build-your-ecommerce-powerhouse' );
$posts = get_posts(
	[
		'post__not_in' => isset( $post__not_in ) ? $post__not_in : [],
		'post_parent'  => $page->ID,
		'post_type'    => 'page',
		'orderby'      => 'menu_order',
		'order'        => 'asc',
		'nopaging'     => true, // @codingStandardsIgnoreLine
	]
);

global $post;
?>

<div class="block block--<?php echo esc_attr( isset( $alt ) ? 'alt' : 'standard' ); ?>">
	<div class="block-header">
		<h3 class="block-title"><?php echo esc_html( get_the_title( $page ) ); ?></h3>
		<p class="block-subtitle"><?php echo $page->post_content; ?></p>
	</div>

	<div class="container features__container">

		<ul class="feature-list">

			<?php
			foreach ( $posts as $post ) :
				setup_postdata( $post );
			?>

			<li class="feature-item feature-item--mini col-lg-4">
				<?php the_post_thumbnail( 'medium' ); ?>

				<div class="feature-item__content">
					<h4><?php the_title(); ?></h4>
					<?php the_content(); ?>
				</div>
			</li>

			<?php endforeach; ?>

		</ul>

	</div>

	<div class="block-cta">
		<?php if ( isset( $context ) && 'features' === $context ) : ?>
			<a href="/features/" class="button button--primary">View All Features</a> 
		<?php else : ?>
			<a href="/buy/" class="button button--primary">Get BigBox Now</a> 
		<?php endif; ?>

		<a href="https://demos.bigboxwc.com/default/" class="block-cta__sublink">View Demo &rarr;</a>
	</div>
</div>
