<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
?>
<html>
<head>
	<style>
	.ui-datepicker-month, .ui-datepicker-year
	{
		background-color: white;
		color: black;
	}
	</style>
	 <link rel="stylesheet" type="text/css" href="../public/css/calendario.css">
	 <script src="../public/js/calendario.js"></script>
	 <script src="../public/js/registrar.js"></script>

</head>
<body>



<!-- formulario Principal del registro-->

<form class="form resgistro" role="form" method="#" action="#">
	<h3>Formulario de Resgitro</h3>
	<div form-group>

	<select class="form-control" name="opcion" id="opcion" required >
		<option value="">Seleciones opcion</option>
		<option value="miembros">Registrar Miembros</option>
		<option value="actividad">Resgistrar Actividades</option>
		<option value="administrador">Resgistrar nuevo Administrador</option>
	</select>
	</div>
	<br>
	<div class="form-group">
		<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Elegir</button>
		<button type="reset" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
	</div>
</form>
<br><br>

<!--formulario de miembros  -->

<form class="form-horizontal miembros" role="form">
	<br>
	<h3>Registros de Miembros</h3>
	<br>
	<p class="text-danger text-left">* Datos obligatorios</p><br>
	<div class="row" style="padding:0px 10px 0px 10px">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group text-left">
				<label for="fotomiembro" class="control-label">* Selecione Foto: </label>
				<input type="file" name="fotomiembro" id="fotomiembro" class="form-control" required>
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:20px;">

			<div class="form-group text-left">
					<label for="nombre" class="control-label">* Nombre :</label>
					<input type="text" name="nombre" id="nombre" placeholder="Digite nombre" class="form-control" maxlength="15" required>
			</div>

			<div class="form-group text-left">
				<label for="apellido" class="control-label">* Apellido : </label>
				<input type="text" name="apellido" id="apellido" placeholder="Digite Apellido" class="form-control" maxlength="15" required>
			</div>

			<div class="form-group text-left">
				<label for="cedula" class="control-label">* Cedula : </label>
				<input type="text" name="cedula" id="cedula" placeholder="Digite Cedula" class="form-control" maxlength="8" required>
			</div>

			<div class="form-group text-left">
				<label for="telefono" class="control-label">Telefono : </label>
				<input type="text" name="telefono" id="telefono" placeholder="Digite Telefono " class="form-control" maxlength="11">
			</div>

			<div class="form-group text-left">
				<label for="tiempo" class="control-label">* Tiempo en el Señor : </label>
				<input type="number" name="tiempo" id="tiempo" placeholder="Digite tiempo" class="form-control" maxlength="35" required>
			</div>

		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding:20px;">
			<div class="form-group text-left">
				<label for="ministerios" class="control-label">* Ministerios que a Desempeñado : </label>
				<input type="text" name="ministerios" id="ministerios" placeholder="Digite ministerios que ha desempeñado" class="form-control" required>
			</div>

			<div class="form-group text-left">
				<label for="correo" class="control-label">* Estudios Teologico : </label>
				<select id="estudios" name="estudios" class="form-control" required>
					<option value="">Seleccione Opcion</option>
					<option value="si">Si</option>
					<option value="no">No</option>
				</select>
				<!--<input type="text" name="correo" id="correo" placeholder="Digite Correo" class="form-control" maxlength="35" required>-->
			</div>

			<div class="form-group text-left">
				<label for="fecha" class="control-label">* Fecha de Nacimiento : </label>
				<input type="text" name="fecha" id="fecha" placeholder="Fecha de Nacimientos  DD/MM/AAAA" class="form-control" maxlength="10" required>
			</div>

			<div class="form-group text-left">
				<label for="cargo" class="control-label">* Cargo : </label>
				<input type="text" name="cargo" id="cargo" placeholder="Digite el Cargos" class="form-control" maxlength="20" required>
			</div>

			<div class="form-group text-left">
				<label for="direccion" class="control-label">* Direccion : </label>
				<input type="text" name="direccion" id="direccion" placeholder="Digite Direccion" class="form-control" maxlength="40" required>
			</div>

		</div>

			<div class="form-group text-center">
				<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Registrar</button>
				<button type="reset" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
			</div>
	</div>
