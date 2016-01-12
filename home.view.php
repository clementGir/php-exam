<h1>Your Startup</h1>
<p>Stay up to date with the latest product by joining our newsletter!</p>

<form method="post">
	<input type="text" id="userName" name="userName">
	<label for="newMail">Email:</label>
	<input type="mail" id="newMail" name="newMail" <?php if ($_POST['newMail'] !== ''){ echo "value='".$_POST['newMail']."'"; } ?>>
	<input type="Submit" value="Join newsletter">
	<?php echo message_erreur($errors, 'newMail') ?>
</form>

<a href="?p=login">Admin</a>
