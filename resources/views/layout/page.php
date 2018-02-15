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

bigbox_view( 'global/header', [
	'min' => true,
] );

while ( have_posts() ) :
	the_post();
?>

<div class="block">
	<div class="block-header">
		<h3 class="block-title"><?php the_title(); ?></h3>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-10 col-lg-8">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
endwhile;

bigbox_view( 'global/footer' );
