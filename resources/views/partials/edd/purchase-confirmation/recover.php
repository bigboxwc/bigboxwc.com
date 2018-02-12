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

$purchase = bigbox_edd_get_purchase();
?>

<div class="block feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">Incomplete Purchase</h3>

			<p class="block-subtitle">Please <a href="/contact/">contact support</a> if you believe this is an error.</p>

			<p class="block-subtitle">
				<a href="<?php echo esc_url( $purchase->get_recovery_url() ); ?>" class="button button--primary">Recover Purchase</a>
			</p>
		</div>

	</div>
</div>
