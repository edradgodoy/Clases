<?php 

require_once '../../core/conexion.php';

class Datos {
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
	public function traerDatos($id) {
		$sql = 'SELECT * FROM puestos WHERE idpuestos = :id';
		$query = $this->conexion->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$fetchAll = $query->fetchAll();
		foreach ($fetchAll as $result) {
			$datosPuesto = array(0 => $result['puesto']);
		}
		return $datosPuesto;
	}
}
$id = $_POST['dato'];
$result = Datos::singleton_puestos();
$datos = $result->traerDatos($id);
echo json_encode($datos);

?>