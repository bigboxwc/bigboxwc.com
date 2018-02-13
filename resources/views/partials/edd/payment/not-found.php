<?php
/**
 * Receipt not found.
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

<div class="block feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-chip-head' ); ?>
		</div>

		<div class="block-header block-header--left media-body">
			<h3 class="block-title">😢 No Purchases Found</h3>

			<p class="block-subtitle">Sorry, there is no active purchase for <strong><?php echo esc_html( wp_get_current_user()->user_email ); ?></strong>. Please <a href="/contact/">contact support</a> if you believe this is an error.</p>

			<p class="block-subtitle"><a href="/buy/" class="button button--primary">Get BigBox Now</a></p>
		</div>

	</div>
</div>
