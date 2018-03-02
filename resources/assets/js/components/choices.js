/**
 * External dependencies
 */
import Choices from 'choices.js';

/**
 * Create custom select boxes using Choices.js
 */
const $body = $( document.body );
const $document = $( document );

const args = {
	shouldSort: false,
	shouldSortItems: false,
};

const allSelects = () => {
	if ( $( 'select' ).length > 0 ) {
		new Choices( 'select', args );
	}
};

$( function() {
	allSelects();

	// Billing updated. Refresh.
	$body.on( 'edd_cart_billing_address_updated', ( e, data ) => {
		const $state = $( '#billing-state' );

		// Remove existing items.
		$state
			.find( '.choices, .form-input, .edd-input' )
			.remove();

		if ( 'nostates' === data ) {
			$state.append( '<input type="text" name="card_state" class="form-input" value="" />' );
		} else {
			// Add a fake element so EDD can replace it again.
			// @see https://github.com/easydigitaldownloads/easy-digital-downloads/blob/master/assets/js/edd-ajax.js#L459
			$state.append( '<input type="hidden" name="card_state" style="display: none;" />' );
			new Choices( '#edd_address_state', args );
		}
	} );

	// Gateway loaded. Refresh.
	$body.on( 'edd_gateway_loaded', () => {
		allSelects();
	} );

	// Gravity Forms rendered. Refresh.
	$document.on( 'gform_post_render', () => {
		allSelects();
	} );
} );
