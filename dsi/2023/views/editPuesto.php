<?php 
include 'methods/puestos/puestos.php';
$puesto = puesto::singleton_p();

$datoEditar = $puesto->datosPuesto($_GET['id']);

?>

<form action="" method="POST">
  <div class="form-group">
    <label for="idPuesto">Id</label>
    <input type="text" class="form-control" id="idPuesto" name="idPuesto" placeholder="Email" value="<?php echo $datoEditar[0]; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="puestoName">Nombre del puesto</label>
    <input type="text" class="form-control" id="puestoName" name="puestoName" placeholder="Nombre del Puesto" value="<?php echo $datoEditar[1]; ?>"  minlength="3" maxlength="45" pattern="[A-Za-záéíóúüÁÉÍÓÚÜñÑ ]{3,45}" required>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-success" id="editarPuesto" name="editarPuesto" placeholder="Nombre del Puesto" value="Editar puesto">
  </div>
  
</form>

<?php 
if (!empty($_POST['editarPuesto'])) {
	$resultEdit = $puesto->editarPuesto();
	if ($resultEdit===true) {
		echo '<script>window.location="puestos"</script>';
	} else {
		echo '<script>
			alert("Hubo un error al actualizar los datos del puesto: mas sobre el error: '.$resultEdit.'");
			window.location="editPuesto?id='.$_GET['id'].'";
		</script>';
	}
	
}
?>