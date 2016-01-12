<h2>Hello, please sign in:</h2>
<form method="post">
	<input type="text" id="userName" name="userName">
	
	<label for="mail">Email:</label>
	<input type="mail" id="mail" name="mail" <?php if ($_POST['mail'] !== ''){ echo "value='".$_POST['mail']."'"; } ?>>
	<?php echo message_erreur($errors, 'mail') ?>

	<label for="pwd">Password:</label>
	<input type="password" id="pwd" name="pwd" <?php if ($_POST['pwd'] !== ''){ echo "value='".$_POST['pwd']."'"; } ?>>
	<?php echo message_erreur($errors, 'pwd') ?>

	<input type="Submit" value="Log in">
	<?php echo message_erreur($errors, 'login') ?>
</form>