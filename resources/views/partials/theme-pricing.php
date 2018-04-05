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

<div id="pricing" class="block block--alt">
	<div class="block-header">
		<h3 class="block-title">Get Started Right Now</h3>
		<p class="block-subtitle">Choose the plan that fits your needs.</p>
	</div>

	<div class="container">

		<?php bigbox_partial( 'price-table' ); ?>

	</div>

	<div class="block-cta block-cta--subtle">
		<p>Need automatic updates on more than one website?</p>
		<p><a href="/buy/?price_id=2" class="block-cta__sublink">Purchase an unlimited license &rarr;</a></p>
	</div>
</div>
