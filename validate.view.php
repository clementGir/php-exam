<?php 
	switch ($message) {
		case 'success':
			echo "merci, votre email est enregistré<br>";
			break;

		case 'fail':
			echo "Desolé, vous avez attendu trop longtemps. Merci de refaire une demande d'addhesion";
			break;
		
		default:
			header("location: index.php");
			break;
	}
?>
<a href="index.php">Back</a>