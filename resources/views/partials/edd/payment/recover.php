<?php
/**
 * Recover a purchase.
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

$payment = bigbox_edd_get_payment();
?>

<div class="block block--alt feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">Incomplete Purchase</h3>

			<p>Please <a href="/contact/">contact us</a> if you believe this is an error.</p>

			<p>
				<a href="<?php echo esc_url( $payment->get_recovery_url() ); ?>" class="button button--primary">Recover Purchase</a>
			</p>
		</div>

	</div>
</div>
