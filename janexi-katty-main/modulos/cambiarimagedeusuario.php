<?php
session_start();
	if(isset($_POST['ver'])&& !empty($_POST['ver'])&& isset($_FILES['imagen']['name'])
		&& !empty($_FILES['imagen']['name']))
	{
			if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
		{

			$ruta="fotomiembro/";
			if($_FILES['imagen']['error'] == UPLOAD_ERR_OK )
			{
				
				$nombre = $_FILES["imagen"]["name"];
				$temporal = $_FILES["imagen"]["tmp_name"];
				$tipo = $_FILES['imagen']['type'];

				if(file_exists("fotomiembro/".$nombre))
				{
					unlink("fotomiembro/".$nombre);
					//$temp=$nombre;
					//$nombre=chr(rand(65,90)).$temp;
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

			$url=$ruta.$nombre;
			$campo="foto";
			

			require("../conexion/clasemiembros.php");
			$Miembros = new Miembros();
			$a = $Miembros->EditarFotoMiembros($campo,$url,$_POST['ver']);
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
	echo "<h3> error no puede enviar datos vacios </h3>";
	}

