<?php
/**
 * Template Name: Page: Support
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

bigbox_view( 'global/header-min' );

if ( ! is_user_logged_in() ) :
?>

<div class="block block--alt">
	<?php echo do_shortcode( '[edd_login redirect="/support/"]' ); ?>
</div>

<?php
else :
	$allgood = bigbox_edd_allgood( [
		'payment'      => bigbox_edd_get_payment(),
		'license'      => bigbox_edd_get_license(),
		'subscription' => bigbox_edd_get_subscription(),
	] );

	if ( '' !== $allgood ) :
		echo $allgood; // WPCS: XSS okay.
	else : // All good in the hood.
		the_post();
?>

<div class="block block--alt feature-callout">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-programmer' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">🔎 Review the Documentation</h3>

			<p>Before submitting a ticket please search the documentation.</p>

			<form>
				<p class="form-group">
					<strong>Find Answers:</strong><br />
					<input type"text" class="form-input next-steps__license-key" value="" placeholder="Installing a WordPress theme..." />
					<input type="submit" value="Search" class="button button--primary button--size-sm" />
				</p>
			</form>
		</div>

	</div>
</div>

<div class="block">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-10 col-lg-8">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
	endif;
endif;

bigbox_view( 'global/footer' );
