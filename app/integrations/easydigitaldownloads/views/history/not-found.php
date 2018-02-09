<?php
/**
 * Payment history not found.
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
?>

<div class="block feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-chip-head' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">😢 No Payments Found</h3>

			<p class="block-subtitle">Sorry! Please <a href="/contact/">contact support</a> if you believe this is an error. You can also <a href="/features/">read more about BigBox for WooCommerce</a>.</p>
		</div>

	</div>
</div>
