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

bigbox_view(
	'global/header', [
		'min' => true,
	]
);

wp_enqueue_script( 'bigbox-support' );

if ( ! is_user_logged_in() ) :
?>

<div class="block block--alt">
	<?php echo do_shortcode( '[edd_login redirect="/support/"]' ); ?>
</div>

<?php
else :
	$allgood = bigbox_edd_allgood(
		[
			'payment'      => bigbox_edd_get_payment(),
			'license'      => bigbox_edd_get_license(),
			'subscription' => bigbox_edd_get_subscription(),
		]
	);

	if ( '' !== $allgood ) :
		echo $allgood; // WPCS: XSS okay.
	else : // All good in the hood.
		the_post();
?>

<div class="block block--alt feature-callout page-header">
	<div class="container media">

		<div class="feature-callout__media">
			<?php bigbox_svg( 'graphic-woman-support' ); ?>
		</div>

		<div class="feature-callout__content">
			<h3 class="feature-callout__title">🔎 Review the Documentation</h3>

			<p>Before submitting a ticket please search the <a href="https://docs.bigboxwc.com/">documentation</a>.</p>

			<form class="docs-search" method="GET" action="https://docs.bigboxwc.com/search">
				<p class="form-row">
					<strong>Find Answers:</strong><br />
					<input type"text" id="docs-search-keywords" class="form-input docs-search__keywords" value="" placeholder="Installing a WordPress theme..." name="query" />
					<input type="submit" value="Search" class="button button--primary button--size-sm" />
				</p>

				<ul id="docs-search-results" class="docs-search__results"></ul>
			</form>

			<p><strong>Please note:</strong> We are not able provide website customization, setup, or maintenance services.</p>

		</div>

	</div>
</div>

<div class="block">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-xl-8">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
	endif;
endif;

bigbox_view( 'tmpl/tmpl-docs-search-result' );
bigbox_view( 'global/footer' );
