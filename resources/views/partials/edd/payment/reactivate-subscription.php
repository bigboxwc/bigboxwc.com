<?php
/**
 * Reactivate a cancelled subscription.
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
			<?php bigbox_svg( 'graphic-hospital' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">⚠️  Your Subscription is Ending</h3>

			<p>Your subscription will end on <strong><?php echo esc_html( ! empty( $subscription->expiration ) ? date_i18n( get_option( 'date_format' ), strtotime( $subscription->expiration ) ) : __( 'N/A', 'bigbox' ) ); ?></strong>. You will need an active subscription to maintain access to your downloads and technical support.</p>

			<?php if ( $subscription->can_reactivate() ) : ?>
			<p>
				<a href="<?php echo esc_url( $subscription->get_reactivation_url() ); ?>" class="button button--primary">Reactivate Subscription</a>
			</p>
			<?php endif; ?>

			<p>
				<strong>License Key:</strong><br />
				<input type"text" class="form-input next-steps__license-key" value="<?php echo esc_attr( $license->key ); ?>" onClick="this.select();" />
			</p>
		</div>

	</div>
</div>
