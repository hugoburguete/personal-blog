window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
	require('slick-carousel');
} catch (e) {}

// Header Fading
$(document).ready(function($) {
	let scroll = $(window).scrollTop();
	doHeaderAnimation(scroll);
});
$(window).on('scroll', function(event) {
	let scroll = $(this).scrollTop();
	doHeaderAnimation(scroll);
});

function doHeaderAnimation(scroll) {
	if (scroll != 0 && $('body').hasClass('is-scrolled')) { return; }

	if (scroll == 0) {
		$('body').removeClass('is-scrolled');
	} else {
		$('body').addClass('is-scrolled');
	}
}

// Homepage carousel
$('.carousel-articles').slick({
	infinite: true,
	slidesToShow: 1,
	dots: true,
	autoplay: true,
	autoplaySpeed: 4000,
});