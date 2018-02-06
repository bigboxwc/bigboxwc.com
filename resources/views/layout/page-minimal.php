<?php
/**
 * Template Name: Minimal
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

bigbox_view( 'global/header-min' );

while ( have_posts() ) :
	the_post();

	the_content();
endwhile;

bigbox_view( 'global/footer-min' );
