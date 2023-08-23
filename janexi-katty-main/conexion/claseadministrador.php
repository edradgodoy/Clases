<?php
require("../conexion/conex.php");
class Administrador extends Conexion
{

	protected $id,$nombre,$apellido,$cedula,$usuario,$clave,$estado,$fecha,$tipo;

	public function __construct()
	{
		parent::__construct();
		$this->basedato="iglesia";
	}
//metodo para limpiar datos enviados por el administrador
	public function LimpiarDatos($datos)
	{
		$datos = trim(htmlspecialchars(htmlentities($datos)));
		return $datos;
	}
//metodo para registrar nuevos administradores
	public function RegistrarAdministrador($nombre="",$apellido="",$cedula="",$usuario="",$clave="")
	{
		$this->nombre = $this->LimpiarDatos($nombre);
		$this->apellido = $this->LimpiarDatos($apellido);
		$this->cedula = $this->LimpiarDatos($cedula);
		$this->usuario = $this->LimpiarDatos($usuario);
		$this->clave = $this->LimpiarDatos($clave);
		$this->estado="activo";
		$this->tipo="Administrador";

		if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$this->nombre))
			{
				return "<h3>Error en campo nombre debe ser solo letras</h3>";
				exit();
			}
			if(strlen($this->nombre)>15){
				return "<h3>Error en campo nombre no puede ser mayor a 15 caracteres</h3>";
				exit();
			}



			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$this->apellido))
			{
				return "<h3>Error en campo apellido debe ser solo letras</h3>";
				exit();
			}
			if(strlen($this->apellido)>15){
				return "<h3>Error en campo apellido no puede ser mayor a 15 caracteres</h3>";
				exit();
			}

			if(!preg_match("/^[0-9]+$/",$this->cedula))
			{
				return "<h3>Error en campo cedula debe poseer solo numero</h3>";
				exit();
			}

			$tamano = strlen($this->cedula);
			if($tamano>8 || $tamano<7)
			{
				return "<h3>Error en campo cedula no puede ser mayor a 8 y menor a 7 digitos </h3>";
				exit();
			}

			$cd = $this->ConsultarAdministrador($this->cedula,"activo");
			if($cd>=1){
				return "<h3>Error cedula ya esta registrada en el sistema como administrador activo</h3>";
				exit();
			}

			$cd= $this->ConsultarAdministrador($this->cedula,"noactivo");
			if($cd>=1){
				return "<h3>Error cedula ya esta registrada en el sistema como administrador no activo</h3>";
				exit();
			}

			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$this->usuario))
			{
				return "<h3>Error en campo usuario solo se permiten letras</h3>";
				exit();
			}

			$tamano = strlen($this->usuario);
			if($tamano>15 || $tamano<3){
				return "<h3>Error en campo usuario el dato debe ser mayor a 3 o menos a 15 caracteres</h3>";
				exit();
			}
			$ver = $this->ConsultarUsuarioAdministrador($this->usuario);
			if($ver>=1){
				return "<h3>Error este nombre de usuario ya esta siendo utilizado en el sistema</h3>";
				exit();
			}

			$tamanoclave = strlen($this->clave);
			if($tamanoclave>15 || $tamanoclave<6)
			{
				echo "<h3>Error en campo clave debe ser mayor a 6 digito y menos a 15 digito</h3>";
				exit();
			}
			$salt = "iglesia";
			$this->clave = sha1($salt.md5($this->clave));

			$this->fecha = date("Y-m-d");

			$sql="insert into adminuser (idadminuser,nombres,apellidos,cedula,usuario,clave,tipo,status,fecha) values ('','$this->nombre','$this->apellido','$this->cedula','$this->usuario','$this->clave','$this->tipo','$this->estado','$this->fecha')";
			$this->conectar();
			if($this->cone->query($sql))
			{
				$this->desconetar();
				return "<h3>datos registrados con exito</h3>";
			}
			else
			{
				$this->desconetar();
				return "<h3>Error al registrar datos</h3>";
			}
	}
//metodos para consultar si exite un administrador ya registrados
	public function ConsultarAdministrador($cedula="",$estatus="")
	{
		$sql="select * from adminuser where cedula='$cedula' and status='$estatus'";
		$this->conectar();
		if($ver = $this->cone->query($sql))
		{
			$this->desconetar();
			return mysqli_num_rows($ver);
		}
		else
		{
			$this->desconetar();
			return "<h3>Error al consultar datos</h3>";
		}
	}
