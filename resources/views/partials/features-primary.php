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

$i     = 0;
$posts = get_posts( [
	'post_parent' => get_page_by_path( 'features' )->ID,
	'post_type'   => 'page',
	'orderby'     => 'menu_order',
	'order'       => 'asc',
	'nopaging'    => true, // @codingStandardsIgnoreLine
] );
?>

<?php
global $post;

foreach ( $posts as $post ) :
	$alt = $i % 2 ? 'standard' : 'alt';
	setup_postdata( $post );
?>

<div class="block block--<?php echo esc_attr( $alt ); ?> feature-callout feature-callout--<?php echo esc_attr( $alt ); ?>">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-' . apply_filters( 'bigbox_feature_svg', 'shopping', $post->post_name ) ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title"><?php the_title(); ?></h3>

			<?php the_content(); ?>
		</div>

	</div>
</div>

<?php
$i++;
endforeach;
wp_reset_postdata();
