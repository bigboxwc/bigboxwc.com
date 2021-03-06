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

<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-802911666/MQhLCIvzx4MBELLr7f4C',
      'transaction_id': ''
  });
</script>

<div class="block block--alt feature-callout page-header">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">🎉 You're Ready to Go!</h3>

			<p>Follow the steps below to install your WooCommerce theme and learn about ways you can take to supercharge your new eCommerce website.</p>

			<p><a href="<?php echo esc_url( bigbox_edd_get_download_url() ); ?>" class="button button--primary">Download Theme</a></p>

			<p><a href="<?php echo esc_url( bigbox_edd_get_receipt_url() ); ?>" style="font-size: 14px;">View Full Receipt</a></p>
		</div>

	</div>
</div>
