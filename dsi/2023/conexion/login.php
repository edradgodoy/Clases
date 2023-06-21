<?php  

require_once 'conexion.php';

/**
 * 
 */
class login {
	private static $instancia;
	private $conexion;
	private function __construct() {
		$this->conexion = conexion::singleton();
	}
	public static function singleton_l() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}
	public function ingresar(){
		if (!empty($_POST['username'])) {
			if (!empty($_POST['password'])) {
				try {
					$usuario = $_POST['username'];
					$pass = $_POST['password'];
					$password = crypt(sha1(md5('asdf'.$pass.'asdfsaf')), '$6$rounds=5000$usesomesillystringforsalt$');
					$sql = "SELECT * FROM usuario_dsi WHERE username_usuario_dsi = :usuario AND pass_usuario_dsi = :password LIMIT 1";
					$query = $this->conexion->prepare($sql);
					$query->bindParam(':usuario', $usuario, PDO::PARAM_STR);
					$query->bindParam(':password', $password, PDO::PARAM_STR);
					$query->execute();
					$fetchAll = $query->fetchAll();
					$count = count($fetchAll);
					foreach ($fetchAll as $result) {
						$user = $result['username_usuario_dsi'];
						$passw = $result['pass_usuario_dsi'];
					}
					if ($count == 1) {
						$_SESSION['username'] = $result['pnombre_usuario_dsi'].' '.$result['snombre_usuario_dsi'].' '.$result['papellido_usuario_dsi'].' '.$result['sapellido_usuario_dsi'];
						header('location: dashboard');
					} else {
						echo '<div class="alert alert-danger text-white text-center">El nombre de usuario o contraseña son incorrectos, por favor, intentelo nuevamente...</div>';
					}
					
				} catch (Exception $e) {
					echo '<div class="alert alert-danger text-white text-center">'.$e->getMessage().'</div>';
				}
			} else {
				echo '<div class="alert alert-danger text-white text-center">La contraseña es un campo obligatorio...</div>';
			}
		} else {
			echo '<div class="alert alert-danger text-white text-center">El nombre de usuario es un campo obligatorio...</div>';
		}
		
	}
	public function __clone() {
		trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
	}
}

$log = login::singleton_l();
$log->ingresar();

?>