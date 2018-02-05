<?php
/**
 * Template Name: Home
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

	bigbox_partial( 'cta--home' );
	bigbox_partial( 'overview' );
	bigbox_partial( 'testimonial' );
	bigbox_partial( 'cta--get-started' );
endwhile;

bigbox_view( 'global/footer' );
