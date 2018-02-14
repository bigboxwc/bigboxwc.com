(function(window, undefined){
	const $ = window.jQuery;
	
	$(function($) {
    $('.feature-item--overlay').on('click', function() {
      const $link = $(this);
      console.log($link);
    });
  });
})(window);
