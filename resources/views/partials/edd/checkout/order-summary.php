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

$cart = edd_get_cart_contents();
$item = current( $cart );
?>

<div class="order-summary-wrap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<p class="card__label">Order Overview</p>

				<div class="order-summary__row">
					<span class="order-summary__label">Money Back Guarantee</span>
					<span class="order-summary__value order-summary__value--highlight">14 Days</span>
				</div>

				<div class="order-summary__row">
					<span class="order-summary__label">License Activation Limit</span>
					<?php if ( 1 !== (int) $item['options']['price_id'] ) : // Unlimited license. ?>
						<span class="order-summary__value order-summary__value--highlight">Unlimited Sites</span>
					<?php else : ?>
						<span class="order-summary__value order-summary__value--highlight">1 Site</span>
					<?php endif; ?>
				</div>

				<?php if ( 1 !== (int) $item['options']['price_id'] && isset( $item['options']['license_id'] ) ) : // Upgrading. ?>
				<div class="order-summary__row edd_cart_total">
					<span class="order-summary__label">License Upgrade</span>
					<span class="order-summary__value edd_cart_amount" data-total="<?php echo esc_attr( edd_get_cart_total() ); ?>"><?php edd_cart_total(); ?></span>
				</div>
				<?php endif; ?>

				<div class="order-summary__row edd_cart_total">
					<span class="order-summary__label">BigBox WooCommerce Theme</span>
					<span class="order-summary__value edd_cart_amount" data-total="<?php echo esc_attr( edd_get_cart_total() ); ?>"><?php edd_cart_total(); ?></span>
				</div>

			</div>
		</div>
	</div>
</div>
