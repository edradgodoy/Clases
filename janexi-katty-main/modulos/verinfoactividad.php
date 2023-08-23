<?php
session_start();
if(isset($_POST['ver']) && !empty($_POST['ver']))
{
	if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
	{

		require("../conexion/claseactividad.php");
		$Actividad = new actividad();

		$a = $Actividad->ExtraerInfo($_POST['ver']);

		if(is_array($a))
		{
			?>
				<div class="text-center">
					<h3>Informacion de la actividad</h3><br><br>
					<img src="<?=$a['fotos'];?>" class="img img-responsive center-block"><br><br>
					<div class="lead text-left">
						<?php echo $a['informacion']; ?>
					</div>
				</div>

			<?php

		}
		else
		{
			if($a == 0){
			echo "<h3>Error no hay informacion registrada en esta actividad</h3>";
			exit();
			}else if($a==1){
				echo "<h3>Error al consultar informacion</h3>";
				exit();
			}
		}
	}
	else
	{
		require("../conexion/claseactividad.php");
		$Actividad = new actividad();

		$a = $Actividad->ExtraerInfo($_POST['ver']);

		if(is_array($a))
		{
			?>
				<div class="text-center">
					<h3>Informacion de la actividad</h3><br><br>
					<img src="modulos/<?=$a['fotos'];?>" class="img img-responsive center-block"><br><br>
					<p class="lead">
						<?=$a['informacion'];?>
					</p>
				</div>

			<?php

		}
		else
		{
			if($a == 0){
			echo "<h3>Error no hay informacion registrada en esta actividad</h3>";
			exit();
			}else if($a==1){
				echo "<h3>Error al consultar informacion</h3>";
				exit();
			}
		}



	}

}
else
{
	echo "<h3>Error al capturar datos </h3>";
}

?>
