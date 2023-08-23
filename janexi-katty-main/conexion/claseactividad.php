<?php
//llamando a la clase conex
require("../conexion/conex.php");
//heredadando las propiedades y methodos de la clase actividad
class actividad extends Conexion{
	public $id,$nombre,$fecha,$lugar,$hora,$telefono;
//constructor de la clase
	public function __construct()
	{
		parent::__construct();
		//asignando valor a la base de datos
		$this->basedato="iglesia";
	}
//metodos para extraer actividades

	public function ExtraerActividadesPaginacion($actividades="",$limite="")
	{
		$actividades = $this->LimpiarDatos($this->ValidarTipoActividad($actividades));
		$infos = array();
		$this->conectar();
		$total = $this->totalActividades($actividades);

		$sql="select * from actividad where tipo='$actividades' order by fecha desc limit $limite,12";
		if($datos = $this->cone->query($sql))
		{
			if(mysqli_num_rows($datos)>=1)
			{
				$i=0;

				while($ver= $datos->fetch_array()){
					$infos[$i++] = array(
					'identificador'=>$ver['identificador'],
					'lugar' => $ver['lugar'],
					'fecha' => $ver['fecha'],
					'telefono' => $ver['telefono'],
					'hora'=>$ver['hora'],
					'cantidad'=>$total
					);

				}
				$this->desconetar();
				return $infos;


			}else{
				$this->desconetar();
				return 0;
			}
		}else{
			$this->desconetar();
			return 1;
		}
	}

	public function totalActividades($actividades="")
	{
		$sq="select identificador from actividad where tipo='$actividades'";
		$total = $this->cone->query($sq);
		return $total->num_rows;
	}

