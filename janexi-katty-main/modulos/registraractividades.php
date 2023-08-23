<?php
session_start();

if(isset($_POST['aopcion']) && !empty($_POST['aopcion']) && isset($_POST['lugar']) && !empty($_POST['lugar'])
	 && isset($_POST['fecha']) && !empty($_POST['fecha']) && isset($_POST['hora']) && !empty($_POST['hora'])
	 && isset($_POST['telefono']) && !empty($_POST['telefono']))
{

	if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
	{
		require("../conexion/claseactividad.php");
		$Actividad = new Actividad();
		$a = $Actividad->RegistrarActividad($_POST['aopcion'],$_POST['lugar'],$_POST['fecha'],$_POST['hora'],$_POST['telefono']);
		echo $a;
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
	echo "<h3>Error todos los campos son obligatorios</h3>";
}


?>