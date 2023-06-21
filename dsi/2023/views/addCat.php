<?php 
  include 'methods/categorias/categorias.php';
  $categorias = categorias::singleton_c();
  if (!empty($_POST['addCat'])) {
  	$add = $categorias->AddCategoria();
  	if ($add == true) {
  		echo '<script>window.location="categorias"</script>';
  	} else {
  		echo '<scrip>alert("Error al ingresar la categoria: "+'.$addPuesto.');</script>';
  	}
  }
?>
<h3>Agregar categoria</h3>
<form action="" method="POST">
	<div class="col-md-12">
		<label for="">Nombre de la categoria</label>
		<input type="text" class="form-control" name="nombreCat" id="nombreCat" placeholder="Escriba el nombre de la categoria">
	</div>
	<div class="col-md-12 mt-3">
		<input type="submit" name="addCat" id="addCat" value="Agregar Categoria" placeholder="Agregar Categoria" class="btn btn-success">
	</div>
</form>
