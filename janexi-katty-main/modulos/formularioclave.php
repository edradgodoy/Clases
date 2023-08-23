<?php
session_start();
if(isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && isset($_SESSION['idadminuser']) && !empty($_SESSION['idadminuser']) && $_SESSION['tipo']=="Administrador"){
?>
	<form class="form formclave text-center" method="#" action="#" role="form"><br>
		<h2>Cambiar Clave de Usuario</h2>
		<p class="text-left text-danger">Todos los datos son obligatorios</p>
		<div class="form-group text-left">
			<label for="clave">Clave Actual :</label>
			<input type="password" name="clave" id="clave" class="form-control" title="Clave" placeholder="Clave Actual" maxlength="15" required>
		</div>
		<div class="form-group text-left">
			<label for="clave1">Nueva Clave :</label>
			<input type="password" name="clave1" id="clave1" class="form-control" placeholder="Nueva Clave" maxlength="15" required>
		</div>
		<div class="form-group text-left">
			<label for="clave2">Confirmar Nueva Clave :</label>
			<input type="password" name="clave2" id="clave2" class="form-control" placeholder="Confirmar Nueva Clave" maxlength="15" required>
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
