$(document).ready(main);

var contador = 1;

function main () {

    $('.menu-toggle').click(function(){
        if (contador == 1) {
            $('nav').animate({
                left:'0'
            });
            contador = 0;
            return false;
        } else {
            $('nav').animate({
                left: '-100%'
            });
            contador = 1;
            return false;
        }
    });
}