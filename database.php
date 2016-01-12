<?php

$host = 'db609015748.db.1and1.com';
$dbname = 'db609015748';
$user = 'dbo609015748';
$password = 'rootroot';

// connexion
try {
	$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
	$connexion = new PDO($dsn, $user, $password);
} 
catch(PDOException $e) {
	echo $e->getMessage();
}

?>