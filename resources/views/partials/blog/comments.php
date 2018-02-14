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


<div class="blog-post__comments block block--alt">
	<div class="block-header">
		<h3 class="block-title">
			<?php comments_number( __( '0 Comments', 'bigbox' ), __( '1 Comment', 'bigbox' ), __( '% Comments', 'bigbox' ) ); ?>
		</h3>

		<p class="block-subtitle">Discuss "<?php the_title(); ?>" with others.</p>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<?php
				if ( have_comments() ) :
					wp_list_comments();
				endif;

				if ( comments_open() ) :
					comment_form();
				endif;
				?>
			</div>
		</div>
	</div>
</div>
