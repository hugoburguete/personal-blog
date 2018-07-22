window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
	require('slick-carousel');
} catch (e) {}

$('.article-carousel').slick({
	infinite: true,
	slidesToShow: 1
});