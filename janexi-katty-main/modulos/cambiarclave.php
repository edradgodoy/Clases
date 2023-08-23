<?php
session_start();
if(isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
	if(isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['clave1']) &&
	!empty($_POST['clave1']) && isset($_POST['clave2']) && !empty($_POST['clave2']) && 
	isset($_POST['idadminuser']) && !empty($_POST['idadminuser']))
	{
		require("../conexion/claseadministrador.php");
		$administrador = new Administrador();

		$respuesta = $administrador->ConfigurarClaveAdministrador($_POST["clave"],$_POST["clave1"],$_POST["clave2"],$_POST["idadminuser"]);

		echo $respuesta;
	}
	else
	{
		echo "<h3>Error todos los datos son obligatorio</h3>";
		exit();
	}


}
else
{
	?>
<script type="text/javascript">
	window.location="../";
</script>
	<?php
}


?>