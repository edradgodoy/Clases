$(document).ready(function(){

	$("#entradafecha").datepicker({
	changeMonth:true,
	changeYear:true,
	dateFormat:"yy/mm/dd",
	isRTL: false,
	});

	$("#buscar").on("click",function(){
		opcionbusqueda = $(this).val();
		if(opcionbusqueda=="todos")
		{
			$("#entradafecha").css("display","none");
		}
		 if(opcionbusqueda=="fecha")
		{
			$("#entradafecha").css("display","block");
		}
	});
	$("#entradafecha").css("display","none");

$("#actividad").submit(function(e){
		e.preventDefault();
		
		if($("#tipo").val()=="aniversarios")
		{
			if($("#buscar").val()=="todos")
			{

				$.ajax({
					type:"post",
					url:"modulos/aniversarios.php",
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});
			}
			else if($("#buscar").val()=="fecha")
			{
				actividad = "Aniversario";
				fecha = $("#entradafecha").val();
				$.ajax({
					type:"post",
					url:"modulos/veradtividadporfecha.php",
					data : {actividad:actividad, fecha:fecha},
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});
			}
		}
		else if($("#tipo").val()=="cultos")
		{
			if($("#buscar").val()=="todos")
			{
				$.ajax({
					type:"post",
					url:"modulos/cultos.php",
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});
			}
			else if($("#buscar").val()=="fecha"){
				actividad = "Cultos Unidos";
				fecha = $("#entradafecha").val();
				$.ajax({
					type:"post",
					url:"modulos/veradtividadporfecha.php",
					data : {actividad:actividad, fecha:fecha},
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});
			}

		}
		else if ($("#tipo").val()=="campaña")
		{
			if($("#buscar").val()=="todos")
			{
				$.ajax({
					type:"post",
					url:"modulos/campaña.php",
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});
			}
			else if($("#buscar").val()=="fecha")
			{
				actividad = "Campana Masiva";
				fecha = $("#entradafecha").val();
				$.ajax({
					type:"post",
					url:"modulos/veradtividadporfecha.php",
					data : {actividad:actividad, fecha:fecha},
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});

			}
		}
		else if($("#tipo").val()=="congresos")
		{
			if($("#buscar").val()=="todos")
			{
				$.ajax({
					type:"post",
					url:"modulos/congresos.php",
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});
			}
			else if($("#buscar").val()=="fecha")
			{
				actividad = "Congresos";
				fecha = $("#entradafecha").val();
				$.ajax({
					type:"post",
					url:"modulos/veradtividadporfecha.php",
					data : {actividad:actividad, fecha:fecha},
					beforeSend: function(){
						$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
					},
					success: function(respuesta){
						$("#sectionactividad").css("display","block").html(respuesta);
					}
				});

			}

		}
		else if($("#tipo").val()=="todas")
		{
			
			$.ajax({
				type:"post",
				url:"modulos/todasactividades.php",
				beforeSend: function(){
					$("#sectionactividad").css("display","block").html("<img src='public/img/load.gif'>");
				},
				success: function(respuesta){
					$("#sectionactividad").css("display","block").html(respuesta);
				}
			});
		}
		else
		{
			$("#sectionactividad").css("display","block").html("<h3>Error en seleccion</h3>");
		}

	});

	$(document).on('click',"#generarpdfcongresos",function(){
			
			window.location="modulos/pdfcongresos.php";
		});

	$(document).on('click',"#generarpdfactividadesporfecha",function(e)
	{
		e.preventDefault();

		tipo = $(".tipo").text()[0]+$(".tipo").text()[1]+$(".tipo").text()[2];
		fecha = $(".fecha").text()[0]+$(".fecha").text()[1]+$(".fecha").text()[2]+$(".fecha").text()[3]+$(".fecha").text()[4]+$(".fecha").text()[5]+$(".fecha").text()[6]+$(".fecha").text()[7]+$(".fecha").text()[8]+$(".fecha").text()[9];
		if(tipo=="Ani")
		{
			tipo="Aniversario";
		}
		else if(tipo=="Cul")
		{
			tipo="Cultos Unidos";
		}
		else if(tipo=="Cam")
		{
			tipo="Campana Masiva";
		}
		else if(tipo=="Con")
		{
			tipo="Congresos";
		}

		window.location="modulos/pdfactividadporfecha.php?actividad="+tipo+"&fecha="+fecha;

	});


});