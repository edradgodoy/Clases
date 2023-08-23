<?php
session_start();

if(isset($_SESSION['tipo']) && !empty($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['idadminuser']) && !empty($_POST['idadminuser']))
	{

		require("../conexion/claseadministrador.php");
		$administrador = new Administrador();
		$respuesta = $administrador->ConfigurarNombreAdministrador($_POST['nombre'],$_POST['clave'],$_POST['idadminuser']); 

		if($respuesta=="<h3>datos actualizado con exito</h3>")
		{
			$_SESSION['usuario']=$_POST['nombre'];
		}
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