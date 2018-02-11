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

	bigbox_partial( 'hero-blog' );
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-8">

			<div class="block blog-post">
				<div class="alignwide">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>

				<div class="block-header block-header--left blog-post__header">
					<h3 class="block-title blog-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<div class="blog-post__meta">
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

					<div class="blog-post__content hentry">
						<?php the_content(); ?>
					</div>
				</div>

			</div>

		</div>
	</div
</div>

<?php
endwhile;

bigbox_view( 'global/footer' );
