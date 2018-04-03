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
?>

<div class="cta hero-cta hero-cta--center block">
	<div class="container">
		<div class="cta__content">
			<h1 class="cta__title"><?php the_title(); ?></h1>
		</div>
	</div>
</div>

<div class="block">
	<div class="container">
		<div class="row justify-content-center">
			<div class="hentry col-sm-12 col-md-10 col-lg-8">
				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'full' );
				endif;
				
				the_content();
				?>
			</div>
		</div>
	</div>
</div>

<?php
endwhile;

bigbox_view( 'global/footer' );
