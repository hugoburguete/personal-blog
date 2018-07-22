window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
	require('slick-carousel');
} catch (e) {}

$('.carousel-articles').slick({
	infinite: true,
	slidesToShow: 1,
	dots: true,
	autoplay: true,
	autoplaySpeed: 4000,
});