<?php
/**
 * Theme Articles
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

$latest = new WP_Query(
	[
		'posts_per_page' => 3,
		'no_found_rows'  => true,
	]
);

if ( ! $latest->have_posts() ) :
	return;
endif;
?>

<div class="block from-the-blog">
	<div class="container">

		<div class="block-header">
			<h3 class="block-title">Tips &amp; Tricks From the Blog</h3>
			<p class="block-subtitle">Tips and tricks for getting the most out of WooCommerce.</p>
		</div>

		<div class="row">
			<?php
			while ( $latest->have_posts() ) :
				$latest->the_post();

				echo '<div class="col-lg-4">';
				bigbox_partial( 'blog/content' );
				echo '</div>';
			endwhile;
			?>
		</div>

	</div>

	<div class="block-cta">
		<a href="/blog/" class="button button--primary">Discover More Resources</a>
	</div>
</div>
