<?php
/**
 * Branding
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="branding">
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php bigbox_svg( 'bigbox' ); ?>
		BigBox
	</a></h1>
</div>
