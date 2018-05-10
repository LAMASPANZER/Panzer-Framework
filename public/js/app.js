$(document).ready(function () {

	// search form toggle
	$(".search-toggle button").click(function(){
			$(".search-form").slideToggle();
	});

	//$(".sticky").sticky({topSpacing: 0, zIndex: 10});
	$('[data-toggle="tooltip"]').tooltip();
});
//back to top
	if ($('#back-to-top').length) {
		var scrollTrigger = 100, // px
				backToTop = function () {
					var scrollTop = $(window).scrollTop();
					if (scrollTop > scrollTrigger) {
						$('#back-to-top').addClass('show');
					} else {
						$('#back-to-top').removeClass('show');
					}
				};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
