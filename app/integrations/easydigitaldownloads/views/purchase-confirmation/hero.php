<?php
/**
 * Purchase confirmation hero.
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

<div class="block block--alt feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">🎉 You're Ready to Go!</h3>

			<p class="block-subtitle">Follow the steps below to install your WooCommerce theme and learn about ways you can take to supercharge your new eCommerce website.</p>
			<p class="block-subtitle" style="opacity: 1;"><a href="<?php echo esc_url( bigbox_edd_get_download_url() ); ?>" class="button button--primary">Download Theme Files</a></p>
			<p class="block-subtitle hero-receipt__view-receipt"><a href="<?php echo esc_url( bigbox_edd_get_receipt_url() ); ?>" style="font-size: 14px;">View Full Receipt</a></p>
		</div>

	</div>
</div>
