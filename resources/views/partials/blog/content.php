<?php
/**
 * Blog content.
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

<div class="blog-post">

	<div class="block-header blog-post__header">
		<h3 class="block-title blog-post__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>

		<div class="hentry blog-post__content">
			<?php the_excerpt(); ?>

			<a href="<?php the_permalink(); ?>">Continue reading &rarr;</a>
		</div>
	</div>

</div>
