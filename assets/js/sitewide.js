$(document).ready(function () {
	$("#home-menu").click(function(e) {
		e.preventDefault();
		$("#header-nav").stop(true, true).slideToggle();
	});
	
	$("#header-nav .menu .menu-item-has-children").on('click touchend', function(e) {
		var clicked = $(e.target);
		if (! clicked.hasClass('sub-menu') && ! clicked.parents().hasClass('sub-menu')) {
			e.preventDefault();
			$(this).toggleClass('open');
			$(this).children('.sub-menu').stop(true, true).slideToggle();
		}
		else if (e.type === 'touchend' && ! $(this).hasClass('open')) {
			e.preventDefault();
			$(this).addClass('open');
		}
	});
	
	var sliderSpeed = 750;
	var sliderTimer = 5000;
	var $slider = $('.progrssbar-slider');
	
	$slider.on( 'afterChange', function( event, slick, currentSlide ) {
		$( this ).addClass( 'first-load-done' );
	});
	
	$slider.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: sliderSpeed,
		dots: true,
		appendDots: $('.progrssbar-and-dots'),
		arrows: true,
		autoplay: true,
		autoplaySpeed: sliderTimer,
		pauseOnHover: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
		appendArrows: $('.progrssbar-and-dots'),
	});
	//progressbar($slider);
	var $hero_slider = $('.hero-slider-slides');	
	$hero_slider.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: sliderSpeed,
		dots: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 7000,
	});
	var $sign_banner_slider = $('.sign-slider');

	$sign_banner_slider.on( 'afterChange', function( event, slick, currentSlide ) {
		$( this ).addClass( 'first-load-done' );
	});
	
	$sign_banner_slider.slick({
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: sliderSpeed,
		dots: true,
		appendDots: $('.progrssbar-and-dots'),
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
		appendArrows: $('.progrssbar-and-dots'),
		autoplay: true,
		autoplaySpeed: sliderTimer,
		pauseOnHover: true,
	});
	//progressbar($sign_banner_slider);
	
	$hero_slider.on( 'beforeChange', function ( event, slick, currentSlide, nextSlide ) {
		$('.rotate-plus-image').attr( 'data-slide', nextSlide);
	});
	
	checkLoad();

});

function progressbar($slider) {
	var $progressBar = $('.progress');
	var $progressBarLabel = $('.slider__label');

	$slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {		
		var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
		$progressBar
			.css('background-size', `${calc}% 100%`)
			.attr('aria-valuenow', calc);
		$progressBarLabel.text( calc + '% completed' );
	});
}

$(window).on('load resize orientationchange scroll', function() {
	checkLoad();
});

function checkLoad() {
	var scrolled = $(window).scrollTop();
	var windowHeight = window.innerHeight;
	
	$(".rolling:not(.rolled)").each(function() {
		var el = $(this);
		var elTop = el.offset().top;
		var elHeight = el.outerHeight();
		var elMiddle = elTop + (elHeight / 2);
		
		// if middle of element is in the viewport
		if (elMiddle >= scrolled && elMiddle <= (scrolled + windowHeight)) {
			roll_number(el);
		}
	});
	
	if (scrolled > 500) {
		$("#scroll-to-top").addClass('visible');
	}
	else {
		$("#scroll-to-top").removeClass('visible');
	}
}

function roll_number(el) {
	var rollup = el;
	rollup.addClass('rolled');
	var target = parseInt(rollup.attr('data-to'));
	rollup.prop('Counter', 0).animate({
			Counter: target
		}, 
		{
			duration: 1800,
			easing: 'swing',
			step: function(now) {
				var value = Math.ceil(now);
				var comma = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				rollup.text(comma).append('+');
			}
		}
	);
}