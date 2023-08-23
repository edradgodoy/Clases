<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
	if(isset($_POST['campo']) && !empty($_POST['campo']) && isset($_POST['nuevovalor']) && !empty($_POST['nuevovalor']) && isset($_POST['id']) && !empty($_POST['id']))
	{
		require("../conexion/conex.php");
		require("../conexion/clasefotos.php");

		$id = intval($_POST['id']);
		$campo=$_POST['campo'];
		$valor = $_POST['nuevovalor'];
		$fotos = new Fotos();
		$mensaje = $fotos->EditarDatosFotos($id,$campo,$valor);
		echo $mensaje;

	}
	else
	{
		echo "<h4>Error al obtener datos</h3>";
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