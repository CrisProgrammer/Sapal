$(document).ready(function(){
    $(".topico02").on("mouseenter", function () {
        $(this).css('-webkit-box-shadow', '0 5px 15px rgba(0,0,0,0.3)');
        $(this).css('-moz-box-shadow', '0 5px 15px rgba(0,0,0,0.3)');
        $(this).css('box-shadow', '0 5px 15px rgba(0,0,0,0.3)');
        $(this).css('transition', 'box-shadow 0.5s ease-in-out');
    }).on("mouseleave", function () {
        $(this).css('-webkit-box-shadow', 'none');
        $(this).css('-moz-box-shadow', 'none');
        $(this).css('box-shadow', 'none');
    });

/*    $('.clases').on("onclick", function listar(aux){
    var id_letra = $('.topicos .botoncitos a').attr("id");
    if (id_letra==="A"){ 
            $("#A").addClass('activar_letra');
            return;
        } if (id_letra==="B"){
            $("#B").addClass('activar_letra');
            return;
            } if (id_letra==="C"){
            $("#C").addClass('activar_letra');
            return;
                } else {
                    $(".topicos .botoncitos a").removeClass('activar_letra');
                return;
                }
        });
    

*/
    
});