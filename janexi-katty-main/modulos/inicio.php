<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
?>
<!DOCTYPE HTML>
<html lang='es'>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/inicio.css">
	<script src="../lib/jquery/jquery.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="../public/js/inicio.js"></script>
</head>
<body>

	<div class="alert" id="mensajestodos" role="alert"></div>
	<div class="container-fluid master">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="modal fade" tabindex="-1" role="dialog" id="mensajesalirdesession" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">
									Salir de Session
								</h4>
							</div>
							<div class="modal-body">
								Desea Salir de Session ?
							</div>
							<div class="modal-footer">
								<button id="si" type="button" value="si" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Aceptar</button>
								<button id="no" type="button" value="no" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</button>
							</div>

						</div>
					</div>
				</div>

				<div class="modal fade" tabindex="-1" role="dialog" id="mensajeeliminarfoto" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">
									Eliminar Fotos
								</h4>
							</div>
							<div class="modal-body">
								Desea Eliminar Foto ?
							</div>
							<div class="modal-footer">
								<button id="sifoto" type="button" value="sifoto" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Aceptar</button>
								<button id="nofoto" type="button" value="nofoto" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</button>
							</div>

						</div>
					</div>
				</div>




				<header class="nav navbar-fixed-top">
					<div id="usuario">
						<?php echo $_SESSION['tipo']." :: <span class='glyphicon glyphicon-user'></span> :: ".$_SESSION['usuario']?>
					</div>
				</header>
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-top:30px; background-color:#B6F690;">

					<div class="navbar-header">
     					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu1">
					        <span class="sr-only"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
      					</button>
      					<div class="navbar-brand"><p style="color:black; font-weght:bold; font-size:1.2em;">Manantial De Vida</p></div>
    				</div>

    				<div class="collapse navbar-collapse" id="menu1">

    					<ul class="nav nav-pills nav-justified">
							<li>
								<a class="btn btn-lg" href="#" id="inicio" title="Inicio"><span class="glyphicon glyphicon-home"></span> Inicio</a>
							</li>
							<li>
								<a class="btn btn-lg" href="buscar.php" id="buscar" title="Buscar"><span class="glyphicon glyphicon-search"></span> Buscar</a>
							</li>
							<li>
								<a class="btn btn-lg" href="#" id="registrar" title="Registrar"><span class="glyphicon glyphicon-pencil"></span> Registrar</a>
							</li>

							<li class="dropdown"><a class="btn btn-lg" href="#" class="dropdown-toggle" data-toggle="dropdown" title="Configurar"><span class="glyphicon glyphicon-wrench"></span>Configurar <span class="caret"></span></a>
  	 							<ul class="dropdown-menu" style="box-shadow:0px 0px 12px rgba(0,0,0,0.5);">
  	 								<li><a href="#" id="nombreusuario" title="Nombre Usuario">Nombre Usuario</a></li>
  	 								<li><a href="#" id="claveusuario" title="Clave Usuario">Clave Usuario</a></li>
  	 							</ul>
               				</li>

							<li>
								<a class="btn btn-lg" href="#" id="respaldarbase" title="Respaldar Base De Datos"><span class="glyphicon glyphicon-cloud-download"></span> Base de datos</a>
							</li>

							<li>
								<a class="btn btn-lg" href="#" id="salir" title="Salir" data-toggle="modal" data-target="#mensajesalirdesession"><span class="glyphicon glyphicon-log-out"></span> Salir</a>
							</li>
						</ul>
					</div>
				</nav>
				<section class="text-center" id="section">
				<!--formulario para subir imagenes-->
				<form class="form" id="publicar" role="form" style="min-width:265px;">
					<h2>Publicar Imagenes</h2>
						<div class="form-group">
							<input type="text" class="form-control" name="titulo" maxlength="87" id="titulo" placeholder="Digite Titulo..." required>
						</div>
						<div class="form-group">
							<input type="file" name="imagenes" id="imagenes" required>
						</div>
						<button type="submit" class="btn btn-success btn-lg" id="bpublicar"><span class="glyphicon glyphicon-ok-sign"></span> Publicar</button>
						<button type="reset" class="btn btn-danger btn-lg" id="borrar"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>

				</form>
				<br><br><br><br>

				<?php
					require("../conexion/conex.php");
					require("../conexion/clasefotos.php");
					$fotos = new Fotos();
					$datos = $fotos->ObetenerTodasFotos();

					if(is_array($datos))
					{
						?>
						<div class="table-responsive">
						<table class="table table-hover">
						<h2 class="text-center">Galeria de Imagenes</h2>
						<tr>
							<th class="text-center hidden">id</th>
							<th class="text-center">imagen</th>
							<th class="text-center">titulo</th>
							<th class="text-center">Eliminar</th>
						</tr>


					<?php foreach ($datos as $dat){?>
						<tr>
						<td id="bimagen"> <img width="80px" height="auto" src="<?='../'.$dat['nombredfoto'];?>"/></td>
						<td class="hidden id"><?= $dat['id'] ?></td>
						<td class="editable text-center" data-campo="titulo"><span><?= $dat['titulo'];?></span></td>
						<td id="beliminar"> <button type="button" class="btn btn-danger btn-md" id="eliminarimagenes" style="vertical-align:middle;"><div class="glyphicon glyphicon-remove-sign"></div> Eliminar</button></td>
						</tr>
						<?php } ?>

					</table>

						</div>
						<?php
					}
					else
					{
						echo "<h3>no hay fotos cargada en el sistema</h3>";
					}
				?>
				</section>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
else
{
	?>
<script>
	window.location="../";
</script>

<?php
}
?>
