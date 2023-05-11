<?php

// configuración de los errores
error_reporting(E_ALL ^ E_NOTICE);
class Conexion {
	private static $instancia;
	private $secure_db;
	// Declaramos las variables para la conexion de la base de datos 
	// todas las variables estan en private para una mayor seguridad de los datos 
	private $tipodb = 'mysql';
	private $host = 'localhost';
	private $namedb = 'isii';
	private $userdbname = 'root';
	private $Pass_sql = '';
	private $port = 3306;
	private function __construct() {
		try {

			// datos extras de la configuración del tipo de conexión a la base de datos
			// y como mostrar los errores y seleccion de idioma de la base de datos
			$options = array(
				PDO::ATTR_PERSISTENT => FALSE, 
				PDO::ATTR_EMULATE_PREPARES => FALSE, 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
			);

			// Creamos la conexion en PDO 
			// PDO('mysql:localhost=localhost;port=3306;dbname=ejemplo','roor','',);
			$this->secure_db = new PDO($this->tipodb.':host='.$this->host.';port='.$this->port.';dbname='.$this->namedb,$this->userdbname, $this->Pass_sql, $options);
			$this->secure_db->exec("SET CHARACTER SET utf8");

		} catch (PDOException $e) {
			print "¡Error de conexión!: " . $e->getMessage();
			die();
		}
	}
	// Función preparada mediante la cual se estaran ejecutando las consultas SQL
	public function prepare($sql) {
		return $this->secure_db->prepare($sql);
	}
	// Función que nos permitira extraer el ultimo id del ultimo registro realizado
	public function lastInsertId() {
		return $this->secure_db->lastInsertId();
	}
	public static function singleton() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}
	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}