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
	const scrollOffset = 165;
	if (scroll > scrollOffset && $('body').hasClass('is-scrolled')) { return; }

	if (scroll <= scrollOffset) {
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