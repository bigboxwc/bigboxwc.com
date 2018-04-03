<?php
/**
 * Template Name: Page: Feature Overview
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

the_post();

bigbox_view(
	'global/header', [
		'min' => ! get_post()->post_parent ? '-min' : null,
	]
);

if ( get_post()->post_parent ) :
?>

<div class="cta hero-cta hero-cta--minor hero-cta--center">
	<div class="container">

		<div class="cta__content cta__content--blog">
			<h2 class="cta__title"><?php the_title(); ?></h2>
			<div class="cta__description"><?php the_content(); ?></div>
		</div>

	</div>
</div>

<?php
endif;

bigbox_partial( 'features-overview', [
	'post__not_in' => [ get_the_ID() ],
] );

bigbox_view( 'global/footer' );
