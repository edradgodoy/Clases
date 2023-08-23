<?php

class Respaldo
{

	public function __construct()
	{

	}

	public function respaldoDataBase()
	{

		$FileName="iglesia-".date("Y-m-d").".sql";
		$localhost="localhost";
		$user="root";
		$passwd="271188pmbs";
		$db="iglesia";

		$backupRoute="/var/www/html/projen/sql/";
		$command = "mysqldump --opt --host='$localhost' --user='$user' --pass='$passwd' '$db' > ".$backupRoute.$FileName;
		exec($command);


header("Content-disposition: attachment; filename='$FileName'");
header("Content-type: application/octet-stream");

readfile($backupRoute.$FileName);

	}

	public function __destruct(){

	}


}
