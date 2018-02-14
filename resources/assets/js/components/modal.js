/**
 * External dependencies.
 */

(function(window, undefined){
	window.wp = window.wp || {};
	const $   = window.jQuery;

	// @todo only supports pages currently.
	const showModal = function(options = {}) {
		const modalTmpl = wp.template('modal');
		const $modal    = $('#bigbox-ajax-modal');
		
		const pages = new wp.api.collections.Pages();

		pages.fetch({
			data: {
				slug: options.slug,
			},
			success: function(collection) {
				if (collection.models[0]) {
					const data = collection.models[0].attributes;

					console.log(data);
				} else {
					return null;
				}
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