//metodos para extraer registros de administrador
	public function ExtraerAdministrador()
	{
		$data = array();
		$i=0;
		$this->conectar();
		$sql="select * from adminuser where status='activo' and tipo='Administrador'";
		if($datos = $this->cone->query($sql))
		{
			if(mysqli_num_rows($datos))
			{
				while($ver= $datos->fetch_array())
				{
					$data[$i++] = array(

						'nombres'=>$ver['nombres'],
						'apellidos'=>$ver['apellidos'],
						'cedula'=>$ver['cedula'],
						'usuario'=>$ver['usuario'],
						'fecha'=>$ver['fecha'],
						'cantidad'=>mysqli_num_rows($datos)
						);

				}

				$this->desconetar();
				return $data;
			}
			else
			{
				$this->desconetar();
				return "<h3>Error no existe adminsitrador registrado</h3>";
			}


		}
		else
		{
			$this->desconetar();
			return "<h3>Error al extraer datos de administrador</h3>";
		}
	}

//metodo para configurar nombre del administrador
	public function ConfigurarNombreAdministrador($nombre="",$clave="",$id="")
	{
			if(!preg_match("/^[a-zA-ZÑ-ñ]+$/",$nombre))
			{
				return "<h3>Error en campo nombre solo se aceptan letras</h3>";
				exit();
			}
			if(strlen($nombre)<3){
				return "<h3>Error nombre de usuario no puede ser menor a 3 letras</h3>";
				exit();
			}
			$salt = "iglesia";
			$this->clave = sha1($salt.md5($clave));
			$this->id=intval($this->LimpiarDatos($id));
			$this->conectar();
			$data = $this->ConsultarAdministradorPorId($this->id,$estatus="activo",$this->clave);
			if($data==1)
			{
				$sql1="select * from adminuser where usuario='$nombre' and not idadminuser='$this->id'";
				if($datos=$this->cone->query($sql1))
				{
					$dat =mysqli_num_rows($datos);
					if($dat==1){
						return "<h3>Error nombre de usuario ya esta registrado en el sistema</h3>";
					}
					else
					{
						$sql2="update adminuser set usuario='$nombre' where idadminuser='$this->id'";
						if($this->cone->query($sql2))
						{
							return "<h3>datos actualizado con exito</h3>";
							$this->desconetar();
						}
						else
						{
							return "<h3>Error al actualizar datos</h3>";
							$this->desconetar();
						}
					}
				}
				else
				{
					return "<h3>Error al consultar usuario</h3>";
					$this->desconetar();
				}

			}
			else
			{
				return "<h3>Error clave invalida</h3>";
				$this->desconetar();
			}


	}
//metodo para configurar clave de administrador
	public function ConfigurarClaveAdministrador($clave="",$nueva1="",$nueva2="",$id="")
	{
			if($nueva1!=$nueva2)
			{
				return "<h3>Error al confirmar nueva clave</h3>";
			}
			else
			{
				if(strlen($nueva1)<6){
					return "<h3>Error nueva clave debe ser mayor a 5 digitos</h3>";
					exit();
				}

				$this->id=intval($this->LimpiarDatos($id));
				$this->conectar();
				$salt = "iglesia";
				$this->clave = sha1($salt.md5($nueva1));
				$clave = sha1($salt.md5($clave));
				$sql="update adminuser set clave='$this->clave' where idadminuser='$this->id'";
				$datos =$this->ConsultarAdministradorPorId($this->id,$estatus="activo",$clave);;
				if($datos==1)
				{
					if($this->cone->query($sql))
					{
						return "<h3>datos actualizado con exito</h3>";
						$this->desconetar();
					}
					else
					{
						return "<h3>Error en consulta</h3>";
						$this->desconetar();
					}
				}
				else
				{
					return "<h3>Error Clave actual es invalida</h3>";
					$this->desconetar();
				}

			}
	}
//metodos para consultar administrador por id
	public function ConsultarAdministradorPorId($id="",$estatus="", $clave="")
	{
		$sql="select clave from adminuser where clave ='$clave' and idadminuser='$id'";
		if($data = $this->cone->query($sql))
		{
			$datos = mysqli_num_rows($data);
			return $datos;
		}
		else
		{
			return "<h3>Error en verificacion de clave</h3>";
		}
	}
//metodos para consultar 
	public function ConsultarUsuarioAdministrador($usuario="")
	{
		$sql="select usuario from adminuser where usuario='$usuario'";
		$this->conectar();
		if($datos=$this->cone->query($sql)){
			$ver = mysqli_num_rows($datos);
			return $ver;
			$this->desconetar();
		}


	}

}
?>
