$(document).ready(function(){
	var activado=true;
	$('.menu li:has(ul)').click(function(e){
		e.preventDefault();
		if ($(this).hasClass(activado)){
			$(this).removeClass('activado')
			$(this).children(ul).slideUp();
		}
		else{
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
			return false;
		}
	})

	$('.bt-menu').click(function(){
		$('.menu-toggle .menu').slideToggle();
	});
	$(window).resize(function(){
		if ($(document).width()>450){
			$('.menu-toggle .menu').css({'display': 'block'});
		}
		if ($(document).width()<450){
			$('.menu-toggle .menu').css({'display': 'none'});
			$('menu	li ul').slideUp();
			$('menu	li ul').removeClass('activado');
		}
	});
});

/*	var activados = 1;

    $('nav').click(function(){
        if (contador == 1) {
            $('.menu li').addClass('activado');
            activados = 0;
            return false;
        } else {
            $('.menu li').removeClass('activado');
            activados = 1;
            return false;
        }
    });

});


/*(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var burgerMenu = function() {

		$('.js-colorlib-nav-toggle').on('click', function(event) {
			event.preventDefault();
			var $this = $(this);
			if( $('body').hasClass('menu-show') ) {
				$('body').removeClass('menu-show');
				$('#colorlib-main-nav > .js-colorlib-nav-toggle').removeClass('show');
			} else {
				$('body').addClass('menu-show');
				setTimeout(function(){
					$('#colorlib-main-nav > .js-colorlib-nav-toggle').addClass('show');
				}, 900);
			}
		})
	};
	burgerMenu();


})(jQuery);*/
