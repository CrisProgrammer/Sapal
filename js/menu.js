$(document).ready(function(){
	var altura = 20;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu').addClass('menu-desplazar');
            $('#logo').attr("width","150px");
		} else {
			$('.menu').removeClass('menu-desplazar');
            $('#logo').attr("width","350px");
		}
	});

	var id_body = $('body').attr("id");
		objeto= document.getElementById("id_body");
	if (id_body==="inicio"){
		$("li #inicio1").addClass('active');
	} else {
		$("li #inicio1").removeClass('active');
	} 

	if (id_body==="proveedores"){
		$("li #proveedores1").addClass('active');
	} else {
		$("li #proveedores1").removeClass('active');
	} 
	if (id_body==="product"){
		$("li #product1").addClass('active');
	} else {
		$("li #product1").removeClass('active');
	} 
	if (id_body==="login"){
		$("li #login1").addClass('active');
	} else {
		if (id_body==="login_activo"){
			$("li #login1").addClass('active');
			$("#login1").text("Cerrar sesión");
		} else {
			$("li #login1").removeClass('active');
			$("#login1").text("Inicio de sesión");

		}
	}
});