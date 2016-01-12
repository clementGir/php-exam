<?php 
if ($_POST) {

	$errors = array();

	// Winny's fav	
	if ($_POST['userName'] !== '') {
		die("u bot");
	}	

	// Clean
	$mail = trim(strip_tags($_POST['mail']));
	$pwd = trim(strip_tags($_POST['pwd']));

	if (is_valid_email($mail) == false){
        $errors['newMail'] = 'Sorry, the email you entered is not valid';
    }
    if ($_POST['mail'] == ''){
        $errors['mail'] = 'Please enter an email adress';
    }
    if ($_POST['pwd'] == ''){
        $errors['pwd'] = 'Please enter a password';
    }

    // Authenticate
    $query = "SELECT *
	FROM users";
	$found = false;

	$preparedStatement = $connexion->prepare($query);
	$preparedStatement->execute();
	
	while($result = $preparedStatement->fetch()){

		if ($result['email'] == $mail && $result['pwd'] == $pwd ) {
			//success!
			$_SESSION['logged_in'] = 'ok';
			$_SESSION['user'] = $user;
			header("location: index.php?p=admin");
		}	
	} 
}
?>
