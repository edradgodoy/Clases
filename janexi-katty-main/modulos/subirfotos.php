<?php
session_start();
	if(isset($_POST['titulo'])&& !empty($_POST['titulo'])&& isset($_FILES['imagen']['name'])&& !empty($_FILES['imagen']['name']))
	{

		$titulo=$_POST['titulo'];
		$ruta="../public/fotos/";
		$rutas2="public/fotos/";
		if($_FILES['imagen']['error']== UPLOAD_ERR_OK )
		{
			
			$nombre = $_FILES["imagen"]["name"];
			$temporal = $_FILES["imagen"]["tmp_name"];
			$tipo = $_FILES['imagen']['type'];

			if(file_exists("../public/fotos".$nombre))
			{
				$temp=$nombre;
				$nombre=chr(rand(65,90)).$temp;
			}

			if($tipo=="image/jpg"||($tipo=="image/png" || $tipo=="image/jpeg"))
			{
				move_uploaded_file($temporal, $ruta.$nombre);

			}
			else
			{

				echo "<h3>Error formato de imagen no es permitida</h3>";
				exit();
			}



		}
		else
		{
			echo "<h3>Error al subir imagen ".$_FILES['imagen']['error']."</h3>";
			exit();
		}

		$url=$rutas2.$nombre;
		require("../conexion/conex.php");
		require("../conexion/clasefotos.php");

		$subir = new Fotos();

		$mensaje = $subir->SubirFotos($titulo,$url);
		echo $mensaje;
	}
	else
	{
	echo "<h3> error no puede enviar datos vacios </h3>";
	}

?>
