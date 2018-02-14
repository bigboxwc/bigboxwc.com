<?php
/**
 * Primary theme features.
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

$features = get_posts( [
	'post_parent' => 11,
	'post_type'   => 'page',
] );
?>

<div class="theme-features">

	<?php foreach ( $features as $feature ) : ?>

	<div class="block feature-callout">
		<div class="container media">

			<div class="feature-callout__media">
				<?php bigbox_svg( 'graphic-shopping' ); ?>
			</div>

			<div class="block-header block-header--left media-body">
				<h3 class="block-title feature-callout__title"><?php echo esc_html( $feature->post_title ); ?></h3>

				<?php echo wp_kses_post( $feature->post_content ); ?>
			</div>

		</div>
	</div>

	<?php endforeach; ?>

</div>
