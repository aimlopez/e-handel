<?php

//1. created a database connection
try{
	$host= "localhost";
	$dbname = "chas";
	$user = "root";
	$pass = "madrid05";

	$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


}

catch(PDOException $e) {
	error_log($e->getMessage());
	die("A database error was encountered");
}
?>


