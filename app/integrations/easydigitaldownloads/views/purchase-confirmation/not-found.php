<?php
/**
 * Receipt not found.
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
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">Purchase Not Found</h3>

			<p class="block-subtitle">Sorry! Please <a href="/contact/">contact support</a> if you believe this is an error.</p>
		</div>

	</div>
</div>
