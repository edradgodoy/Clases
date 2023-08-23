<html>
<head>
	<script>
	$(document).ready(function(){
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
});

	</script>
</head>
<body>
<div class="alert alert-danger" role="alert" id="mensajedeusuario"></div>
<form id="acceso" action="#" method="#" role="form" class="text-center">
	<h3 class="text-success">Ingresar al sistema</h3>
        <div class="form-group input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span><input class="form-control" type="text" title="nombre" name="usuario" placeholder="nombre"  required/>
       	</div>
       	<div class="form-group input-group">
            <span class="input-group-addon glyphicon glyphicon-lock"></span><input class="form-control" type="password" title="clave" name="clave" placeholder="clave" required/>
      	</div>
        <div class="form-group">
            <img src="modulos/captcha.php" class="img img-responsive center-block" id="captcha">
        </div>
        <div class="form-group input-group">
             <span class="input-group-addon glyphicon glyphicon-search"></span><input class="form-control" type="text" title="Digite datos de la imagen" placeholder="Digite Dato de la imagen" name="captcha" autocomplete="off"/>
        </div>

        <div class="form-group">
           <button class="btn btn-success" type="submit" title="Enviar"><span class="glyphicon glyphicon-ok-sign"></span> Enviar</button>  
           <button class="btn btn-danger" type="reset" title="Limpiar"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
        </div>
        <br>
        </form>

</body>
</html>