<?php
session_start();

if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{

	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellido']) && !empty($_POST['apellido'])
	&& isset($_POST['cedula']) && !empty($_POST['cedula']) && isset($_POST['usuario']) && !empty($_POST['usuario'])
	&& isset($_POST['clave']) && !empty($_POST['clave']))
	{
		require("../conexion/claseadministrador.php");
		$administrador = new Administrador();
		$a = $administrador->RegistrarAdministrador($_POST['nombre'],$_POST["apellido"],$_POST["cedula"],$_POST["usuario"],$_POST["clave"]);
		echo $a;
	}
	else
	{
		echo "<h3>Error todos los datos son obligatorios</h3>";
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
