<?php 
  include 'methods/puestos/puestos.php';
  $puesto = puesto::singleton_p();
?>
<div class="col-md-12">
  <a class="btn btn-success" href="addPuesto">Agregar</a>
</div>
<table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del puesto</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      echo $puesto->listaPuestos();
    ?>
  </tbody>
</table>
