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

<div class="block">
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
</div>

<?php
bigbox_partial(
	'features-overview', [
		'alt'     => true,
		'context' => 'features',
	]
);

bigbox_partial( 'cta-buy' );

bigbox_view( 'global/footer' );
