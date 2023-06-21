<?php  

require_once 'conexion/conexion.php';

class categorias {
	private static $instancia;
	private $conexion;
	private function __construct() {
		$this->conexion = conexion::singleton();
	}
	public static function singleton_c() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}
	public function listaCategorias(){
		try {
			$sql = 'SELECT * FROM categorias_dsi';
			$query = $this->conexion->prepare($sql);
			$query->execute();
			$fetchAll = $query->fetchAll();
			$dato = '';
			$item = 0;
			foreach ($fetchAll as $result) {
				$item++;
				$dato.= '<tr>
					<td scope="row">'.$item.'</td>
					<td>'.htmlspecialchars($result['categorias_dsi']).'</td>
					<td>
				        <div class="btn-group" role="group" aria-label="Basic example">
				          <a type="button" class="btn btn-warning" href="editCat?id='.$result['idcategorias_dsi'].'">Editar</a>
				          <a type="button" class="btn btn-danger" onclick="eliminarCategoria('.$result['idcategorias_dsi'].');">Eliminar</a>
				        </div>
				      </td>
				</tr>';
			}
			return $dato;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	// traer los datos del puesto para editarlos
	public function datosCategoria($id) {
		try {
			$sql = 'SELECT * FROM categorias_dsi WHERE idcategorias_dsi=:id LIMIT 1';
			$query = $this->conexion->prepare($sql);
			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->execute();
			$fetchAll = $query->fetchAll();

			foreach ($fetchAll as $result) {
				$datos = array(0 => $result['idcategorias_dsi'], 
							   1 => $result['categorias_dsi']
								);
			}
			return $datos;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	// metodo para poder editar los datos del puesto
	public function editarCategoria() {
		try {
			$validacion = self::validaDataEditPuesto($_POST['CatName']);
			if ($validacion === true) {
				$id = $_POST['idCat'];
				$nombre = $_POST['CatName'];
				$sql = 'UPDATE categorias_dsi SET categorias_dsi = :nombre WHERE idcategorias_dsi = :id';
				$query = $this->conexion->prepare($sql);
				$query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$query->bindParam(':id', $id, PDO::PARAM_INT);
				if ($query->execute()){
					return true;
				} else {
					$sql = null;
					return $query->errorInfo()[2];
				}
			} else {
				return $validacion;
			}
				
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	public function AddCategoria() {
		try {
			$nombre = $_POST['nombreCat'];
			$sql = 'INSERT INTO categorias_dsi (categorias_dsi) VALUES (:nombre)';
			$query = $this->conexion->prepare($sql);
			$query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
			if ($query->execute()) {
				return true;
			} else {
				return $query->errorInfo()[2];
			}
			
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	// validar los datos del formulario para editar los datos del puesto
	public function validaDataEditPuesto($nombre) {
		$valid = self::campo_nombres($nombre,3,45);
		return $retVal = ($valid === true) ? true : $valid ;
	}

	public static function campo_nombres($val,$min,$max) {
		switch ($val) {
			case (!empty($val) && strlen($val) == 0 && $val == ''):
				return 'El campo del nombre del puesto es un campo obligatorio, asegúrese de ingresar algún dato.';
				break;
			case (strlen($val) < $min):
				return 'El campo del nombre del puesto debe tener un mínimo de '.$min.' caracteres.';
				break;
			case (strlen($val) > $max):
				return 'El campo del nombre del puesto debe tener un máximo de '.$max.' caracteres.';
				break;
			case (self::solo_letras($val) === false):
				return 'No se aceptan caracteres especiales ni múmeros en el campo.';
				break;
			default:
				return true;
				break;
		}
	}
	public static function solo_letras($cadena){
		$permitidos = "áéíóúÁÉÍÓÚÜabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
		for ($i=0; $i<strlen($cadena); $i++){
			if (strpos($permitidos, substr($cadena,$i,1))===false){
				//no es válido;
				return false;
			}
		} 
		//si estoy aqui es que todos los caracteres son validos
		return true;
	} 
	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}


?>