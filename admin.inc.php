<?php 
if ($_SESSION['logged_in'] !== 'ok') {
	header("location: index.php");
}

$query = "SELECT *
FROM users";

$preparedStatement = $connexion->prepare($query);
$preparedStatement->execute();

while($result = $preparedStatement->fetch()){
	echo $result['email']."<br>";
}
?>