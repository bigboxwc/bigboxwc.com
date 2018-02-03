<?php
/**
 * CTA: Home
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

<div class="cta hero-cta">
	<div class="container">

		<div class="cta-mission">
			<h2 class="cta-title"><?php the_title(); ?></h2>
			<div class="cta-about"><?php the_content(); ?></div>

			<a href="#" class="cta-button button">Optimize Your Store</a>
			<a href="#" class="cta-more">Learn More &rarr;</a>
		</div>

	</div>
</div>
