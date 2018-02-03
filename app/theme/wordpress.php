<?php
/**
 * Modify some of WordPress' global functionality.
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
 * Plug in to get_search_form() and override with our own partial.
 *
 * @see https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @since 1.0.0
 *
 * @return string
 */
add_filter(
	'get_search_form', function() {
		return bigbox_get_partial( 'searchform' );
	}
);

/**
 * On the blog archive limit the category list to one item.
 *
 * @since 1.0.0
 *
 * @param array $categories The list of categories found.
 * @return array $categories
 */
add_filter(
	'the_category_list', function( $categories ) {
		return array_splice( $categories, 0, 1 );
	}
);

/**
 * Remove [...] from excerpts. Use a &hellip; instead.
 *
 * @since 1.0.0
 *
 * @return string
 */
add_filter(
	'excerpt_more', function() {
		return '&hellip;';
	}
);

/**
 * Adjust the length of default excerpts.
 *
 * @since 1.0.0
 *
 * @return int
 */
add_filter(
	'excerpt_length', function() {
		return 20;
	}
);
