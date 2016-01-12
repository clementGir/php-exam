<?php 

if ($_POST) {

	$errors = array();

	// Winny's fav	
	if ($_POST['userName'] !== '') {
		die("u bot");
	}	

	// Clean
	$newMail = trim(strip_tags($_POST['newMail']));
	if (is_valid_email($newMail) == false){
        $errors['newMail'] = 'Sorry, the email you entered is not valid';
    }
    if ($_POST['newMail'] == ''){
        $errors['newMail'] = 'Please enter an email adress';
    }

	// Check for duplicate
	$duplicate = false;

	$querySelect = "SELECT email
	FROM users";

	$queryAdd = "INSERT INTO temp (hour_created, date_created, mail_to_verify)
	VALUES (:currentTime, :currentDate, :mail)";

	$preparedStatement = $connexion->prepare($querySelect);
	$preparedStatement->bindValue(":mail", $newMail);
	$preparedStatement->execute();

	while($result = $preparedStatement->fetch()){
		if ($result['email'] == $newMail ) {
			$duplicate = true;
			$errors['newMail'] = 'Sorry, this e-mail adress is already taken, please choose an other one';
		}
	} 
	
	if (!$duplicate) {
		date_default_timezone_get();
		$currentDate = date('Y-m-d');
		$currentTime = date('H:i:s');
		
		// Add subscrition to temp
		$preparedStatement = $connexion->prepare($queryAdd);
		$preparedStatement->bindValue(":currentDate", $currentDate);
		$preparedStatement->bindValue(":currentTime", $currentTime);
		$preparedStatement->bindValue(":mail", $newMail);
		$preparedStatement->execute();

		//send the confirmation email
		$message = "Hello, and thank you for registering. Please follow this link to validate your email: http://clementgirault.com/projets/php/exam/index.php?p=validate&mail=".$newMail;
		$sentMail = mail($newMail, "Confirm email", $message);

		// message sucess
		if ($sentMail)
	    {
			echo "Thank you, we sent you a link, please click it to confirm your email adress.";
		}
	}
}
?>