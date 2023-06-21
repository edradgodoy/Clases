<?php  
session_start();
require_once '../../conexion/conexion.php';

class categoria {
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
	public function eliminarCategoria($id) {
		try {
			$sql = 'DELETE FROM categorias_dsi WHERE idcategorias_dsi = :id';
			$query = $this->conexion->prepare($sql);
			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->execute();
			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}
$puesto = categoria::singleton_c();
$puesto->eliminarCategoria($_POST['id']);