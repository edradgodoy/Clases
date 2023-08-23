<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
$limite =intval(htmlspecialchars($_POST['limite']));
require("../conexion/clasemiembros.php");
$miembros = new Miembros();
$data = $miembros->ExtraerMiembros($limite);

if(is_array($data))
{

	?>
	<html>
	<head>
	</head>
	<body>
			<br><br>
			<button type="button" class="btn btn-lg btn-success" title="Generar Pdf" id="generarpdfmiembros">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
			<br><br>
	<div class="table-responsive">
	<table class=" table table-hover">
		<h3>Registro de Miembros</h3>
		<tr>
			<th class="hidden"></th>
			<th class="id hidden">id</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Cedulas</th>
			<th>Telefonos</th>
			<th>Elegir</th>
		</tr>

		<?php foreach($data as $dat){ ?>
			<tr>
			<td id="tablas" class="hidden">miembros</td>
			<td class="id hidden"><?=$dat['id'];?></td>
			<td ><span><?=$dat['nombres'];?></span></td>
			<td ><span><?=$dat['apellidos'];?></span></td>
			<td ><span><?=$dat['cedula'];?></span></td>
			<td ><span><?=$dat['telefono'];?></span></td>
			<td>
				<button type="button" id="elegirdatos" title="Elegir" class="btn btn-success"> <div class="glyphicon glyphicon-ok-sign"></div> Elegir</button>
			</td>
			</tr>
		<?php } ?>

	</table>
	</div>
	<ul class="pager">
		<?php
		if($limite>0)
		{
			$limit = $limite-20;
			?>
				<li class="previous"><a class="text-info" id="atrasmiembros" onclick="cargarmiembros(<?=$limit;?>)" href="#">&larr; Atras</a></li>
				<?php
		}

		if($limite<$data[0]['cantidad']-20)
		{
			$limit = $limite+20;
			?>
			<li class="next"><a class="text-info" id="siguientesmiembros" onclick="cargarmiembros(<?=$limit;?>)" href="#">Siguientes &rarr;</a></li>
			<?php
		}

		?>
</ul>
	<br>
	<h3> Cantidad Total: <?=$data[0]['cantidad'];?> </h3>
	<br>

	</body>
	</html>

	<?php
}
else
{
	if($data==0){
		echo "<h3>Error no exites miembros registrados en el sistema</h3>";
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
