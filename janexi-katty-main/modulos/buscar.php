<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador"){
?>
<html>
<head>
	<link rel="stylesheet" href="../public/css/buscar.css">
	<script src="../public/js/buscar.js"></script>
</head>
<body>
<div class="modal fade" tabindex="-1" role="dialog" id="modaleliminar" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Eliminar Datos
				</h4>
			</div>
			<div class="modal-body">
				Deseas Eliminar Este Dato ?
			</div>
			<div class="modal-footer">
				<button type="button" id="sieliminardatos" value="aceptareliminar" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Aceptar </button>
				<button type="button" id="noeliminardatos" value="cancelareliminar" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar </button>
			</div>
		</div>
	</div>

</div>
<div class="modal fade" tabindex="-1" role="dialog" id="cambiarfotos" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Cambiar Imagen ?
				</h4>
			</div>
			<div class="modal-body">
				<input type="file" id="nuevafoto" name="nuevafoto">
			</div>
			<div class="modal-footer">
				<button type="button" id="sinuevafoto" value="aceptar" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Aceptar </button>
				<button type="button" id="nonuevafoto" value="cancelar" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar </button>
			</div>
		</div>
	</div>

</div>
<div class="modal fade" tabindex="-1" role="dialog" id="agregarinfo" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Editar Informacion
				</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">

				<input class="form-control" type="file" id="fotoinfo" name="fotoinfo">
					<img src="" class="img center-block" id="imgactividad" style="width:150px; height:150px; padding:5px;">
				</div>
				<div class="form-group">
				<textarea id="info" class="form-control" cols="5" rows="6"></textarea>
				</div>
			</div>
			<div class="modal-footer" style="text-align:center;">
				<button type="button" id="siinfo" value="aceptar" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Aceptar </button>
				<button type="button" id="noinfo" value="cancelar" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar </button>
			</div>
		</div>
	</div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="registrarinfo" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Registrar Informacion
				</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
				<input class="form-control" type="file" id="fotoinforeg" name="fotoinforeg">
				</div>
				<div class="form-group">
				<textarea id="inforeg" class="form-control" cols="5" rows="6"></textarea>
				</div>
			</div>
			<div class="modal-footer" style="text-align:center;">
				<button type="button" id="sireginfo" value="aceptar" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Aceptar </button>
				<button type="button" id="noreginfo" value="cancelar" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar </button>
			</div>
		</div>
	</div>

</div>
<form class="form-vertical" id="formulariodebusqueda" role="form">
		<h2 class="text-center">Buscar Datos</h2>
		<div class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-search"></span>
			<select class="form-control" name="iopcion" id="iopcion" required>
				<option value="">Elegir Busqueda</option>
				<option value="miembros">Miembros</option>
				<option value="actividades">Actividades</option>
				<option value="administrador">Administrador</option>
			</select>
		</div>
		<label for="iopcion1">Buscar por</label>
		<div class="form-group input-group">
			<span class="input-group-addon glyphicon glyphicon-search"></span>
			<select class="form-control" name="iopcion1" id="iopcion1" required>
				<option value="">Buscar Por</option>
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" type='text' id="cedula" title="cedula" placeholder="digite cedula">
		</div>
		</div>
		<button type="submit"  class="btn btn-lg btn-success"><span class="glyphicon glyphicon-search"></span> Buscar</button>
		<button type="reset"  class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
</form><br><br>
<div id="datosdebusqueda"> </div>
</body>
</html>

<?php
}
?>
