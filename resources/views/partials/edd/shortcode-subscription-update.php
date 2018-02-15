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

if ( ! is_user_logged_in() ) :
	return;
endif;

$subscriber   = new EDD_Recurring_Subscriber( get_current_user_id(), true );
$subscription = bigbox_edd_get_subscription();

if ( ! $subscription || $subscription->customer_id !== $subscriber->id ) :
	return;
endif;

edd_print_errors();
?>

<form action="" id="edd-recurring-form" method="POST">
	<p class="form-row">
		<a href="<?php echo esc_url( bigbox_edd_get_receipt_url() ); ?>" class="ui-red">&larr; Cancel</a>
	</p>

	<input name="edd-recurring-update-gateway" type="hidden" value="<?php echo esc_attr( $subscription->gateway ); ?>" />

	<?php wp_nonce_field( 'update-payment', 'edd_recurring_update_nonce', true, true ); ?>

	<div id="edd_checkout_form_wrap">
		<?php
		do_action( 'edd_recurring_before_update', $subscription->id );

		do_action( 'edd_recurring_update_payment_form', $subscription );

		do_action( 'edd_recurring_after_update', $subscription->id );
		?>
	</div>

	<input type="hidden" name="edd_action" value="recurring_update_payment" />
	<input type="hidden" name="subscription_id" value="<?php echo esc_attr( $subscription->id ); ?>" />
	<input type="submit" name="edd-recurring-update-submit" id="edd-recurring-update-submit" class="button button--primary button--size-block" value="<?php echo esc_attr( __( 'Update Payment Method', 'bigbox' ) ); ?>" />
</form>
