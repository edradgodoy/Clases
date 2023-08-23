<?php
require("../conexion/conex.php");
class Miembros extends Conexion
{
	protected $cedula,$id;
	public function __construct()
	{
		parent::__construct();
		$this->basedato="iglesia";
		$this->cedula="";
	}

	public function ExtraerMiembros($limite="")
	{
		$limite = $limite;
		$data = array();
		$i=0;
		$this->conectar();
		$total = $this->totalMiembrosActivos();
		$sql="select id,nombres,apellidos,cedula,telefono from miembros where statu='activo' limit $limite,20";
		if($datos = $this->cone->query($sql))
		{
			if(mysqli_num_rows($datos))
			{
				while($ver= $datos->fetch_array())
				{
					$data[$i++] = array(

						'id'=>$ver['id'],
						'nombres'=>$ver['nombres'],
						'apellidos'=>$ver['apellidos'],
						'cedula'=>$ver['cedula'],
						'telefono'=>$ver['telefono'],
						'cantidad'=>$total
						);

				}

				$this->desconetar();
				return $data;
			}
			else
			{
				$this->desconetar();
				return 0;
			}


		}
		else
		{
			$this->desconetar();
			return 1;
		}
	}

	public function totalMiembrosActivos()
	{
		$sq="select id from miembros where statu='activo'";
		$total = $this->cone->query($sq);
		return $total->num_rows;
	}

	public function ExtraerMiebrosEliminados()
	{
		$data = array();
		$i=0;
		$this->conectar();
		$sql="select * from miembros where statu='noactivo'";
		if($datos = $this->cone->query($sql))
		{
			if(mysqli_num_rows($datos))
			{
				while($ver= $datos->fetch_array())
				{
					$data[$i++] = array(

						'id'=>$ver['id'],
						'nombres'=>$ver['nombres'],
						'apellidos'=>$ver['apellidos'],
						'cedula'=>$ver['cedula'],
						'telefono'=>$ver['telefono'],
						'fechax'=>$ver['fechax'],
						'edad'=>$ver['edad'],
						'direccion'=>$ver['direccion'],
						'cargo'=>$ver['cargo'],
						'ano_servicio'=>$ver['ano_servicio'],
						'estudios'=>$ver['estudios'],
						'ministerios'=>$ver['ministerios'],
						'cantidad'=>mysqli_num_rows($datos)
						);

				}

				$this->desconetar();
				return $data;
			}
			else
			{
				$this->desconetar();
				return 0;
			}


		}
		else
		{
			$this->desconetar();
			return 1;
		}
	}

	public function ExtraerPorid($id="")
	{
		$data = array();
		$this->id = $this->LimpiarDatos($id);

		$this->conectar();
		$sql="select * from miembros where id='$this->id' and statu='activo' limit 1";
		if($ver = $this->cone->query($sql))
		{
			if(mysqli_num_rows($ver)==1)
			{
				while($dato = $ver->fetch_array())
				{
					$data = array(
						'id'=>$dato['id'],
						'nombres'=>$dato['nombres'],
						'apellidos'=>$dato['apellidos'],
						'cedula'=>$dato['cedula'],
						'telefono'=>$dato['telefono'],
						'fechax'=>$dato['fechax'],
						'edad'=>$dato['edad'],
						'direccion'=>$dato['direccion'],
						'cargo'=>$dato['cargo'],
						'foto'=>$dato['foto'],
						'ano_servicio'=>$dato['ano_servicio'],
						'estudios'=>$dato['estudios'],
						'ministerios'=>$dato['ministerios']
						);
				}
			$this->desconetar();
			return $data;

			}
			else
			{
				$this->desconetar();
				return 0;
			}
		}
		else{
			$this->desconetar();
			return 1;
		}

	}

