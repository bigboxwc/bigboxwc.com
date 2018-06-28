<?php
/**
 * Guest access.
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

<nav id="access" class="access">
	<a href="#access-toggle" class="access-item--close access-item" aria-label="Close">&times; Close</a>
	<a href="/features/" class="access-item <?php echo esc_attr( is_page( 'features' ) ? 'access-item--active' : null ); ?>">All Features</a>
	<a href="/theme-demos/" class="access-item <?php echo esc_attr( is_page( 'theme-demos' ) ? 'access-item--active' : null ); ?>">Live Demo</a>
	<a href="https://blog.bigboxwc.com/" class="access-item">Blog &amp; Resources</a>
	<a href="/account/" class="access-item">Account</a>

	<a href="/buy/" class="access-item <?php echo esc_attr( ! is_page( 'features' ) ? 'access-item--active' : null ); ?>">Get BigBox</a>
</nav>
