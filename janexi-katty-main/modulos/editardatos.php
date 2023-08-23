<?php
session_start();
if(isset($_SESSION['tipo'])&& $_SESSION['tipo']=="Administrador")
{

	if(isset($_POST['tabla']) && !empty($_POST['tabla']) && isset($_POST['id']) && !empty($_POST['id'])
		&& isset($_POST['campo']) && !empty($_POST['campo']) && isset($_POST['nuevovalor']) && !empty($_POST['nuevovalor']))
	{




		$tabla = $_POST['tabla'];

		switch($tabla)
		{

			case "actividades":
				require("../conexion/claseactividad.php");
				$Actividad = new actividad();
				$valor = $_POST['nuevovalor'];
				$id=intval($_POST['id']);
				$campo = $_POST['campo'];
				$ver = $Actividad->EditarCamposDeActividades($campo,$valor,$id);
				echo $ver;
			break;

			case "miembros":

				require("../conexion/clasemiembros.php");
				$miembros = new miembros();
				$valor= $_POST['nuevovalor'];
				$id=intval($_POST['id']);
				$campo = $_POST['campo'];
				$ver = $miembros->EditarCampoMiembros($campo,$valor,$id);
				echo $ver;

			break;

			default:

			echo "<h3>Error en datos seleccionados</h3>";

			break;
		}

	}
	else
	{
		echo "Error al capturar datos";
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