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
?>

<div class="block block--alt feature-callout page-header">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-receipt' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">📦 Your BigBox Purchase</h3>

			<p>Your BigBox theme subscription will automatically renew on <strong><?php echo esc_html( ! empty( $subscription->expiration ) ? date_i18n( get_option( 'date_format' ), strtotime( $subscription->expiration ) ) : __( 'N/A', 'bigbox' ) ); ?></strong> for <?php echo edd_currency_filter( edd_format_amount( $subscription->recurring_amount ) ); ?>.</p>

			<p>
				<strong>License Key:</strong><br />
				<input type"text" class="form-input next-steps__license-key" value="<?php echo esc_attr( $license->key ); ?>" onClick="this.select();" />
			</p>
		</div>

	</div>
</div>
