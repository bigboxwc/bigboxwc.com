<?php
/**
 * Hero: Features
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

<div class="cta hero-cta hero-cta--center block">
	<div class="container">

		<div class="cta__content">
			<h2 class="cta__title"><?php the_title(); ?></h2>
			<div class="cta__description"><?php the_content(); ?></div>

			<a href="/buy/" class="cta__button button">Get BigBox Now</a>
			<a href="/demos/" class="cta__more">See it in action &rarr;</a>
		</div>

		<?php the_post_thumbnail( 'full' ); ?>
	</div>
</div>