	public function ExtraerPorCedula($cedula="")
	{
		$data = array();
		$this->cedula = $this->LimpiarDatos($this->ValidarCedula($cedula));

		$this->conectar();
		$sql="select * from miembros where cedula='$this->cedula' and statu='activo' limit 1";
		if($ver = $this->cone->query($sql))
		{
			if(mysqli_num_rows($ver)==1)
			{
				while($dato = $ver->fetch_array())
				{
					$data = array(
						'id'=>$dato['id'],
						'nombres'=>$dato['nombres'],
						'apellidos'=>$dato['apellidos'],
						'cedula'=>$dato['cedula'],
						'telefono'=>$dato['telefono'],
						'fechax'=>$dato['fechax'],
						'edad'=>$dato['edad'],
						'direccion'=>$dato['direccion'],
						'cargo'=>$dato['cargo'],
						'foto'=>$dato['foto'],
						'ano_servicio'=>$dato['ano_servicio'],
						'estudios'=>$dato['estudios'],
						'ministerios'=>$dato['ministerios']
						);
				}
			$this->desconetar();
			return $data;

			}
			else
			{
				$this->desconetar();
				return 0;
			}
		}
		else{
			$this->desconetar();
			return 1;
		}
	}

	public function EliminarMiembros($id="")
	{
		$id = intval($this->LimpiarDatos($id));
		$sql="update miembros set statu='noactivo' where id='$id'";
		$this->conectar();
		if($this->cone->query($sql)){
			return "<h3>datos eliminado con exito</h3>";
			$this->desconetar();
		}
		else
		{
			return "<h3>Error al eliminar miembro</h3>";
			$this->desconetar();
		}
	}

	public function edad($fecha_nac="")
	{
		$dia=date("j");
		$mes=date("n");
		$anno=date("Y");
		$dia_nac=substr($fecha_nac, 8, 2);
		$mes_nac=substr($fecha_nac, 5, 2);
		$anno_nac=substr($fecha_nac, 0, 4);
		if($mes_nac>$mes)
		{
			$calc_edad= $anno-$anno_nac-1;
		}
		else
		{
			if($mes==$mes_nac AND $dia_nac>$dia)
			{
				$calc_edad= $anno-$anno_nac-1;
			}
			else
			{
				$calc_edad= $anno-$anno_nac;
			}
		}
		return $calc_edad;
	}

	public function RestaurarMiembros($id="")
	{
		$id = intval($this->LimpiarDatos($id));
		$sql="update miembros set statu='activo' where id='$id'";
		$this->conectar();
		if($this->cone->query($sql))
		{
			return "<h3>miembros restaurado con exito</h3>";
			$this->desconetar();
		}
		else
		{
			return "<h3>error al restaurar miembros</h3>";
			$this->desconetar();
		}
	}


