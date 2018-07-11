<?php
/**
 * Single blog comments.
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

if ( comments_open() && get_option( 'thread_comments' ) ) :
	wp_enqueue_script( 'comment-reply' );
endif;

if ( ! comments_open() && ! have_comments() ) :
	return;
endif;
?>


<div class="blog-post__comments block">
	<?php if ( have_comments() ) : ?>
	<div class="block-header">
		<h3 class="block-title">
			<?php comments_number( __( '0 Comments', 'bigbox' ), __( '1 Comment', 'bigbox' ), __( '% Comments', 'bigbox' ) ); ?>
		</h3>

		<p class="block-subtitle">Discuss "<?php the_title(); ?>" with others.</p>
	</div>
	<?php endif; ?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<?php if ( have_comments() ) : ?>
				<ol class="comment-list">
					<?php
					wp_list_comments(
						[
							'avatar_size' => 100,
							'style'       => 'ol',
							'short_ping'  => true,
						]
					);
					?>
				</ol>

				<?php the_comments_pagination(); ?>

				<?php endif; ?>

				<?php
				if ( comments_open() ) :
					comment_form(
						[
							'title_reply_before' => '<div clas="block-header"><h3 class="block-title">',
							'title_reply_after'  => '</h3></div>',
						]
					);
				endif;
				?>
			</div>
		</div>
	</div>
</div>
