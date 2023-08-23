<?php
session_start();
require("../conexion/claseactividad.php");
$limite =intval(htmlspecialchars($_POST['limite']));
$Congresos = new actividad();
$congresos="Congresos";
$ver = $Congresos->ExtraerActividadesPaginacion($congresos,$limite);
if(isset($_SESSION['tipo'])&& $_SESSION['tipo']=="Administrador")
{


	if(is_array($ver))
	{

		?>
		<br><br>
		<button type="button" class="btn btn-lg btn-success" title="Generar Pdf" id="generarpdfcongresos">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
		<br><br>
		<div class="table-responsive">
		<table class="table table-bordered">
			<h3 class="text-center">Congresos</h3>
			<tr>
				<th class="hidden"></th>
				<th class="id hidden">id</th>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Telefono</th>
				<th>Hora</th>
				<th>Agregar</th>
				<th>Ver</th>
				<th>Eliminar</th>
			</tr>
		<?php foreach ($ver as $key) { ?>
		<tr>
			<td id="tablas" class="hidden">actividades</td>
			<td class="id hidden"><?=$key['identificador'];?></td>
			<td class="editable" data-campo="lugar"><span><?= $key['lugar'];?></span></td>
			<td class="editable" data-campo="fecha"><span><?= $key['fecha'];?></span></td>
			<td class="editable" data-campo="telefono"><span><?= $key['telefono'];?></span></td>
			<td class="editable" data-campo="hora"><span><?= $key['hora'];?></span></td>
			<td>
			<button type="button" class="btn btn-primary" title='Agregar Informacion' id='agregardatos'>
				<div class="glyphicon glyphicon-plus"></div>
				Agregar
			</button>
			</td>
			<td>
			<button type="button" class="btn btn-success" title='Ver Informacion' id='verdatos'>
				<div class="glyphicon glyphicon-ok-sign"></div>
				Ver
			</button>
			</td>
			<td>
			<button type="button" class="btn btn-danger" title='Eliminar' id='eliminardatos'>
				<div class="glyphicon glyphicon-remove-sign"></div>
				Eliminar
			</button>
			</td>
		</tr>
		<?php }?>
		</table>
		<br>
		<ul class="pager">
			<?php
			if($limite>0)
			{
				$limit = $limite-12;
				?>
					<li class="previous"><a class="text-info" id="atrasactividad" onclick="cargaractividad(<?=$limit;?>,'congresos.php')" href="#">&larr; Atras</a></li>
					<?php
			}

			if($limite<$ver[0]['cantidad']-12)
			{
				$limit = $limite+12;
				?>
				<li class="next"><a class="text-info" id="siguientesactividad" onclick="cargaractividad(<?=$limit;?>,'congresos.php')" href="#">Siguientes &rarr;</a></li>
				<?php
			}

			?>
	</ul>
		<br>
			<h4>Total Registradas: <span id="cantidad"><?=$ver[0]['cantidad'];?></span></h4>
		</div>
		<br><br>
		<?php
	}
	else
	{
		if($ver==0)
		{
			echo "<h3>Error no exites congresos registrado en el sistema</h3>";
		}else if($ver==1)
		{
			echo "<h3>Error al obtener los datos</h3>";
		}
	}


}
else
{

if(is_array($ver)){

?>
<br><br>
		<button type="button" class="btn btn-lg btn-success" title="Generar Pdf" id="generarpdfcongresos">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
<br><br>
<div class="table-responsive">
<table class="table table-bordered table-striped">
	<h3 class="text-center">Congresos</h3>
	<tr>
		<th class="hidden"></th>
		<th>Lugar</th>
		<th>Fecha</th>
		<th>Telefono</th>
		<th>Hora</th>
		<th>Ver Informacion</th>
	</tr>
<?php foreach ($ver as $key) { ?>
<tr>
	<td class="id hidden"><?=$key['identificador'];?></td>
	<td><?= $key['lugar'];?></td>
	<td><?= $key['fecha'];?></td>
	<td><?= $key['telefono'];?></td>
	<td><?= $key['hora'];?></td>
	<td><button class="btn btn-lg btn-success" id="verdatos">Ver <span class="glyphicon glyphicon-ok-sign"></span></button></td>
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
		echo "<h3>Error no exites congresos registrada en el sistema</h3>";
	}else if($ver==1){
		echo "<h3>Error al obtener los datos</h3>";
	}
}
}
