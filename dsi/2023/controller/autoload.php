<?php 

class Autoload
{

	public function mostrar()
	{
		if (isset($_SESSION['username'])) {
			// si la variable GET de la URL existe
			if (isset($_GET['pag'])) {
				$pagina = $_GET['pag'];
			} else {
				$pagina = 'dashboard';
			}

			// lista blanca de paginas
			if ($pagina == 'dashboard' || $pagina == 'productos' || $pagina == 'logout' || $pagina == 'puestos' || $pagina == 'editPuesto' || $pagina == 'addPuesto' || $pagina == 'categorias' || $pagina == 'addCat' || $pagina == 'editCat') {
				$pag = $pagina;
			} else {
				$pag = 'dashboard';
			}
			include 'views/header.php';
			include 'views/'.$pag.'.php';
			include 'views/footer.php';

		} else {
			include 'views/login.php';
		}
	}
}

?>