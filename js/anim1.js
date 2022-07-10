$(document).ready(function(){
    $('#productos').on('click', '#filtro-letras #lista1 li a', function(){
        const letras = document.getElementsByClassName('letras');
        for (i=0; i<letras.length;++i){
                $('#'+letras[i].id).removeClass('activar_letra');
            }
        $(this).addClass('activar_letra');
    })
})