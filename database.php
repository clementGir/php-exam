<?php

$host = 'localhost:8889';
$dbname = 'examen';
$user = 'root';
$password = 'root';

// connexion
try {
	$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
	$connexion = new PDO($dsn, $user, $password);
} 
catch(PDOException $e) {
	echo $e->getMessage();
}

?>