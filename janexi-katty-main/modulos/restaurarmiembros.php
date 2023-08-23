<?php
session_start();
if(isset($_POST['id']) && !empty($_POST['id']))
{
	if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
	{
		require("../conexion/clasemiembros.php");
		$cantidad = $_POST['cantidad'];
		$Miembros = new Miembros();
		$a = $Miembros->RestaurarMiembros($_POST['id']);

		if($a=="<h3>miembros restaurado con exito</h3>")
		{
			$cantidad = $cantidad-1;
			$mensajes = array(
				'respuesta'=>'exito',
				'exito'=>$a,
				'cantidad'=>$cantidad
			);
		}
		else
		{
			$mensajes = array(
				'respuesta'=>'error',
				'error'=>$a
			);
		}
		echo json_encode($mensajes);
	}
	else
	{
			?>
		<script>
		window.location="../";
		</script>
		<?php
	}

}
else
{
	echo "<h3>Error al capturar los datos</h3>";
}
