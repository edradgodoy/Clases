<?php
session_start();

if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador"){

require("../conexion/claserespaldo.php");

$respaldo = new Respaldo();
$respaldo->respaldoDataBase();

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
