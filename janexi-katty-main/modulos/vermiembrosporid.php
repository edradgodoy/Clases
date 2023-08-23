<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
	if(isset($_POST['id']) && !empty($_POST['id'])){
		$id = intval($_POST['id']);
		require("../conexion/clasemiembros.php");
		$miembros = new Miembros();
		$data = $miembros->ExtraerPorid($id);

		if(is_array($data))
		{?>
			<html>
			<head>
			</head>
			<body>
			<br><br>
				<button type="button" class="btn btn-lg btn-success" value="<?=$data['cedula'];?>" title="Generar Pdf" id="generarpdfmiembrosporcedula">Generar Pdf <span class="glyphicon glyphicon-cloud-download"></span></button>
			<br><br>
			<div class="table-responsive">
			<table class=" table table-bordered center-block" style="width:60%;" >
					<tr>
					<td>
					<img id="fotosm" class="img img-responsive center-block" style="width:104px;heigth:104px" src="<?=$data['foto'];?>" title="Editar Foto">
					</td>
					<td class="text-center"><h3 class="text-center">Datos Personales del Miembro</h3></td>
					</tr>
					<tr>
					<td id="tablas" class="hidden">miembros</td>
					</tr>
					<tr>
					<td class="id hidden"><?=$data['id'];?></td>
					</tr>
					<tr>
					<td id="dat">Nombre :</td>
					<td class="editable" data-campo="nombres"><span><?=$data['nombres'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Apellido :</td>
					<td class="editable" data-campo="apellidos"><span><?=$data['apellidos'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Cedula :</td>
					<td class="editable" data-campo="cedula"><span><?=$data['cedula'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Telefono :</td>
					<td class="editable" data-campo="telefono"><span><?=$data['telefono'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Fecha de Nacimiento:</td>
					<td class="editable" data-campo="fechax"><span><?=$data['fechax'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Edad :</td>
					<td id="edad"><span><?=$data['edad'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Direccion :</td>
					<td class="editable" data-campo="direccion"><span><?=$data['direccion'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Cargo :</td>
					<td class="editable" data-campo="cargo"><span><?=$data['cargo'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Años en el Señor :</td>
					<td class="editable" data-campo="ano_servicio"><span><?=$data['ano_servicio'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Estudios Teologico :</td>
					<td class="editable" data-campo="estudios"><span><?=$data['estudios'];?></span></td>
					</tr>
					<tr>
					<td id="dat">Ministerios :</td>
					<td class="editable" data-campo="ministerios"><span><?=$data['ministerios'];?></span></td>
					</tr>
					<tr>
					<td>
						<button type="button" id="eliminardatosmiembros" class="btn btn-danger"><div class="glyphicon glyphicon-remove-sign"></div> Eliminar</button>
					</td>
					</tr>
			</table>
			</div>
			</body>
			</html>

			<?php
		}
		else
		{
			if($data==0)
			{
				echo "<h3>Error al obtener datos  del sistema</h3>";
				exit();
			}
			else if($data==1)
			{
				echo "<h3>Error al obtener los datos</h3>";
				exit();
			}
		}

	}
	else
	{
		echo "<h3>Error al capturar datos</h3>";
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
