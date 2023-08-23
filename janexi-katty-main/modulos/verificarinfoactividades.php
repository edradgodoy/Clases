<?php
session_start();

$id = $_POST['ver'];

require("../conexion/claseactividad.php");
$Actividad = new actividad();
$a = $Actividad->verificarInfo($id);

if(is_array($a))
{
	$respuesta = array(
		'respuesta' => 'editar',
		'idifoactividad' => $a['idifoactividad'],
		'fotos' => $a['fotos'],
		'informacion' => $a['informacion'],
		'identificador' => $a['identificador']
	);
	echo json_encode($respuesta);
}
else
{
 $respuesta = array(
	 'respuesta' => 'agregar'
 );
 echo json_encode($respuesta);
}
?>
