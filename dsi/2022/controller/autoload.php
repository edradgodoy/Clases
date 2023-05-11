<?php
class ViewPag {
	public function validPage($page) {
		$Permitidas = array('Inicio', 'Productos', 'Usuarios', 'login', 'Puestos');
		if (in_array($page, $Permitidas)) {
			if ($page == 'login') {
				include 'views/login.php';
			} else {
				include 'views/header.php';
				include 'views/'.$page.'.php';
				include 'views/footer.php';
			}
		} else {
			echo "No esta permitido entrar en esta pagina.";
		}
	}
}
?>