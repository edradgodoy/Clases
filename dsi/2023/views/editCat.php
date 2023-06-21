<?php 
include 'methods/categorias/categorias.php';
$categoria = categorias::singleton_c();

$datoEditar = $categoria->datosCategoria($_GET['id']);

?>
<h3>Editar categoria</h3>
<form action="" method="POST">
  <div class="form-group">
    <label for="idCat">Id</label>
    <input type="text" class="form-control" id="idCat" name="idCat" placeholder="Email" value="<?php echo $datoEditar[0]; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="puestoName">Nombre de la categoria</label>
    <input type="text" class="form-control" id="CatName" name="CatName" placeholder="Nombre de la categoria" value="<?php echo $datoEditar[1]; ?>"  minlength="3" maxlength="45" pattern="[A-Za-záéíóúüÁÉÍÓÚÜñÑ ]{3,45}" required>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-success" id="editarCategoria" name="editarCategoria" placeholder="Nombre del Categoria" value="Editar categoria">
  </div>
  
</form>

<?php 
if (!empty($_POST['editarCategoria'])) {
	$resultEdit = $categoria->editarCategoria();
	if ($resultEdit===true) {
		echo '<script>window.location="categorias"</script>';
	} else {
		echo '<script>
			alert("Hubo un error al actualizar los datos de la categoria: mas sobre el error: '.$resultEdit.'");
			window.location="editCat?id='.$_GET['id'].'";
		</script>';
	}
	
}
?>