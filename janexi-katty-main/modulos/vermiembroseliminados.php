<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
require("../conexion/clasemiembros.php");
$miembros = new Miembros();
$data = $miembros->ExtraerMiebrosEliminados();

if(is_array($data))
{

	?>
	<html>
	<head>
	</head>
	<body>
			<br><br>
			<button type="button" class="btn btn-lg btn-success" title="Generar Pdf" id="generarpdfnoactivo">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
			<br><br>
	<div class="table-responsive">
	<table class=" table table-bordered">
		<h3>Miembros Eliminados</h3>
		<tr>
			<th class="hidden"></th>
			<th class="id hidden">id</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Cedulas</th>
			<th>Telefonos</th>
			<th>Fecha de Nacimientos</th>
			<th>Edad</th>
			<th>Direccion</th>
			<th>Cargo</th>
			<th>Tiempo en el Señor</th>
			<th>Estudios Teologico</th>
			<th>Ministerios</th>
			<th>Restaurar</th>
		</tr>

		<?php foreach($data as $dat){ ?>
			<tr>
			<td id="tablas" class="hidden">miembros</td>
			<td class="id hidden"><?=$dat['id'];?></td>
			<td class="editable" data-campo="nombres"><?=$dat['nombres'];?></td>
			<td class="editable" data-campo="apellidos"><?=$dat['apellidos'];?></td>
			<td class="editable" data-campo="cedula"><?=$dat['cedula'];?></td>
			<td class="editable" data-campo="telefono"><?=$dat['telefono'];?></td>
			<td class="editable" data-campo="fechax"><?=$dat['fechax'];?></td>
			<td class="editable" data-campo="edad"><?=$dat['edad'];?></td>
			<td class="editable" data-campo="direccion"><?=$dat['direccion'];?></td>
			<td class="editable" data-campo="cargo"><?=$dat['cargo'];?></span></td>
			<td class="editable" data-campo="cargo"><?=$dat['ano_servicio'];?></span></td>
			<td class="editable" data-campo="cargo"><?=$dat['estudios'];?></span></td>
			<td class="editable" data-campo="cargo"><?=$dat['ministerios'];?></span></td>
			<td>
				<button type="button" id="restaurarm" class="btn btn-primary"> <div class="glyphicon glyphicon-ok-sign"></div> Restaurar</button>
			</td>
			</tr>
		<?php } ?>

	</table>
	</div>
	<h3> Total Miembros Eliminados <span id="cantidad"><?=$data[0]['cantidad'];?></span></h3>
	<br>
	</body>
	</html>

	<?php
}
else
{
	if($data==0){
		echo "<h3>Error no exites miembros eliminados en el sistema</h3>";
	}else if($data==1)
	{
		echo "<h3>Error al obtener los datos</h3>";
	}
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
