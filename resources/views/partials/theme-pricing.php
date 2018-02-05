<?php
/**
 * Theme Pricing
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

<div id="pricing" class="block">
	<div class="container">

		<div class="block-header">
			<h3 class="block-title">Simplified Pricing</h3>
			<p class="block-subtitle">Create a store that matches your brand, your scale, and your specific needs.</p>
		</div>

		<?php bigbox_partial( 'price-table' ); ?>

	</div>
</div>
