<?php
require("../conexion/conex.php");
//clase validar usuarios
class ValidarUsuarios extends Conexion{
//constructor de la clase
	public function __construct()
	{

		parent::__construct();
		$this->basedato="iglesia";
	}
//metodo para validar nombre
	public function ValidarNombre($nombre)
	{
		$nombre = $this->LimpiarDatos($nombre);
		if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$nombre))
		{
			echo "error en nombre, nombre solo debe poseer letras";
			exit();
		}
		return $nombre;
	}
//metodo para limpiar daros
	public function LimpiarDatos($datos){
		$datos = trim(htmlspecialchars($datos));
		return $datos;
	}
//metodos para extraer usurio en este caso administrador
	public function ExtraerDatosAdministrador($nombre,$clave)
	{
		$nombre = $this->ValidarNombre($nombre);
		$clave = $this->LimpiarDatos($clave);
		$users=array();
		$salt = "iglesia";
		$clave = sha1($salt.md5($clave));
		$sql="SELECT * FROM adminuser where usuario='$nombre' and clave='$clave' and status='activo' limit 1";
		$this->conectar();
		if($usuarios = $this->cone->query($sql)){
			if(mysqli_num_rows($usuarios)==1)
			{

				while($datos = $usuarios->fetch_array()){
					$users= array(

						"idadminuser"=>$datos['idadminuser'],
						"usuario"=>$datos['usuario'],
						"tipo"=>$datos['tipo']
						);
				}
				$this->desconetar();
				return $users;
			}
			else
			{
				echo "Usuarios o clave invalido";
				$this->desconetar();
				exit();
			}

		}
		else
		{
			echo "Error al extraer Usuarios";
			$this->desconetar();
			exit();
		}


	}



}
