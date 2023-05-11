<?php

session_start();

if (isset($_SESSION['username'])) {
	if (isset($_GET['View'])) {
		$vista = $_GET['View'];
	} else {
		$vista = 'login';
	}
} else {
	$vista = 'login';
}

include 'controller/autoload.php';
$mostrar = new ViewPag;
$mostrar->validPage($vista);

?>