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

$i        = 0;
$features = get_posts( [
	'post_parent' => get_page_by_path( 'features' )->ID,
	'post_type'   => 'page',
	'orderby'     => 'menu_order',
	'order'       => 'asc',
] );
?>

<?php
foreach ( $features as $feature ) :
	$alt = $i % 2 ? 'standard' : 'alt';
?>

<div class="block block--<?php echo esc_attr( $alt ); ?> feature-callout feature-callout--<?php echo esc_attr( $alt ); ?>">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-' . apply_filters( 'bigbox_feature_svg', 'shopping', $feature->post_name ) ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title"><?php echo esc_html( $feature->post_title ); ?></h3>

			<?php echo wp_kses_post( $feature->post_content ); ?>
		</div>

	</div>
</div>

<?php
$i++;
endforeach;
