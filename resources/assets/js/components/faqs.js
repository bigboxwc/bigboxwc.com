/**
 * Toggle FAQ items.
 */

const $toggle = $('.faq__title');

$toggle.on('click', function(e) {
  e.preventDefault();

  $(this).parents('.faq').toggleClass('faq--active');
});
