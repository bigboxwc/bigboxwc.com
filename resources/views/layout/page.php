<?php
/**
 * Page.
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

	bigbox_partial( 'hero' );
?>

<div class="container">
	<?php the_content(); ?>
</div>

<?php
endwhile;

bigbox_view( 'global/footer' );
