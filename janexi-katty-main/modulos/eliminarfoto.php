<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
	if(isset($_POST['id'])&& !empty($_POST['id']))
	{
		
		$id = $_POST['id'];

		require("../conexion/conex.php");
		require("../conexion/clasefotos.php");

		$fotos = new Fotos();
		$mensaje = $fotos->EliminarFoto($id);
		echo $mensaje;
		
	}
	else
	{
		echo "<h3>Error al capturar datos</h3>";
	}
	
}else{
?>
<script>
window.location="../";
</script>
<?php
}

?>