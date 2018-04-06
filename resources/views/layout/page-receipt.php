<?php
/**
 * Template Name: Page: Receipt
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

bigbox_view(
	'global/header', [
		'min' => true,
	]
);

if ( ! is_user_logged_in() ) :
	echo do_shortcode( '[edd_login redirect="/checkout/payment-history/"]' );
else :
	$allgood = bigbox_edd_allgood();
	$payment = bigbox_edd_get_payment();
	$license = bigbox_edd_get_license();

	if ( '' !== $allgood ) :
		echo $allgood; // WPCS: XSS okay.
	else :
?>

<div class="block block--alt">

	<div class="block-header">
		<h1 class="block-title">Purchase Receipt</h3>
		<p class="block-subtitle">Details for your <?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $payment->date ) ) ); ?> payment.</p>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<p class="card__label">Purchase Details</p>

				<div class="card card__inner card__inner--mini">

					<div class="order-summary">

						<div class="order-summary__row">
							<span class="order-summary__label">Status</span>
							<span class="order-summary__value order-summary__value--<?php echo esc_attr( edd_get_payment_status( $payment ) ); ?>"><?php echo esc_html( edd_get_payment_status( $payment, true ) ); ?></span>
						</div>

						<div class="order-summary__row">
							<span class="order-summary__label">Method</span>
							<span class="order-summary__value"><?php echo esc_html( edd_get_gateway_checkout_label( edd_get_payment_gateway( $payment->ID ) ) ); ?></span>
						</div>

						<?php
						$fees = edd_get_payment_fees( $payment->ID, 'fee' );

						if ( $fees ) :
							foreach ( $fees as $fee ) :
						?>

						<div class="order-summary__row">
							<span class="order-summary__label"><?php echo esc_html( $fee['label'] ); ?></span>
							<span class="order-summary__value"><?php echo esc_html( edd_currency_filter( edd_format_amount( $fee['amount'] ) ) ); ?></span>
						</div>

						<?php
							endforeach;
						endif;
						?>

						<div class="order-summary__row">
							<span class="order-summary__label"><?php echo esc_html__( 'Total', 'bigbox' ); ?></span>
							<span class="order-summary__value"><strong><?php echo esc_html( edd_payment_amount( $payment->ID ) ); ?></strong></span>
						</div>

					</div>

				</div>

				<p class="card__label">Subscription Details</p>

				<div class="card card__inner card__inner--mini">
					<?php echo do_shortcode( '[edd_subscriptions]' ); ?>
				</div>

				<p class="card__label">License Details</p>

				<div class="card card__inner card__inner--mini">

					<div class="order-summary">

						<div class="order-summary__row">
							<span class="order-summary__label">Status</span>
							<span class="order-summary__value order-summary__value--<?php echo esc_attr( $license->status ); ?>"><?php echo esc_html( ucfirst( $license->status ) ); ?></span>
						</div>

						<div class="order-summary__row">
							<span class="order-summary__label">License Key</span>
							<span class="order-summary__value"><?php echo esc_html( $license->key ); ?></span>
						</div>

					</div>

					<?php
					if( edd_sl_license_has_upgrades( $license->ID ) && 'expired' !== edd_software_licensing()->get_license_status( $license->ID ) ) : 
						$upgrades = edd_sl_get_license_upgrades( $license->ID );
					?>
						<p>
							<a href="<?php echo esc_url( edd_sl_get_license_upgrade_url( $license->ID, 1 ) ); ?>" class="button button--primary button--size-sm">
								Upgrade to Unlimited Activations
							</a>
						</p>
					<?php endif; ?>

					<p><strong>Activations: <?php echo esc_html( $license->activation_count . ' / ' . ( 0 === $license->activation_limit ? '&infin;' : $license->activation_limit ) ); ?></strong></p>

					<div class="order-summary">

					<?php
					if ( $license->sites ) :
						foreach ( $license->sites as $site ) :
					?>

						<div class="order-summary__row">
							<span class="order-summary__label"><?php echo esc_html( $site ); ?></span>
							<span class="order-summary__value"><a href="<?php echo wp_nonce_url( add_query_arg( array( 'edd_action' => 'deactivate_site', 'site_url' => $site, 'license' => $license->ID ) ), 'edd_deactivate_site_nonce', '_wpnonce' ); ?>">Deactivate</a></span>
						</div>

					<?php
						endforeach;
					endif;
					?>

					<?php
						$status = $license->status;
						$at_limit = ( $license->activation_count === $license->activation_limit ) && 0 !== $license->activation_limit;
					?>

					<?php if ( ! $at_limit && ( $status == 'active' || $status == 'inactive' ) && get_post_status( $license->ID ) !== 'draft' ) : ?>
					<form method="post" id="edd_sl_license_add_site_form" class="edd_sl_form">
						<p class="form-row">
							<label for="site_url" class="screen-reader-text">Authorize a website for automatic updates:<label>
							<input type="text" name="site_url" class="form-input" placeholder="http://"/>
						</p>

						<p class="form-row">
							<input type="submit" class="button button--primary button--size-sm" value="Authorize" />
							<input type="hidden" name="license_id" value="<?php echo esc_attr( $license->ID ); ?>"/>
							<input type="hidden" name="edd_action" value="insert_site"/>
							<?php wp_nonce_field( 'edd_add_site_nonce', 'edd_add_site_nonce', true ); ?>
						</p>
					</form>

					<?php endif; ?>

					</div>

				</div>

				<p><a href="<?php echo esc_url( get_permalink( edd_get_option( 'purchase_history_page' ) ) ); ?>">&larr; Back</a></p>

			</div>
		</div>
	</div>
</div>

<?php
	endif;
endif;

bigbox_view( 'global/footer' );
