<?php


if ($_SESSION['logged_in'] == 'ok') {

	//Show mailing list
	$query = "SELECT *
	FROM users";

	$preparedStatement = $connexion->prepare($query);
	$preparedStatement->execute();

	while($result = $preparedStatement->fetch()){
		$mailingList .= "<li>".$result['email']."</li>";
	}

	// Create a user
	if (!empty($_POST['createUser'])) {

		// Clean
		$role = trim(strip_tags($_POST['role']));
		$mail = trim(strip_tags($_POST['email']));
		$pwd = trim(strip_tags($_POST['addPassword']));

		if (is_valid_email($mail) == false){
	        $errors['mail'] = 'Sorry, the email you entered is not valid';
	    }
	    if ($_POST['email'] == ''){
	        $errors['mail'] = 'Please enter an email adress';
	    }

	   	// add
	    $queryAdd = "INSERT INTO users (role, email, pwd)
		VALUES (:role, :mail, :pwd)";

		$preparedStatement = $connexion->prepare($queryAdd);
		$preparedStatement->bindValue(":role", $role);
		$preparedStatement->bindValue(":mail", $mail);
		$preparedStatement->bindValue(":pwd", $pwd);
		$preparedStatement->execute();

		$success['successAdd'] = 'User succesfully added.';

	}
	
	// Remove from db
	if (!empty($_POST['removeUser'])) {
		
		// Clean
		$emailToRemove = trim(strip_tags($_POST['emailRemove']));

		if (is_valid_email($emailToRemove) == false){
	        $errors['emailRemove'] = 'Sorry, the email you entered is not valid';
	    }
	    if ($_POST['emailRemove'] == ''){
	        $errors['emailRemove'] = 'Please enter an email adress';
	    }

		// Remove
		$queryDelete = "DELETE FROM users 
		where email = :emailToRemove";

		$preparedStatement = $connexion->prepare($queryDelete);
		$preparedStatement->bindValue(":emailToRemove", $emailToRemove);
		$preparedStatement->execute();

		$success['successRemove'] = 'User succesfully deleted.'; 
	}
	
}
else {
	header("Location: index.php");
}

?>