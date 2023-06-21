<?php 
  include 'methods/puestos/puestos.php';
  $puesto = puesto::singleton_p();
  if (!empty($_POST['addPuesto'])) {
  	$addPuesto = $puesto->AddPuesto();
  	if ($addPuesto == true) {
  		echo '<script>window.location="puestos"</script>';
  	} else {
  		echo '<scrip>alert("Error al ingresar el puesto: "+'.$addPuesto.');</script>';
  	}
  }
?>
<form action="" method="POST">
	<div class="col-md-12">
		<label for="">Nombre del usuario</label>
		<input type="text" class="form-control" name="nombrePuesto" id="nombrePuesto" placeholder="Escriba el nombre del puesto">
	</div>
	<div class="col-md-12 mt-3">
		<input type="submit" name="addPuesto" id="addPuesto" value="Agregar Puesto" placeholder="Agregar Puesto" class="btn btn-success">
	</div>
</form>