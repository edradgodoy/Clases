<?php
session_start();
if(isset($_POST['ver']) && !empty($_POST['ver']) && isset($_POST['tabla']) && !empty($_POST['tabla']))
{
	if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
	{

		$tabla = $_POST['tabla'];

		switch($tabla)
		{
			case "actividades":
				require("../conexion/claseactividad.php");
				$id=$_POST['ver'];
				$cantidad = $_POST['cantidad'];
				$Actividad = new actividad();
				$a = $Actividad->EliminarActividades($id);
				if($a=="<h3>datos eliminado con exito</h3>")
				{
					$cantidad=$cantidad-1;
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
			break;

			case "miembros":
				$id=$_POST['ver'];
				require("../conexion/clasemiembros.php");
				$miembros = new miembros();
				$m = $miembros->EliminarMiembros($id);
				echo $m;
			break;

			default:
			echo "<h3>error en datos</h3>";
			break;

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

}
else
{
	echo "<h3>error al capturar datos</h3>";
}
