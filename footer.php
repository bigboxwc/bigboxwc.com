<?php
/**
 * Required footer.
 *
 * The function get_footer() calls locate_template() which is not filtered. Plugins that
 * provide their own template files that call get_footer() (WooCommerce) will
 * only look here unless those template files are overwritten with our own view call.
 *
 * This loads our custom view.
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

bigbox_view( 'global/footer' );