	public function RegistrarMiembros($nombre="",$apellido="",$cedula="",$telefono="",$fecha="",$cargo="",$direccion="",$url="",$estudios="",$tiempo="",$ministerios="")
	{

		$nombre =$this->LimpiarDatos($nombre);
		$apellido = $this->LimpiarDatos($apellido);
		$cedula = $this->LimpiarDatos($cedula);
		$telefono = $this->LimpiarDatos($telefono);
		$fecha = $this->LimpiarDatos($fecha);
		$cargo = $this->LimpiarDatos($cargo);
		$direccion = $this->LimpiarDatos($direccion);
		$url = $this->LimpiarDatos($url);
		$activo="activo";
		$ministerios = $this->LimpiarDatos($ministerios);
		$tiempo = $this->LimpiarDatos($tiempo);
		$estudios = $this->LimpiarDatos($estudios);


			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$nombre))
			{
				return "<h3>Error en campo nombre debe ser solo letras</h3>";
				exit();
			}
			if(strlen($nombre)>15){
				return "<h3>Error en campo nombre no puede ser mayor a 15 caracteres</h3>";
				exit();
			}

			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$apellido))
			{
				return "<h3>Error en campo apellido debe ser solo letras</h3>";
				exit();
			}
			if(strlen($apellido)>15){
				return "<h3>Error en campo apellido no puede ser mayor a 15 caracteres</h3>";
				exit();
			}

			if(!preg_match("/^[0-9]+$/",$cedula))
			{
				return "<h3>Error en campo cedula debe poseer solo numero</h3>";
				exit();
			}

			$tamano = strlen($cedula);
			if($tamano>8 || $tamano<7)
			{
				return "<h3>Error en campo cedula no puede ser mayor a 8 y menor a 7 digitos </h3>";
				exit();
			}

			$cd = $this->ConsultarMiembros($cedula,"activo");
			if($cd>=1){
				return "<h3>Error cedula ya esta registrada en el sistema como usuario activo</h3>";
				exit();
			}

			$cd= $this->ConsultarMiembros($cedula,"noactivo");
			if($cd>=1){
				return "<h3>Error cedula ya esta registrada en el sistema como usuario no activo</h3>";
				exit();
			}


			if($telefono==NULL && ($telefono==""))
			{
				$telefono="00000000000";
			}
			else
			{
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

			}


			if(!preg_match("/^[0-9]{2}[\/]{1}[0-9]{2}[\/]{1}[0-9]{4}+$/",$fecha))
			{
				return "<h3>Error en campo fecha de nacimiento formato no permitido</h3>";
				exit();
			}
			$fecha1= substr($fecha,6,9)."/".substr($fecha,3,3).substr($fecha,0,2);

			$ano = intval(substr($fecha1,0,4));
			if($ano <1900)
			{
				return "<h3>Error en campo fecha de nacimiento no puede ser menor al año 1900</h3>";
				exit();
			}
			$mes = intval(substr($fecha1,5,7));
			if($mes<1 || ($mes>12))
			{
				return "<h3>Error en campo fecha de nacimiento mes erroneo </h3>";
				exit();
			}
			$dia = intval(substr($fecha1,8,10));

			if($dia<1 ||($dia>31))
			{
				return "<h3>Error en campo fecha de nacimiento dia es erroneo </h3>";
				exit();
			}

			if(!preg_match("/^[a-zA-Zñ-Ñ0-9\s-\,]+$/",$direccion))
			{
				return "<h3>Error en campo direccion no puede tener caracteres raros</h3>";
				exit();
			}


			if(!preg_match("/^[a-zA-Zñ-Ñ\s]+$/",$cargo))
			{
				return "<h3>Error en campo cargo solo debe poseer letras</h3>";
				exit();
			}

			$edad=$this->edad($fecha1);

			if(!preg_match("/^[0-9]+$/",$tiempo))
			{
				echo "<h3>Error en campo tiempo en el señor solo se permite numero</h3>";
				exit();

			}

			if(strlen($tiempo)>2 && (strlen($tiempo)<1))
			{
				echo "<h3>Error en campo tiempo en el señor formato no permitido</h3>";
				exit();
			}

			if($estudios!="si" && ($studios!="no") && ($estudios!="No") && ($estudios)!="Si")
			{
				echo "<h3>Error en campo estudios formato no permitido</h3>";
				exit();
			}

			if(!preg_match("/^[A-Za-zñ-Ñ\,\s]+$/",$ministerios))
			{
				echo "<h3>Error en campo ministerios formato no permitido</h3>";
				exit();
			}

			$sql="insert into miembros (id,nombres,apellidos,cedula,telefono,fechax,edad,direccion,cargo,statu,foto,ano_servicio,estudios,	ministerios) values ('','$nombre','$apellido','$cedula','$telefono','$fecha1','$edad','$direccion','$cargo','$activo','$url','$tiempo','$estudios','$ministerios')";
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

	public function ConsultarMiembros($cedula="",$estatus="",$id="")
	{
		$sql="select * from miembros where cedula='$cedula' and statu='$estatus' and not id='$id'";
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

	public function EditarFotoMiembros($campo="",$valor="",$id="")
	{
		$campo = $this->LimpiarDatos($campo);
		$valor = $this->LimpiarDatos($valor);
		$this->id = intval($this->LimpiarDatos($id));

		$sql = "update miembros set ".$campo."='".$valor."' where id='".$this->id."' limit 1";
		$this->conectar();
		if($this->cone->query($sql))
		{
			$this->desconetar();
			return "<h3>foto actualizado con exito</h3>";
			exit();
		}
		else
		{
			$this->desconetar();
			return "<h3>Error no se pudo actualizar los datos</h3>";
		}


	}


	public function EditarCampoMiembros($campo="",$valor="",$id="")
	{
		$campo = $this->LimpiarDatos($campo);
		$valor = ucwords($this->LimpiarDatos($valor));
		$id = intval($this->LimpiarDatos($id));


		if($campo=="nombres")
		{
			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$valor))
			{
				return "<h3>Error en campo {$campo} debe ser solo letras</h3>";
				exit();
			}
			if(strlen($valor)>15){
				return "<h3>Error en campo {$campo} no puede ser mayor a 15 caracteres</h3>";
				exit();
			}
		}

		if($campo=="apellidos")
		{
			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$valor))
			{
				return "<h3>Error en campo {$campo} debe ser solo letras</h3>";
				exit();
			}
			if(strlen($valor)>15){
				return "<h3>Error en campo {$campo} no puede ser mayor a 15 caracteres</h3>";
				exit();
			}
		}

		if($campo=="cedula")
		{
			if(!preg_match("/^[0-9]+$/",$valor))
			{
				return "<h3>Error en campo {$campo} debe poseer solo numero</h3>";
				exit();
			}

			$tamano=strlen($valor);
			if($tamano>8 || $tamano<7)
			{
				return "<h3>Error en campo {$campo} no puede ser mayor a 8 y menor a 7 digitos </h3>";
				exit();
			}
			$cantidad = $this->ConsultarMiembros($valor,"activo",$id);
			if($cantidad >=1 ){
				return "<h3>Error en campo {$campo}, {$campo} ya esta registrado</h3>";
				exit();
			}
			$cantidad2 = $this->ConsultarMiembros($valor,"noactivo",$id);

			if($cantidad2 >=1 ){
				return "<h3>Error en campo {$campo}, {$campo} ya esta registrado como miembro no activo</h3>";
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

		if($campo=="fechax")
		{
			if(!preg_match("/^[0-9]{4}[\-]{1}[0-9]{2}[\-]{1}[0-9]{2}+$/",$valor))
			{
				return "<h3>Error en campo fecha de nacimiento formato no permitido</h3>";
				exit();
			}
			$ano = intval(substr($valor,0,4));
			if($ano <1900)
			{
				return "<h3>Error en campo fecha de nacimiento no puede ser menor al año 1900</h3>";
				exit();
			}
			$mes = intval(substr($valor,5,7));
			if($mes<1 || ($mes>12))
			{
				return "<h3>Error en campo fecha de nacimiento mes erroneo </h3>";
				exit();
			}
			$dia = intval(substr($valor,8,10));

			if($dia<1 ||($dia>31))
			{
				return "<h3>Error en campo fecha de nacimiento dia es erroneo </h3>";
				exit();
			}
			 $fecha1 = $this->edad($valor);

		}

		if($campo=="direccion")
		{
			if(!preg_match("/^[a-zA-Zñ-Ñ0-9\s-\,]+$/",$valor))
			{
				return "<h3>Error en campo {$campo} no puede tener caracteres raros</h3>";
				exit();
			}

		}

		if($campo=="cargo")
		{
			if(!preg_match("/^[a-zA-Zñ-Ñ]+$/",$valor))
			{
				return "<h3>Error en campo {$campo} solo debe poseer letras</h3>";
				exit();
			}
		}

		if($campo=="ano_servicio")
		{
			if(!preg_match("/^[0-9]+$/",$valor))
			{
				echo "<h3>Error en campo años en el señor solo se permite numero</h3>";
				exit();

			}

			if(strlen($valor)>2 && (strlen($valor)<1))
			{
				echo "<h3>Error en campo años en el señor, formato no permitido</h3>";
				exit();
			}

		}

		if($campo=="estudios")
		{
			if($valor!="si" && ($valor!="no") && ($valor!="No") && ($valor!="Si"))
			{
				echo "<h3>Error en campo estudios teologico formato no permitido</h3>";
				exit();
			}

		}

		if($campo=="ministerios")
		{
			if(!preg_match("/^[A-Za-zñ-Ñ\,\s]+$/",$valor))
			{
				echo "<h3>Error en campo {$campo} formato no permitido</h3>";
				exit();
			}

		}

		if($campo =="fechax")
		{
			$sql = "update miembros set ".$campo."='".$valor."',edad='$fecha1' where id='".$id."' limit 1";
		}
		else
		{
			$sql = "update miembros set ".$campo."='".$valor."' where id='".$id."' limit 1";
		}

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
			return "<h3>Error no se pudo actualizar los datos</h3>";
		}

	}

	public function LimpiarDatos($datos="")
	{
		$datos = trim(htmlspecialchars(htmlentities($datos)));
		return $datos;
	}

	public function ValidarCedula($cedula="")
	{
		if(!preg_match("/^[0-9]+$/",$cedula))
		{
			echo "<h3>Error en Cedula solo se permite numeros</h3>";
			exit();
		}
		return $cedula;
	}


}
