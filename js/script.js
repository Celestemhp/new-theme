window.addEventListener('DOMContentLoaded', () => {
	SVGInject(document.querySelectorAll('img.injectable'));
});

(function () {
	const desktopMenuBtn = document.querySelectorAll('.toggle-menu');
	const desktopMenu = document.querySelector('#lunnar-menu');

	desktopMenuBtn.forEach((item) => {
		item.addEventListener('click', (e) => {
			e.preventDefault();

			if (desktopMenu.classList.contains('is-active')) {
				desktopMenu.classList.remove('is-active');
			} else {
				desktopMenu.classList.add('is-active');
			}
		});
	});
})();

/**
 * Slide to anchor
 */
(function ($) {
	// slide to anchor
	$(document).on('click', '.slide-to', function (e) {
		var url = $(this).attr('href');
		var offset = 0;

		if ($(this).data('offset')) {
			offset = $(this).data('offset');
		}

		// check if link contains '#'
		if (/#/.test(url)) {
			// get text after hash
			var link = url.split('#')[1];
			var target = $('#' + link);

			// check if target div (anchor) exists on page
			if (target.length == 0) {
				return;
			}

			e.preventDefault();

			$('html, body').animate(
				{
					scrollTop: target.offset().top - 50,
				},
				500
			);
		}
	});
})(jQuery);

// gallery overlay
(function ($) {
	$('.wp-block-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery: {
			enabled: true,
			tCounter: '<span>%curr% av %total%</span>',
		},
	});
})(jQuery);
