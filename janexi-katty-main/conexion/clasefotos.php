<?php
class Fotos extends Conexion
{

	public $url,$titulo,$id;

	public function __construct()
	{
		parent::__construct();
		$this->basedato="iglesia";
	}

	public function LimpiarDatos($datos){
		$datos = trim(htmlspecialchars($datos));
		return $datos;
	}

	public function SubirFotos($titulo="",$url="")
	{

		$this->titulo = $this->LimpiarDatos($titulo);
		$this->url = $this->LimpiarDatos($url);
		$this->conectar();
		$this->sql="INSERT INTO foto (id,titulo,nombredfoto) VALUES ('','$this->titulo','$this->url')";
		if($this->cone->query($this->sql))
		{
			$this->desconetar();
			return "<h3>datos agregados con exito</h3>";
		}
		else
		{
			$this->desconetar();
			return "<h3>Error al subir datos a la base de datos</h3>";

		}


	}

	public function ObetenerTodasFotos(){

		$data = array();
		$this->sql="select * from foto";
		$this->conectar();
		if($a = $this->cone->query($this->sql))
		{

				if(mysqli_num_rows($a)>=1)
				{
					$i=0;
					while($datos = $a->fetch_array())
					{
						$data[$i++] = array(
							'id'=> $datos['id'],
							'titulo' => $datos['titulo'],
							'nombredfoto' => $datos['nombredfoto']
							);
					}

						$this->desconetar();
						return $data;
				}
				else
				{
					$this->desconetar();
					return "<h3>Error no hay fotos guardada en la base de dato</h3>";

				}
		}
		else
		{
			$this->desconetar();
			return "<h3>Error al cosultar datos</h3>";
		}

	}

	public function EliminarFoto($id=""){

		$this->id = intval($this->LimpiarDatos($id));
		$dat = $this->ConsultarFotos($this->id);
		if($dat == 1){

			$this->conectar();
			$this->sql="DELETE FROM foto WHERE id='$this->id'";
			if($this->cone->query($this->sql))
			{
				$this->desconetar();
				return "<h3>datos eliminado con exito</h3>";
			}
			else
			{
				$this->desconetar();
				return "<h3>Error en datos</h3>";
			}

		}
		else
		{
			$this->desconetar();
			return "<h3>Error al cosultar datos</h3>";
		}
	}

	public function EditarDatosFotos($id="",$campo="",$valor="")
	{
		$id = $this->LimpiarDatos($id);
		$campo= $this->LimpiarDatos($campo);
		$valor= $this->LimpiarDatos($valor);

		$sql = "update  foto  set ".$campo."='".$valor."' where id='".$id."' limit 1";
		$this->conectar();
		if($this->cone->query($sql)){

			return "<h3>datos actualizado con exito</h3>";
		}
		else
		{

			return "<h3>Error al actualizar datos</h3>";
		}
		$this->desconetar();

	}


	public function ConsultarFotos($id="")
	{
		$this->conectar();
		$this->sql="select nombredfoto from foto where id='$id' limit 1";
		if($datos = $this->cone->query($this->sql))
		{
			if(mysqli_num_rows($datos) == 1)
			{
				$ver = $datos->fetch_array();
				$foto = $ver['nombredfoto'];
				if(file_exists($fotos))
				{
					unlink($fotos);
				}
				$this->desconetar();
				return 1;
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
			echo "<h3>Error en consulta </h3>";
			exit();
		}
	}

	public function __destruct()
	{

	}


}
