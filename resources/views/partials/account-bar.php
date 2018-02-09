<?php
/**
 * Account bar.
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

if ( is_page( edd_get_option( 'purchase_page' ) ) ) :
	return;
endif;
?>

<div class="account-bar">
	<div class="container">

		<nav class="access">
			<a href="/account/" class="access-item">Account</a>
			<a href="/support/" class="access-item">Support</a>
			<a href="/contact/" class="access-item">Contact</a>
		</nav>

	</div>
</div>
