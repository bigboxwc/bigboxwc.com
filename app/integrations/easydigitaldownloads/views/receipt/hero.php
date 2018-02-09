<?php
/**
 * Receipt hero.
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

global $payment_id;

$cart  = edd_get_payment_meta_cart_details( $payment_id, true );
$email = edd_get_payment_user_email( $payment_id );
$meta  = edd_get_payment_meta( $payment_id );

if ( ! $cart ) :
	return;
endif;

// Get the only URL we need...
$url = null;

foreach ( $cart as $key => $item ) :
	if ( ! apply_filters( 'edd_user_can_view_receipt_item', true, $item ) ) :
		continue;
	endif;

	if ( empty( $item['in_bundle'] ) ) :
		$price_id       = edd_get_cart_item_price_id( $item );
		$download_files = edd_get_download_files( $item['id'], $price_id );

		if ( ! empty( $download_files ) && is_array( $download_files ) ) :
			foreach ( $download_files as $filekey => $file ) :
				$url = edd_get_download_file_url( $meta['key'], $email, $filekey, $item['id'], $price_id );
			endforeach;
		endif;
	endif;
endforeach;
?>

<div class="block block--alt feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">🎉 You're Ready to Go!</h3>

			<p class="block-subtitle">Follow the steps below to install your WooCommerce theme and learn about the next steps  you can take to supercharge your eCommerce website.</p>
			<p class="block-subtitle" style="opacity: 1;"><a href="<?php echo esc_url( $url ); ?>" class="button button--primary">Download Theme Files</a></p>
			<p class="block-subtitle hero-receipt__view-receipt"><a href="" style="font-size: 14px;">View Full Receipt</a></p>
		</div>

	</div>
</div>
