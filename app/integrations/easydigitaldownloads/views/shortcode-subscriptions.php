<?php
/**
 * Account subscription information.
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

$subscription = bigbox_edd_get_subscription();
?>

<div class="order-summary">

	<div class="order-summary__row">
		<span class="order-summary__label">Status</span>
		<span class="order-summary__value order-summary__value--highlight"><?php echo esc_html( $subscription->get_status_label() ); ?></span>
	</div>

	<div class="order-summary__row">
		<span class="order-summary__label">Renewal Date</span>
		<span class="order-summary__value"><?php echo esc_html( ! empty( $subscription->expiration ) ? date_i18n( get_option( 'date_format' ), strtotime( $subscription->expiration ) ) : __( 'N/A', 'bigbox' ) ); ?></span>
	</div>

	<div class="order-summary__row">
		<span class="order-summary__label">Renewal Amount</span>
		<span class="order-summary__value"><?php echo esc_html( edd_currency_filter( edd_format_amount( $subscription->initial_amount ), edd_get_payment_currency_code( $subscription->parent_payment_id ) ) ); ?></span>
	</div>

</div>

<p class="order-summary__subscription-details">
	<?php if ( $subscription->can_update() ) : ?>
		<a href="<?php echo esc_url( $subscription->get_update_url() ); ?>" class="button button--primary button--size-sm"><?php esc_html_e( 'Update Payment Method', 'bigbox' ); ?></a>
	<?php endif; ?>

	<?php if ( $subscription->can_renew() ) : ?>
		<a href="<?php echo esc_url( $subscription->get_renew_url() ); ?>" class="button button--primary button--size-sm"><?php esc_html_e( 'Renew', 'bigbox' ); ?></a>
	<?php endif; ?>

	<?php if ( $subscription->can_cancel() ) : ?>
		<a href="<?php echo esc_url( $subscription->get_cancel_url() ); ?>" class="button button--danger button--size-sm"><?php esc_html_e( 'Cancel', 'bigbox' ); ?></a>
	<?php endif; ?>

	<?php if ( $subscription->can_reactivate() ) : ?>
		<a href="<?php echo esc_url( $subscription->get_reactivation_url() ); ?>" class="button button--primary button--size-sm"><?php esc_html_e( 'Reactivate', 'bigbox' ); ?></a>
	<?php endif; ?>
</p>
