<?php
/**
 * Purchase history hero.
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

$license      = bigbox_edd_get_license();
$subscription = bigbox_edd_get_subscription();
?>

<div class="block block--alt feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-programmer' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">📦 Manage Your BigBox Purchase</h3>

			<p class="block-subtitle">Access your files, one-on-one technical support, and more from your account dashboard. Your subscription will automatically renew on <strong><?php echo esc_html( ! empty( $subscription->expiration ) ? date_i18n( get_option( 'date_format' ), strtotime( $subscription->expiration ) ) : __( 'N/A', 'bigbox' ) ); ?></strong>.</p>

			<p class="block-subtitle">
				<strong>License Key:</strong><br />
				<input type"text" class="form-input next-steps__license-key" value="<?php echo esc_attr( $license->key ); ?>" onClick="this.select();" />
			</p>
		</div>

	</div>
</div>