	public function ExtraerActividades($actividades="")
	{

		$actividades = $this->LimpiarDatos($this->ValidarTipoActividad($actividades));
		$infos = array();
		$this->conectar();

		$sql="select * from actividad where tipo='$actividades' order by fecha desc";
		if($datos = $this->cone->query($sql))
		{
			if(mysqli_num_rows($datos)>=1)
			{
				$i=0;

				while($ver= $datos->fetch_array()){
					$infos[$i++] = array(
					'identificador'=>$ver['identificador'],
					'lugar' => $ver['lugar'],
					'fecha' => $ver['fecha'],
					'telefono' => $ver['telefono'],
					'hora'=>$ver['hora'],
					'cantidad'=>mysqli_num_rows($datos)
					);

				}
				$this->desconetar();
				return $infos;


			}else{
				$this->desconetar();
				return 0;
			}
		}else{
			$this->desconetar();
			return 1;
		}


	}
//metodos para extraer actividades por fecha
	public function ExtraerActividadPorFecha($actividad="",$fecha="")
	{
		$actividad = $this->LimpiarDatos($actividad);
		$fecha = $this->LimpiarDatos($fecha);

		if($actividad !="Aniversario" && ($actividad!="Cultos Unidos" && ($actividad!="Campana Masiva" && ($actividad!="Congresos"))))
		{
			echo "<h3>Error en tipo de actividades</h3>";
			exit();
		}

		if(!preg_match("/^[0-9]{4}[\/-]{1}[0-9]{2}[\/-]{1}[0-9]{2}+$/",$fecha))
		{
			return "<h3>Error en campo fecha formato no permitido</h3>";
			exit();
		}

		$dat = array();
		$sql="select * from actividad where tipo='$actividad' and fecha='$fecha'";
		$this->conectar();
		if($data = $this->cone->query($sql))
		{
			$cantidad = mysqli_num_rows($data);
			if($cantidad>=1)
			{

				$i=0;

				while($ver= $data->fetch_array()){
					$dat[$i++] = array(
					'identificador'=>$ver['identificador'],
					'lugar' => $ver['lugar'],
					'fecha' => $ver['fecha'],
					'telefono' => $ver['telefono'],
					'hora'=>$ver['hora'],
					'cantidad'=>$cantidad
					);

				}
				$this->desconetar();
				return $dat;
			}
			else
			{
				$this->desconetar();
				return "<h3>Error no exite {$actividad} en la fecha {$fecha}</h3>";
			}

		}
		else
		{
			$this->desconetar();
			return "<h3>Error a extraer datos de {$actividad}</h3>";
		}

	}


//metodo para registrar actividad
	public function RegistrarActividad($aopcion="",$lugar="",$fecha="",$hora="",$telefono="")
	{
		$opcion = $this->LimpiarDatos($aopcion);
		$lugar = $this->LimpiarDatos($lugar);
		$fecha = $this->LimpiarDatos($fecha);
		$hora = $this->LimpiarDatos($hora);
		$telefono = $this->LimpiarDatos($telefono);

		if($opcion !="aniversarios" && ($opcion!="cultos" && ($opcion!="campana" && ($opcion!="congresos"))))
		{
			echo "<h3>Error en tipo de actividades</h3>";
			exit();
		}

		if($opcion=="aniversarios")
		{
			$nombreact="Aniversario";
			$tipo="Aniversario";
		}else if($opcion=="cultos")
		{
			$nombreact="Cultos Unidos";
			$tipo="Cultos Unidos";
		}else if($opcion=="campana")
		{
			$nombreact="Campaña Masiva";
			$tipo="Campana Masiva";

		}else if($opcion=="congresos")
		{
			$nombreact="Congresos";
			$tipo="Congresos";
		}


		if(!preg_match("/^[a-zA-Zñ-Ñ0-9\s]+$/",$lugar))
		{
			return "<h3>Error en campo lugar no debe poseer caracteres raros</h3>";
			exit();
		}


		if(!preg_match("/^[0-9]{2}[\/]{1}[0-9]{2}[\/]{1}[0-9]{4}+$/",$fecha))
		{
			return "<h3>Error en campo fecha formato no permitido</h3>";
			exit();
		}

		$ano = intval(substr($fecha,6,9));

		if($ano < date("Y"))
		{
			return "<h3>Error en campo fecha no puede ser menor al año actual</h3>";
			exit();
		}
		$mes = intval(substr($fecha,3,4));
		if($mes<1 || ($mes>12))
		{
			return "<h3>Error en campo fecha mes erroneo </h3>";
			exit();
		}
		$dia = intval(substr($fecha,0,3));

		if($dia<1 ||($dia>60))
		{
			return "<h3>Error en campo fecha dia es erroneo </h3>";
			exit();
		}

		if(!preg_match("/^[0-9]{2}[\:]{1}[0-9]{2}[a-z]{2}+$/",$hora))
			{
				return "<h3>Error en campo hora formato de hora no valido</h3>";
				exit();
			}

			$tiempo = substr($hora,5,6);
			if($tiempo!="pm" && ($tiempo!="am"))
			{

				return "<h3>Error en campo hora datos debe ser ejmeplo : am o pm</h3>";
				exit();
			}



			if(!preg_match("/^[0-9]{11}+$/",$telefono))
			{
				return "<h3>Error en campo telefono formato no permitido</h3>";
				exit();
			}

				$codigo = substr($telefono,0,4);

				if($codigo!="0412" &&($codigo!="0416" &&($codigo!="0426" &&($codigo!="0414"
				 &&($codigo!="0424" &&($codigo!="0285"))))))
				{
				return "<h3>Error en codigo del campo telefono no es valido</h3>";
				exit();
				}



			$fecha1= substr($fecha,6,9)."/".substr($fecha,3,3).substr($fecha,0,2);

		$sql="INSERT INTO actividad (identificador,nombreact,lugar,fecha,telefono,hora,tipo) VALUES ('','$nombreact','$lugar','$fecha1','$telefono','$hora','$tipo')";
		$this->conectar();
		if($this->cone->query($sql))
		{
			$this->desconetar();
			return "<h3>datos registrados con exito</h3>";

		}
		else
		{
			$this->desconetar();
			return "<h3>error no se pudo agregar actividad</h3>";

		}

	}

//metodo para verificar si exite una informacion registradas de una actividad
	public function verificarInfo($id="")
	{
		$this->id = intval($this->LimpiarDatos($id));
		$sql="SELECT * FROM info_actividad WHERE identificador='$this->id'";
		$this->conectar();
		$dat = $this->cone->query($sql);

		if($dat->num_rows >=1)
		{
			while($dato = $dat->fetch_array())
			{
				$datos = array(
					'idifoactividad' => $dato['idifoactividad'],
					'fotos' => $dato['fotos'],
					'informacion' => strip_tags($dato['informacion']),
					'identificador' => $dato['identificador']
				);
			}
			$this->desconetar();
			return $datos;

		}
		else
		{
			return 0;
		}
	}
//metodos para extraer informacion de actividades
	public function ExtraerInfo($id="")
	{
		$infos = array();
		$this->conectar();
		$id = intval($this->LimpiarDatos($id));

		$sql="select fotos,informacion from info_actividad where identificador='$id'";
		if($datos = $this->cone->query($sql))
		{
			if(mysqli_num_rows($datos)>=1)
			{

				while($ver= $datos->fetch_array()){
					$infos = array(
					'fotos'=>$ver['fotos'],
					'informacion' =>$ver['informacion']
					);

				}
				$this->desconetar();
				return $infos;


			}else{
				$this->desconetar();
				return 0;
			}
		}else{
			$this->desconetar();
			return 1;
		}

	}
//metodo para registrar informacion de actividades
	public function RegistrarInfo($id="",$info="",$foto="",$cambio="")
	{

		if($cambio=="agregar")
		{
			$this->id = intval($this->LimpiarDatos($id));
			$info = nl2br($this->LimpiarDatos($info));
			$foto = $this->LimpiarDatos($foto);

			$sql="INSERT INTO info_actividad (idifoactividad,fotos,informacion,identificador) VALUES ('','$foto','$info','$this->id')";

			$this->conectar();
			if($this->cone->query($sql))
			{
				$this->desconetar();
				return "<h3>datos registrado con exito</h3>";
			}
			else
			{
				$this->desconetar();
				return "<h3>Error al guardar informacion</h3>";
			}

		}
		else if($cambio=="editar")
		{
			$this->id = intval($this->LimpiarDatos($id));
			$info = nl2br($this->LimpiarDatos($info));
			$foto = $this->LimpiarDatos($foto);

			if($foto==NULL)
			{
				$sql ="UPDATE info_actividad SET informacion='$info' WHERE identificador='$this->id'";
				$this->conectar();
				if($this->cone->query($sql))
				{
					$this->desconetar();
					return "<h3>datos registrado con exito</h3>";
				}
				else
				{
					$this->desconetar();
					return "<h3>Error al guardar informacion</h3>";

				}

			}
			else{
				$sql="UPDATE info_actividad SET fotos='$foto',informacion='$info' WHERE identificador='$this->id'";
				$this->conectar();
				if($this->cone->query($sql))
				{
					$this->desconetar();
					return "<h3>datos registrado con exito</h3>";
				}
				else
				{
					$this->desconetar();
					return "<h3>Error al guardar informacion</h3>";

				}
			}
		}
		else
		{
				return "<h3>Error cambio</h3>";
		}

	}


//metodo para editar datoso de actividades
	public function EditarCamposDeActividades($campo="",$valor="",$id="")
	{
		$campo =$this->LimpiarDatos($campo);
		$valor= ucwords($this->LimpiarDatos($valor));
		$id = $this->LimpiarDatos($id);


		if($campo=="lugar")
		{
			if(!preg_match("/^[a-zA-Zñ-Ñ0-9\s]+$/",$valor))
			{
				return "<h3>Error en campo {$campo} no debe poseer caracteres raros</h3>";
				exit();
			}
		}
		if($campo=="fecha")
		{
			if(!preg_match("/^[0-9]{4}[\-]{1}[0-9]{2}[\-]{1}[0-9]{2}+$/",$valor))
			{
				return "<h3>Error en campo {$campo} formato no permitido</h3>";
				exit();
			}
			$ano = intval(substr($valor,0,4));
			if($ano < 2015)
			{
				return "<h3>Error en campo {$campo} no puede ser menor al año actual</h3>";
				exit();
			}
			$mes = intval(substr($valor,5,7));
			if($mes<1 || ($mes>12))
			{
				return "<h3>Error en campo {$campo} mes erroneo </h3>";
				exit();
			}
			$dia = intval(substr($valor,8,10));

			if($dia<1 ||($dia>60))
			{
				return "<h3>Error en campo {$campo} dia es erroneo </h3>";
				exit();
			}


		}
		if($campo=="telefono")
		{
			if(!preg_match("/^[0-9]{11}+$/",$valor))
			{
				return "<h3>Error en campo {$campo} formato no permitido</h3>";
				exit();
			}

				$codigo = substr($valor,0,4);

				if($codigo!="0412" &&($codigo!="0416" &&($codigo!="0426" &&($codigo!="0414"
				 &&($codigo!="0424" &&($codigo!="0285"))))))
				{
				return "<h3>Error en codigo del campo {$campo} no es valido</h3>";
				exit();
				}


		}

		if($campo=="hora")
		{
			if(!preg_match("/^[0-9]{2}[\:]{1}[0-9]{2}[a-z]{2}+$/",$valor))
			{
				return "<h3>Error en campo {$campo} formato de hora no valido</h3>";
				exit();
			}

			$tiempo = substr($valor,5,6);
			if($tiempo!="pm" && ($tiempo!="am"))
			{

				return "<h3>Error en campo {$campo} datos debe ser ejmeplo : am o pm</h3>";
				exit();
			}

		}


		$sql = "update  actividad  set ".$campo."='".$valor."' where identificador='".$id."' limit 1";
		$this->conectar();
		if($this->cone->query($sql))
		{
			$this->desconetar();
			return "<h3>datos actualizado con exito</h3>";
			exit();
		}
		else
		{
			$this->desconetar();
			return 0;
		}

	}
//metodos para eliminar actividades
	public function EliminarActividades($id="")
	{

		$this->conectar();
		$id =intval($this->LimpiarDatos($id));
		$sq="select fotos from info_actividad where identificador='$id'";
		$ass = $this->cone->query($sq);

		$e = $ass->fetch_array();
		$foto = $e['fotos'];
		$sql="delete from info_actividad where identificador='$id'";
		$sql1="delete from actividad where identificador='$id'";
		if($this->cone->query($sql))
		{
			if($this->cone->query($sql1))
			{
				if(file_exists($foto))
				{
					unlink($foto);
				}
				return "<h3>datos eliminado con exito</h3>";
				exit();
			}
			else
			{

				return "<h3>error al eliminar datos</h3>";
				exit();
			}

		}
		else
		{
			return "<h3>error al eliminar datos</h3>";
			exit();
		}
	}

//metodos para limpiar datos enviados por el usuario
	public function LimpiarDatos($datos="")
	{
		$datos = trim(htmlspecialchars($datos));
		return $datos;
	}
//metodo para validar actividad
	public  function ValidarTipoActividad($cadena="")
	{

		if($cadena == "Aniversario" || $cadena=="Cultos Unidos" || $cadena=="Campana Masiva" || $cadena=="Congresos")
		{
			return $cadena;
		}
		echo "<h3>Error en tipo de datos buscado</h3>";
		exit();
	}
}

?>
