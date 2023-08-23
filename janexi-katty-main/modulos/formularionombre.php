<?php
session_start();
if(isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && isset($_SESSION['idadminuser']) && !empty($_SESSION['idadminuser']) && $_SESSION['tipo']=="Administrador"){
?>
	<form class="form formnombre" method="#" action="#" role="form"><br>
		<h2>Cambiar Nombre de Usuario</h2>
		<p class="text-left text-danger">Todos los datos son obligatorios</p>
		<div class="form-group text-left">
			<label for="nombre">Nuevo Nombre :</label>
			<input type="text" name="nombre" id="nombre" class="form-control" placeholder="nuevo Nombre" maxlength="15" required>
		</div>
		<div class="form-group text-left">
			<label for="clave">Clave :</label>
			<input type="password" name="clave" id="clave" class="form-control" placeholder="Clave" maxlength="15" required>
		</div>
		<div class="form-group">
			<input type="text" name="idadminuser" id="idadminuser" class="form-control hidden" value=<?=$_SESSION['idadminuser'];?>>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-success">Guardar</button>
			<button type="reset" class="btn btn-lg btn-danger">Eliminar</button>
		</div>
	</form>

<?php
}
else{
	?>
	<script>
	window.location="../";
	</script>
	<?php
}

?>
