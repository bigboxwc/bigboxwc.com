/**
 * External dependencies.
 */
import 'bootstrap/js/dist/modal';

(function(window, undefined){
	window.wp       = window.wp || {};
	const $         = window.jQuery;
	const modalTmpl = wp.template('modal');

	// @todo only supports pages currently.
	const showModal = function(options = {}) {
		const $modal = $('#bigbox-ajax-modal');
		const pages  = new wp.api.collections.Pages();

		pages.fetch({
			data: {
				slug: options.slug,
			},
			success: function(collection) {
				if (collection.models[0]) {
					const data   = collection.models[0].attributes;
					const $modal = $(modalTmpl(data));

					// Show modal.
					$modal.modal('show');

					// Keep only one instance in the DOM.
					$modal.on('hidden.bs.modal', function() {
						$modal.modal('dispose');
						$modal.remove();
					});
				}

				return null;
			},
			error: function() {
				return null;
			}
		});

		return null;
	}
	
	$(function($) {
		$('.js-modal-trigger--ajax').on('click', function(e) {
			e.preventDefault();

			const $link = $(this);
			const slug  = $link.data('slug');

			return showModal({
				slug,
			});
		});
	});

})(window);
