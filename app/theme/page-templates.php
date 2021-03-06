<?php
/**
 * Manage page templates.
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

/**
 * Filter returned page templates.
 *
 * WordPress will only look in one level of directories by default.
 *
 * Since we know where our page templates are, and that they are only
 * for pages, we can manually add them.
 *
 * @since 1.0.0
 *
 * @param array    $post_templates The current list of templates.
 * @param WP_Theme $theme The current WordPress theme.
 * @param WP_Post  $post the current post object.
 * @param string   $post_type The current post type.
 */
function bigbox_page_templates( $post_templates, $theme, $post, $post_type ) {
	$post_templates['resources/views/layout/page-coming-soon.php']           = esc_html_x( 'Page: Coming Soon', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-home.php']                  = esc_html_x( 'Page: Home', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-features.php']              = esc_html_x( 'Page: Features', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-checkout.php']              = esc_html_x( 'Page: Checkout', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-purchase-confirmation.php'] = esc_html_x( 'Page: Purchase Confirmation', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-purchase-history.php']      = esc_html_x( 'Page: Purchase History', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-receipt.php']               = esc_html_x( 'Page: Receipt', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-buy.php']                   = esc_html_x( 'Page: Buy', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-support.php']               = esc_html_x( 'Page: Support', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-feature-woocommerce.php']   = esc_html_x( 'Page: WooCommerce Feature', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-feature-overview.php']      = esc_html_x( 'Page: Overview Feature', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-faqs.php']                  = esc_html_x( 'Page: FAQs', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-demos.php']                 = esc_html_x( 'Page: Demos', 'page template title', 'bigbox' );
	$post_templates['resources/views/layout/page-minimal.php']               = esc_html_x( 'Layout: Minimal', 'page template title', 'bigbox' );

	return $post_templates;
}
add_filter( 'theme_page_templates', 'bigbox_page_templates', 10, 4 );
