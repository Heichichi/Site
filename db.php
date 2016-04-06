<?php 
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "site";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
						    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>