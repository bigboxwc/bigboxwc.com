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
	'post_parent' => get_page_by_path( 'features' )->ID,
	'post_type'   => 'page',
	'orderby'     => 'menu_order',
	'order'       => 'asc',
] );
?>

<div class="theme-features">

	<?php foreach ( $features as $feature ) : ?>

	<div class="block feature-callout">
		<div class="container media">

			<div class="feature-callout__media">
				<?php bigbox_svg( 'graphic-' . apply_filters( 'bigbox_feature_svg', 'shopping', $feature->post_name ) ); ?>
			</div>

			<div class="block-header block-header--left media-body">
				<h3 class="block-title feature-callout__title"><?php echo esc_html( $feature->post_title ); ?></h3>

				<?php echo wp_kses_post( $feature->post_content ); ?>
			</div>

		</div>
	</div>

	<?php endforeach; ?>

</div>
