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
			<?php
				printf(
					// Translators: %1$s post author avatar, %2$s post author name, %3$s post date.
					esc_html__( 'by %1$s %2$s on %3$s', 'bigbox' ),
					get_avatar( get_the_author_meta( 'ID' ), 24 ),
					'<span class="post-author">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</span>',
					'<span class="post-date">' . esc_html( get_the_date() ) . '</span>'
				);
			?>
			</div>

		</div>

	</div>
</div>

<div class="container block">
	<div class="row justify-content-center">
		<div class="col-lg-8">

			<div class="blog-post">
				<div class="alignwide">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>

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
