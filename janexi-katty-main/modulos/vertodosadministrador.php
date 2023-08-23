<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
require("../conexion/claseadministrador.php");
$administrador = new Administrador();

$data = $administrador->ExtraerAdministrador();
if(is_array($data))
{

	?>
	<html>
	<head>
	</head>
	<body>

	<div class="table-responsive">
	<table class=" table table-bordered">
		<h3>Registro de Administrador</h3>
		<tr>

			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Cedulas</th>
			<th>Usuario</th>
			<th>Fecha de Registro</th>
		</tr>

		<?php foreach($data as $dat){ ?>
			<tr>


			<td><?=$dat['nombres'];?></td>
			<td><?=$dat['apellidos'];?></td>
			<td><?=$dat['cedula'];?></td>
			<td><?=$dat['usuario'];?></td>
			<td><?=$dat['fecha'];?></td>
			</tr>
		<?php } ?>

	</table>
	</div>
	<h3> <?=$data[0]['cantidad'];?> Administrador Registrados</h3>
	<br>
	</body>
	</html>

	<?php
}
else
{
	echo $data;
}


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
