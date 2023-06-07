<?php

error_reporting(E_ALL ^ E_NOTICE);

class conexion {

	private static $instancia;
	private $conn; 
	private $driver = 'mysql';
	private $host = 'localhost';
	private $dbname = 'dsi';
	private $dbusername = 'root';
	private $dbpass = '';
	private $charset = 'utf-8';
	private $port = 3306;

	private function __construct() {
		try {

			$options = array(
				PDO::ATTR_PERSISTENT => TRUE, 
				PDO::ATTR_EMULATE_PREPARES => FALSE,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$this->charset."'"
			);
 
			$this->conn = new PDO($this->driver.':host='.$this->host.';port='.$this->port.';dbname='.$this->dbname,$this->dbusername, $this->dbpass, $options);
			$this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
			$this->conn->exec("SET CHARACTER SET ".$this->charset);
		} catch (PDOException $e) {
			print "¡Error de conexión!: " . $e->getMessage();
			die();
		}
	}
	// Función preparada mediante la cual se estaran ejecutando las consultas SQL
	public function prepare($sql) {
		return $this->conn->prepare($sql);
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