<?php
/**
 * Template Name: Features
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

	bigbox_partial( 'features-hero' );
	bigbox_partial( 'features-woocommerce' );
	bigbox_partial( 'features-primary' );
	bigbox_partial( 'features-overview', [
		'alt' => true,
	]	);
	bigbox_partial( 'testimonials' );
	bigbox_partial( 'theme-pricing' );
	bigbox_partial( 'features-faqs' );
	bigbox_partial( 'cta-buy' );
endwhile;

bigbox_view( 'global/footer' );
