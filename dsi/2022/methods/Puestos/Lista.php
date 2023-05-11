<?php 

/**
 * 
 */
require_once '../../core/conexion.php';
class ListadoPuestos {
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

	public function ListaPuestos() {
		$draw = $_POST['draw'];
		$inicio = $_POST['start'];
		$search = $_POST['search']['value'];
		$lengpage = $_POST['length'];

		// total de datos sin filtro
		$sql = 'SELECT * FROM puestos';
		$query = $this->conexion->prepare($sql);
		$query->execute();
		$fetchAll = $query->fetchAll();
		$totalRecords = count($fetchAll);

		// numero de datos con filtros
		$sql2 = 'SELECT * FROM puestos WHERE 1 AND puesto = "%'.$search.'%"';
		$query2 = $this->conexion->prepare($sql2);
		$query2->execute();
		$fetchAll2 = $query2->fetchAll();
		$totalRecordwithFilter = count($fetchAll2);

		// traemos los datos para llenar la tabla
		$item = 0;
		$datos = array();
		foreach ($fetchAll as $result) {
			$item++;
			$btnEliminar = '<button onclick="eliminarPuesto('.$result['idpuestos'].');" class="btn btn-danger">Eliminar</button>';
			$btnEditar = '<button onclick="editarPuesto('.$result['idpuestos'].');" class="btn btn-warning">Editar</button>';
			$datos[] = array(
				0 => $item,
				1 => $result['puesto'],
				2 => $result['fecha_puetso'],
				3 => $btnEditar.' '.$btnEliminar
			);
		}

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $datos
		);
		echo json_encode($response);
	}

	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}
$mandarlista = ListadoPuestos::singleton_puestos();
$mandarlista->ListaPuestos();
?>