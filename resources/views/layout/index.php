<?php
/**
 * Blog index.
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

bigbox_partial( 'hero-blog' ); ?>

<div class="container">
	<div class="row justify-content-center">

		<div class="col-lg-8">
			<?php
			while ( have_posts() ) :
				the_post();

				bigbox_partial( 'blog/content' );
			endwhile;
			?>
		</div>

	</div>
</div>

<?php
bigbox_view( 'global/footer' );
