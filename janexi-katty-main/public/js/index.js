$(document).ready(function(){

$("#inicio").click(function(e){
		e.preventDefault();
	window.location.reload();

});

$("#actividades").click(function(e){
	e.preventDefault();
	$("#section").load("public/html/actividad.php");
});

$("#mision").click(function(e){

	e.preventDefault();
	$("#section").load("public/html/mision.html");
});

$("#vision").click(function(e){

	e.preventDefault();
	$("#section").load("public/html/vision.html");
});

$("#quienes").click(function(e){
	e.preventDefault();
	$("#section").load("public/html/quienessomos.html");
});
$("#acceso").submit(function(e){
			e.preventDefault();
			$.ajax({
				type:"post",
				url:"modulos/validarusuarios.php",
				data: $(this).serialize(),

				beforeSend : function(){

				},
				success: function(respuesta){
					$("#mensajedeusuario").css("display","block").html(respuesta).fadeOut(6000);
				}
			});
		
		});
$("#galeria").click(function(e){

	e.preventDefault();
	$.ajax({
		type:"post",
		url:"public/html/galeria.php",
		beforeSend: function(){
			$("#section").html("<img src= public/img/load.gif>");
		},
		success: function(respuesta){
			$("#section").html(respuesta);
		}
	});

	});

		$(document).on('click',"#generarpdfaniversarios",function(){
		window.location="modulos/pdfaniversarios.php";
		});

		$(document).on('click',"#generarpdfcultos",function(){
			window.location="modulos/pdfcultosunidos.php";
		});
		$(document).on('click',"#generarpdfcampañas",function(){
			window.location="modulos/pdfcampanamasiva.php";
		});
		$(document).on('click',"#generarpdfcongresos",function(){
			
			window.location="modulos/pdfcongresos.php";
		});

		$(document).on('click',"#generarpdftodasactividades",function(){
			
			window.location="modulos/pdftodasactividades.php";
		});

		$("#cena").click(function(e){
			e.preventDefault();
			$("#section").load("public/html/santacena.html");
		});

		$("#oracion").click(function(e){
			e.preventDefault();
			$("#section").load("public/html/oracion.html");
		});

		$("#historia").click(function(e){
			e.preventDefault();
			$("#section").load("public/html/historia.html");
		});


		$(document).on("click","#verdatos",function(e){
			e.preventDefault();
			ver =  $(this).closest("tr").find(".id").text();
			$.ajax({

				type:"post",
				url:"modulos/verinfoactividad.php",
				data:{ver:ver},
				beforeSend : function(){
					$("#section").css("display","block").html("<img src='public/img/load.gif'>");
				},
				success : function(respuesta){

					$("#section").html(respuesta);

				}

			});
		});
		$(document).on('click',"#iglesias",function(e){
			e.preventDefault();
			$("#section").load("public/html/iglesias.php");
		});

});