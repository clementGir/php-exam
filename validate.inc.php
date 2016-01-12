<?php 

date_default_timezone_get();

$emailToVerify = trim(strip_tags($_GET["mail"]));

$query = "SELECT *
FROM temp";

$preparedStatement = $connexion->prepare($query);
$preparedStatement->execute();

while($result = $preparedStatement->fetch()){
	if ($result['mail_to_verify'] == $emailToVerify ) {
		//Mail adress is found 
		
		$currentDate = date('Y-m-d');
		$currentTime = date('His');
		
		$dateCreated = $result['date_created'];
		$timeCreated = $result['hour_created'];
		$timeCreated = preg_replace('/-|:/', null, $timeCreated);
		$difference = $currentTime - $timeCreated;

		if ($dateCreated == $currentDate && $difference < 3000) {
			//same day, less than 30mins later
			
			//delete temp line
			$queryDelete = "DELETE FROM temp 
			where mail_to_verify = :emailToVerify";

			$preparedStatement = $connexion->prepare($queryDelete);
			$preparedStatement->bindValue(":emailToVerify", $emailToVerify);
			$preparedStatement->execute();
			
			//add to users
			$queryAdd = "INSERT INTO users (role, email)
			VALUES ('user', :email)";

			$preparedStatement = $connexion->prepare($queryAdd);
			$preparedStatement->bindValue(":email", $emailToVerify);
			$preparedStatement->execute();

			$message = 'success';

		}
	}
	else {
		$message = 'fail';
	}
} 


?>

