<?php 

class Autoload
{
	
	public function mostrar()
	{
		if (isset($_GET['pag'])) {
			$pagina = $_GET['pag'];
		} else {
			$pagina = 'dashboard';
		}
		
		include 'views/header.php';
		include 'views/'.$pagina.'.php';
		include 'views/footer.php';
	}
}

?>