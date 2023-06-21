<?php 

unset($_SESSION['username']);
session_destroy();


?>

<script>
	
	window.location='index.php';
</script>