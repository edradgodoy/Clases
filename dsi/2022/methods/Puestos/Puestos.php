<?php 
require_once 'core/conexion.php';

class Puestos {
	private static $instancia;
	private $conexion;
	private function __construct() {
		// Conexion a la base de datos
		$this->conexion = Conexion::singleton();
	}
	public static function singleton_puestos() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}
	public function addPuesto() {
		try {
			$puesto = $_POST['nombrePuesto'];
			$valid = self::formValid($puesto);
			if ($valid === true) {
				$sql = 'INSERT INTO puestos (puesto, fecha_puetso) VALUES (:nombre, now())';
				$query = $this->conexion->prepare($sql);
				$query->bindParam(':nombre', $puesto, PDO::PARAM_STR, 45);
				if ($query->execute()) {
					return true;
				} else {
					return $query->execute();
				}
			} else {
				return $valid;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	public function editPuesto() {
		try {
			$puesto = $_POST['nombrePuesto'];
			$id = $_POST['idpuesto'];
			$valid = self::formValid($puesto);
			if ($valid === true) {
				$sql = 'UPDATE puestos SET puesto = :puesto WHERE idpuestos = :id';
				$query = $this->conexion->prepare($sql);
				$query->bindParam(':puesto', $puesto, PDO::PARAM_STR, 45);
				$query->bindParam(':id', $id, PDO::PARAM_INT);
				if ($query->execute()) {
					return true;
				} else {
					return $query->execute();
				}
			} else {
				return $valid;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	public function formValid($puesto) {
		if (strlen($puesto) > 0) {
			if (strlen($puesto) <= 45) {
				return true;
			} else {
				return 'El nombre del puesto es demaciado grande.';
			}
		} else {
			return 'El campo del nombre del puesto esta vacio.';
		}
	}
	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}
?>