window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
	require('slick-carousel');
} catch (e) {}