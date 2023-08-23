<?php
session_start();
require("../conexion/claseactividad.php");

$Todas = new actividad();
$campana="Campana Masiva";
$cultos="Cultos Unidos";
$aniversario="Aniversario";
$congresos="Congresos";

if(isset($_SESSION['tipo'])&& $_SESSION['tipo']=="Administrador")
{
	$ver = $Todas->ExtraerActividades($aniversario);

	if(is_array($ver))
	{

		?>
		<br><br>
		<button type="button" class="btn btn-lg btn-success" title="Generar Pdf" id="generarpdftodasactividades">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
		<br><br>
		<div class="table-responsive">
		<table class="table table-bordered">
			<h3 class="text-center">Aniversarios</h3>
			<tr>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Telefono</th>
				<th>Hora</th>
			</tr>
		<?php foreach ($ver as $key) { ?>
		<tr>
			<td><?= $key['lugar'];?></td>
			<td><?= $key['fecha'];?></td>
			<td><?= $key['telefono'];?></td>
			<td><?= $key['hora'];?></td>
		</tr>
		<?php }?>
		</table>
		<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
		</div>
		<br><br>
		<?php
	}
	else
	{
		if($ver==0)
		{
			echo "<h3>Error no exites aniversarios registrada en el sistema</h3>";
		}else if($ver==1)
		{
			echo "<h3>Error al obtener los datos</h3>";
		}
	}

	$ver = $Todas->ExtraerActividades($campana);
	if(is_array($ver))
	{

		?>
		<div class="table-responsive">
		<table class="table table-bordered">
			<h3 class="text-center">Campañas Masivas</h3>
			<tr>

				<th>Lugar</th>
				<th>Fecha</th>
				<th>Telefono</th>
				<th>Hora</th>
			</tr>
		<?php foreach ($ver as $key) { ?>
		<tr>
			<td><?= $key['lugar'];?></td>
			<td><?= $key['fecha'];?></td>
			<td><?= $key['telefono'];?></td>
			<td><?= $key['hora'];?></td>
		</tr>
		<?php }?>
		</table>
		<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
		</div>
		<br><br>
		<?php
	}
	else
	{
		if($ver==0)
		{
			echo "<h3>Error no exites campañas registrada en el sistema</h3>";
		}else if($ver==1)
		{
			echo "<h3>Error al obtener los datos</h3>";
		}
	}

	$ver = $Todas->ExtraerActividades($cultos);
	if(is_array($ver))
	{

		?>
		<div class="table-responsive">
		<table class="table table-bordered">
			<h3 class="text-center">Cultos Unidos</h3>
			<tr>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Telefono</th>
				<th>Hora</th>
			</tr>
		<?php foreach ($ver as $key) { ?>
		<tr>
			<td><?= $key['lugar'];?></td>
			<td><?= $key['fecha'];?></td>
			<td><?= $key['telefono'];?></td>
			<td><?= $key['hora'];?></td>
		</tr>
		<?php }?>
		</table>
		<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
		</div>
		<br><br>
		<?php
	}
	else
	{
		if($ver==0)
		{
			echo "<h3>Error no exites cultos registrados en el sistema</h3>";
		}else if($ver==1)
		{
			echo "<h3>Error al obtener los datos</h3>";
		}
	}

	$ver = $Todas->ExtraerActividades($congresos);
	if(is_array($ver))
	{

		?>
		<div class="table-responsive">
		<table class="table table-bordered">
			<h3 class="text-center">Congresos</h3>
			<tr>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Telefono</th>
				<th>Hora</th>
			</tr>
		<?php foreach ($ver as $key) { ?>
		<tr>
			<td><?= $key['lugar'];?></td>
			<td><?= $key['fecha'];?></td>
			<td><?= $key['telefono'];?></td>
			<td><?= $key['hora'];?></td>
		</tr>
		<?php }?>
		</table>
		<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
		</div>
		<br><br>
		<?php
	}
	else
	{
		if($ver==0)
		{
			echo "<h3>Error no exites congresos registrados en el sistema</h3>";
		}else if($ver==1)
		{
			echo "<h3>Error al obtener los datos</h3>";
		}
	}


}
else
{
	$ver = $Todas->ExtraerActividades($aniversario);

	if(is_array($ver)){

	?>
	<br><br>
		<button type="button" class="btn btn-lg btn-success" title="Generar Pdf" id="generarpdftodasactividades">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
	<br><br>
	<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<h3 class="text-center">Aniversarios</h3>
		<tr>
			<th>Lugar</th>
			<th>Fecha</th>
			<th>Telefono</th>
			<th>Hora</th>
		</tr>
	<?php foreach ($ver as $key) { ?>
	<tr>
		<td><?= $key['lugar'];?></td>
		<td><?= $key['fecha'];?></td>
		<td><?= $key['telefono'];?></td>
		<td><?= $key['hora'];?></td>
	</tr>
	<?php }?>
	</table>
	<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
	</div>
	<br><br>
	<?php
	}
	else
	{
		if($ver==0){
			echo "<h3>Error no exites campañas registrada en el sistema</h3><br><br>";
		}else if($ver==1){
			echo "<h3>Error al obtener los datos</h3><br><br>";
		}
	}

	$ver = $Todas->ExtraerActividades($campana);
	if(is_array($ver)){
	?>
	<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<h3 class="text-center">Campañas Masivas</h3>
		<tr>
			<th>Lugar</th>
			<th>Fecha</th>
			<th>Telefono</th>
			<th>Hora</th>
		</tr>
	<?php foreach ($ver as $key) { ?>
	<tr>
		<td><?= $key['lugar'];?></td>
		<td><?= $key['fecha'];?></td>
		<td><?= $key['telefono'];?></td>
		<td><?= $key['hora'];?></td>
	</tr>
	<?php }?>
	</table>
	<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
	</div>
	<br><br>
	<?php
	}
	else
	{
		if($ver==0){
			echo "<h3>Error no exites campañas registrada en el sistema</h3><br><br>";
		}else if($ver==1){
			echo "<h3>Error al obtener los datos</h3><br><br>";
		}

	}

	$ver = $Todas->ExtraerActividades($cultos);
	if(is_array($ver)){
	?>
	<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<h3 class="text-center">Cultos Unidos</h3>
		<tr>
			<th>Lugar</th>
			<th>Fecha</th>
			<th>Telefono</th>
			<th>Hora</th>
		</tr>
	<?php foreach ($ver as $key) { ?>
	<tr>
		<td><?= $key['lugar'];?></td>
		<td><?= $key['fecha'];?></td>
		<td><?= $key['telefono'];?></td>
		<td><?= $key['hora'];?></td>
	</tr>
	<?php }?>
	</table>
	<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
	</div>
	<br><br>
	<?php
	}
	else{
		if($ver==0){
			echo "<h3>Error no exites campañas registrada en el sistema</h3><br><br>";
		}else if($ver==1){
			echo "<h3>Error al obtener los datos</h3><br><br>";
		}
	}

	$ver = $Todas->ExtraerActividades($congresos);
	if(is_array($ver))
	{

		?>
		<div class="table-responsive">
		<table class="table table-bordered">
			<h3 class="text-center">Congresos</h3>
			<tr>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Telefono</th>
				<th>Hora</th>
			</tr>
		<?php foreach ($ver as $key) { ?>
		<tr>
			<td><?= $key['lugar'];?></td>
			<td><?= $key['fecha'];?></td>
			<td><?= $key['telefono'];?></td>
			<td><?= $key['hora'];?></td>
		</tr>
		<?php }?>
		</table>
		<h4><?=$ver[0]['cantidad'];?> Registradas</h4>
		</div>
		<br><br>
		<?php
	}
	else
	{
		if($ver==0)
		{
			echo "<h3>Error no exites congresos registrados en el sistema</h3>";
		}else if($ver==1)
		{
			echo "<h3>Error al obtener los datos</h3>";
		}
	}
}
?>
