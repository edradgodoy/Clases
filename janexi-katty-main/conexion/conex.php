<?php
//clase resumen del la Conexion
abstract class Conexion
{
//propiedades de tipo estaticos y privados para mayor seguridad
	private static $user;
	private static $clave;
	private static $host;
//propiedad protegida para poder llamar el nombre de la base de datos que vamos a trabajar
	protected $bd;
//propiedad de de la conexion de la base de datos
	public $cone;
//constructor de la clase
	public function __construct(){
		self::$user="root";
		self::$clave="271188pmbs";
		self::$host="localhost";
		$this->basedato="";
		$this->cone="";

	}
//metodo para conectar a la base de datos
	protected function conectar()
	{
		$this->cone = new mysqli(self::$host,self::$user,self::$clave,$this->basedato);
		if(mysqli_connect_errno()){
			echo "<h3>Error al conectar el servidor</h3>";
			exit();
		}
	}


//metodo para desconectar la base de datos
	protected function desconetar()
	{
		$this->cone->close();
	}




}
