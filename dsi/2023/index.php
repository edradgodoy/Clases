<?php
session_start();
include 'controller/autoload.php';

$mostrar = new Autoload();
$mostrar->mostrar();

?>