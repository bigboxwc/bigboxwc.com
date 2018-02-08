/**
 * External dependencies
 */
import Choices from 'choices.js';

// All selects.
const args = {
  shouldSort: false,
  shouldSortItems: false,
};

new Choices('select', args);

// EDD checkout supplements.
//
(function(window, undefined){
	const $ = window.jQuery;
	
	$(function($) {
    $(document.body).on('edd_cart_billing_address_updated', (e, data) => {
      const $state = $('#billing-state');

      $state
        .find('.choices, .form-input, .edd-input')
        .remove();

      if ('nostates' === data) {
          $state.append('<input type="text" name="card_state" class="form-input" value="" />');
      } else {
        // Add a fake element so EDD can replace it again.
        // @see https://github.com/easydigitaldownloads/easy-digital-downloads/blob/master/assets/js/edd-ajax.js#L459
        $state.append('<input type="hidden" name="card_state" style="display: none;" />');
        new Choices('#edd_address_state', args);
      }
    });
  });
})(window);
