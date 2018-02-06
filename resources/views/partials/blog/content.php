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

<div class="card blog-card">
	<?php the_post_thumbnail( 'large' ); ?>

	<div class="card__inner card__inner--mini">
		<h4 class="card__label--mini"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

		<?php the_content(); ?>
	</div>
</div>
