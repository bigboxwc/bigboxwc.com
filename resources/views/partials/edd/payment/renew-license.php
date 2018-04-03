<?php
/**
 * Renew an expired license.
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
			<?php bigbox_svg( 'graphic-hospital' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">🚨 Your License Has Expired</h3>

			<p>A valid license is required to download your files and access technical support.</p>

			<p>
				<a href="<?php echo esc_url( $license->get_renewal_url() ); ?>" class="button button--primary">Renew License</a>
			</p>
		</div>

	</div>
</div>
