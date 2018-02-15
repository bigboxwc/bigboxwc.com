<?php
/**
 * Global page header.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="initial-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="brand-bar <?php echo esc_attr( isset( $min ) && $min ? 'brand-bar--static' : null ); ?>">
			<div class="container">
				<div class="masthead">
					<?php
					bigbox_partial( 'branding' );

					if ( is_user_logged_in() ) :
						bigbox_partial( 'access' );
					else :
						bigbox_partial( 'access-guest' );
					endif;
					?>
				</div>
			</div>
		</div>