</form>

<!--formulario de actividades -->
<form class="form-horizontal actividades" role="form">
	<br>
	<h3>Registros de Actividades</h3>
	<br>
	<p class="text-left text-danger">Todos los datos son obligatorios</p><br>
	<div class="form-group">
		<label for="aopcion" class="col-xs-4 col-sm-3 col-md-3 col-lg-2 control-label">Tipo Actividad: </label>
		<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
			<select name="aopcion" id="aopcion" class="form-control" required>
				<option value="">Seleciones Actividad</option>
				<option value="aniversarios">Aniversarios</option>
				<option value="cultos">Cultos Unidos</option>
				<option value="campana">Campaña Masivas</option>
				<option value="congresos">Congresos</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="lugar" class="col-xs-4 col-sm-3 col-md-3 col-lg-1 control-label">Lugar: </label>
		<div class="col-xs-8 col-sm-9 col-md-9 col-lg-11">
			<input type="text" name="lugar" id="lugar" placeholder="Digite Lugar de la Actividad" class="form-control" maxlength="45" required>
		</div>
	</div>

	<div class="form-group">
		<label for="fecha" class="col-xs-4 col-sm-3 col-md-3 col-lg-1 control-label">Fecha: </label>
		<div class="col-xs-8 col-sm-9 col-md-9 col-lg-11">
			<input type="text" name="fecha" id="fechaact" placeholder="Digite fecha DD/MM/AAAA" class="form-control" maxlength="10" required>
		</div>
	</div>

	<div class="form-group">
		<label for="hora" class="col-xs-4 col-sm-3 col-md-3 col-lg-1 control-label">Hora: </label>
		<div class="col-xs-8 col-sm-9 col-md-9 col-lg-11">
			<input type="text" name="hora" id="hora" placeholder="Digite hora ejmeplo : 01:00pm" class="form-control" maxlength="7" required>
		</div>
	</div>

	<div class="form-group">
		<label for="telefono" class="col-xs-4 col-sm-3 col-md-3 col-lg-1 control-label">Telefono: </label>
		<div class="col-xs-8 col-sm-9 col-md-9 col-lg-11">
			<input type="text" name="telefono" id="telefono" placeholder="Digite Telefono" class="form-control" maxlength="11" required>
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Registrar</button>
		<button type="reset" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
	</div>
</form>

<!--formulario de administrador -->

<form class="form-horizontal administrador" role="form">
	<br>
	<h3>Registros de Administrador</h3>
	<br>
	<p class="text-left text-danger">Todos los datos son obligatorio</p>
	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="form-group">
				<label for="nombre" class="col-xs-4 col-sm-3 col-md-3 col-lg-2 control-label">Nombre: </label>
				<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
					<input type="text" name="nombre" id="nombre" placeholder="Digite Nombre" class="form-control" maxlength="15" required>
				</div>
			</div>

			<div class="form-group">
				<label for="apellido" class="col-xs-4 col-sm-3 col-md-3 col-lg-2 control-label">Apellido: </label>
				<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
					<input type="text" name="apellido" id="apellido" placeholder="Digite Apellido" class="form-control" maxlength="15" required>
				</div>
			</div>

			<div class="form-group">
				<label for="cedula" class="col-xs-4 col-sm-3 col-md-3 col-lg-2 control-label">Cedula: </label>
				<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
					<input type="text" name="cedula" id="cedula" placeholder="Digite Cedula" class="form-control" maxlength="8" required>
				</div>
			</div>

			<div class="form-group">
				<label for="usuario" class="col-xs-4 col-sm-3 col-md-3 col-lg-2 control-label">Usuario: </label>
				<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
					<input type="text" name="usuario" id="usuario" placeholder="Digite Nombre del Administrador" class="form-control" maxlength="15" required>
				</div>
			</div>

			<div class="form-group">
				<label for="clave" class="col-xs-4 col-sm-3 col-md-3 col-lg-2 control-label">Clave: </label>
				<div class="col-xs-8 col-sm-9 col-md-9 col-lg-10">
					<input type="password" name="clave" id="clave" placeholder="Digite clave del Administrador" class="form-control" maxlength="15" required>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Registrar</button>
		<button type="reset" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
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
