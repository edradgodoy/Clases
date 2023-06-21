
<?php 
  include 'methods/categorias/categorias.php';
  $categorias = categorias::singleton_c();
?>
<h3>Lista de categorias</h3>
<div class="col-md-12">
  <a class="btn btn-success" href="addCat">Agregar</a>
</div>
<table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre de la categoria</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      echo $categorias->listaCategorias();
    ?>
  </tbody>
</table>