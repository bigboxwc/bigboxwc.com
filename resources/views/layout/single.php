<?php
/**
 * Single blog post.
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

while ( have_posts() ) :
	the_post();
?>

<div class="cta hero-cta blog-hero hero-cta--center block">
	<div class="container">

		<div class="cta__content cta__content--blog">
			<h2 class="cta__title"><?php the_title(); ?></h2>

			<div class="cta__description blog-post__meta">
				<span class="post-date">Last updated on <?php echo esc_html( get_the_modified_date() ); ?></span>
			</div>

		</div>

	</div>
</div>

<div class="container block">
	<div class="row justify-content-center">
		<div class="col-lg-8">

			<div class="blog-post">
				<div class="blog-post__content hentry">
					<?php the_content(); ?>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
bigbox_partial( 'blog/subscribe' );
comments_template( '/resources/views/partials/blog/comments.php' );

endwhile;

bigbox_partial(
	'features-overview', [
		'alt'     => true,
		'context' => 'features',
	]
);

bigbox_partial( 'cta-buy' );

bigbox_view( 'global/footer' );
