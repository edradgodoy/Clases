<?php 

require_once 'conexion.php';

class testLogin{
	private static $instancia;
	private $testLogin;
	private function __construct() {
		$this->testLogin = Conexion::singleton();
	}
	public static function singleton_login() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function testLogin() {
		// capturando los datos del formulario
		$username = $_POST['username'];
		$password = $_POST['password'];
		// comprobar si el usuario existe en la base de datos 
		$sql = 'SELECT * FROM usuarios WHERE username = :username';
		$query = $this->testLogin->prepare($sql);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->execute();
		$fetchAll = $query->fetchAll();
		$count = count($fetchAll);
		if ($count > 0) {
			// traemos la contraseña del usuario resgirtada en la db
			foreach ($fetchAll as $result) {
				$contrasena = $result['password'];
				$estado = $result['estado'];
				$nombre = $result['pnombre'].' '.$result['snombre'].' '.$result['papellido'].' '.$result['sapellido'];
			}
			// encryptamos la contraseña proporcionada por el usuario
			$hash = 'A%6/[}+!|jgkd87';
            $dos = sha1(md5($password.$hash));
            $crypt = crypt($dos, '$6$rounds=9999$kkjsdjhkufiurkhudfy7hdjue$');
            if ($contrasena === $crypt) {
            	if ($estado === 'Est_0001') {
            		$_SESSION['username'] = $nombre;
            		header('location: Inicio');
            	} else {
            		return 'Lo sentimos su cuenta esta bloqueda.';
            	}
            } else {
            	return 'La contraseña no conhinsice con el nombre de usuario';
            }
		} else {
			return 'El usuario que ha ingresado no es valido';
		}
	}

	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}

?>