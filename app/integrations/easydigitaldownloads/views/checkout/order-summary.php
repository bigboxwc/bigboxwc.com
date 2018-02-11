<?php
/**
 * Order summary.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Integration
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="order-summary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<p class="card__label">Order Overview</p>

				<div class="order-summary__row">
					<span class="order-summary__label order-summary__label--highlight">Instant Account Activation</span>
					<span class="order-summary__value order-summary__value--highlight">Free!</span>
				</div>

				<div class="order-summary__row">
					<span class="order-summary__label order-summary__label--highlight">Money Back Guarantee</span>
					<span class="order-summary__value order-summary__value--highlight">14 Days</span>
				</div>

				<div class="order-summary__row edd_cart_total">
					<span class="order-summary__label">BigBox WooCommerce Theme</span>
					<span class="order-summary__value edd_cart_amount" data-total="108.00">$108.00</span>
				</div>

			</div>
		</div>
	</div>
</div>
