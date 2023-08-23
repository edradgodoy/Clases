
$(document).ready(function(){

	$(document).on('click',"#generarpdfcampañas",function(){
		window.location="pdfcampanamasiva.php";
	});

		//agregar informacion de actividades
		$(document).on("click","#agregardatos",function(e){
			e.preventDefault();
			 ver =  $(this).closest("tr").find(".id").text();
			 $("#fotoinfo").val('');
			 $("#info").val('');
				$.ajax({
					type : "POST",
					url:"verificarinfoactividades.php",
					cache : false,
					data:{ver:ver},
					success : function(respuesta){

						json = JSON.parse(respuesta);

						if(json.respuesta=='editar')
						{
							$("#info").val(json.informacion);
							urlimg= json.fotos;
							$("#imgactividad").attr('src',json.fotos).css('display','block');
							$("#agregarinfo").modal("show");

							$("#siinfo, #noinfo").click(function(e)
							{
								e.preventDefault();
								opcion = $(this).val();
								if(opcion=="aceptar")
								{

									$("#agregarinfo").modal("hide");
									imagenes= document.querySelector("#fotoinfo");
									imagen=imagenes.files[0];
									info = $("#info").val();
									dato = new FormData();
									dato.append('imagen',imagen);
									dato.append('ver',ver);
									dato.append('info',info);
									dato.append('urlimg',urlimg);
									dato.append('cambio',json.respuesta);
									$.ajax({
										type : "POST",
										contentType:false,
										url:"registrarinformaciondeactividades.php",
										data: dato,
										processData:false,
										cache:false,

										beforeSend : function(){
											$("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
										},
										success : function(respuesta){
											if(respuesta=="<h3>datos registrado con exito</h3>")
											{
												$("#mensajestodos").css("background-color","green").html(respuesta).fadeOut(6000);

											}
											else
											{
												$("#mensajestodos").css("background-color", "red").html(respuesta).fadeOut(6000);
											}

										}
									});
							}
							else
							{
									$("#agregarinfo").modal("hide");
							}


						});

						}
						else if(json.respuesta=='agregar')
						{
							$("#imgactividad").css('display','none');
							$("#info").text('');
							$("#agregarinfo").modal("show");

							$("#siinfo, #noinfo").click(function()
							{
								opcion = $(this).val();
								if(opcion=="aceptar")
								{

									$("#agregarinfo").modal("hide");
									imagenes= document.querySelector("#fotoinfo");
									imagen=imagenes.files[0];
									info = $("#info").val();
									dato = new FormData();
									dato.append('imagen',imagen);
									dato.append('ver',ver);
									dato.append('info',info);
									dato.append('cambio',json.respuesta)
									$.ajax({
										type : "POST",
										contentType:false,
										url:"registrarinformaciondeactividades.php",
										data: dato,
										processData:false,
										cache:false,

										beforeSend : function(){
											$("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
										},
										success : function(respuesta){

											if(respuesta=="<h3>datos registrado con exito</h3>")
											{
												$("#mensajestodos").css("background-color","green").html(respuesta).fadeOut(6000);

											}
											else
											{
												$("#mensajestodos").css("background-color", "red").html(respuesta).fadeOut(6000);
											}

										}
									});
							}
							else
							{
									$("#agregarinfo").modal("hide");
									$("#info").val();
							}

						});
						}
						else
						{
							$("#mensajestodos").css("display","block").html("Error al capturar datos").fadeOut(6000);
						}


					}

						});
		});

		$(document).on("click","#verdatos",function(e){
			e.preventDefault();
			ver =  $(this).closest("tr").find(".id").text();
			$.ajax({

				type:"post",
				url:"verinfoactividad.php",
				data:{ver:ver},
				beforeSend : function(){
					$("#datosdebusqueda").css("display","block").html("<img src='../public/img/load.gif'>");
				},
				success : function(respuesta){

					$("#datosdebusqueda").html(respuesta);

				}

			});
		});

		$(document).on('mouseover',"#verdatos",function(e){
			e.preventDefault();
			td = $(this).closest('tr').find('td');
			td.addClass('text-success');
		});

		$(document).on('mouseout',"#verdatos",function(e){
			e.preventDefault();
			td = $(this).closest('tr').find('td');
			td.removeClass('text-success');
		});

		$(document).on('mouseover',"#agregardatos",function(e){
			e.preventDefault();
			td = $(this).closest('tr').find('td');
			td.addClass('text-info');
		});

		$(document).on('mouseout',"#agregardatos",function(e){
			e.preventDefault();
			td = $(this).closest('tr').find('td');
			td.removeClass('text-info');
		});

		$(document).on('mouseover',"#eliminardatos",function(e){
			e.preventDefault();
			td = $(this).closest('tr').find('td');
			td.addClass('text-danger');
		});

		$(document).on('mouseout',"#eliminardatos",function(e){
			e.preventDefault();
			td = $(this).closest('tr').find('td');
			td.removeClass('text-danger');
		});

    $(document).on('click',"#generarpdfcampañas",function(){
      window.location="pdfcampanamasiva.php";
    });

    $(document).on('click',"#generarpdfaniversarios",function(){
		window.location="pdfaniversarios.php";
		});

    $(document).on('click',"#generarpdfcongresos",function(){

			window.location="pdfcongresos.php";
		});

		$(document).on('click',"#generarpdfcultos",function(){
			window.location="pdfcultosunidos.php";
		});

	});
