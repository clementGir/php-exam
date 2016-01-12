<h1>Welcome admin</h1>
<a href="logout.php">Log out</a>

<h3>Add a user manualy:</h3>
<form method="post">
	<label for="role">Role</label>
	<input type="radio" name="role" value="admin">Admin<br>
    <input type="radio" name="role" value="user" checked>Customer<br>

    <label for="email">email</label>
    <input type="email" name="email" <?php if ($_POST['email'] !== ''){ echo "value='".$_POST['email']."'"; } ?>>
    <?php echo message_erreur($errors, 'mail') ?>

    <label id ="passwordLabel" for="addPassword">Password</label>
    <input type="password" id="addPassword" name="addPassword" <?php if ($_POST['addPassword'] !== ''){ echo "value='".$_POST['addPassword']."'"; } ?>>

    <input type="submit" name="createUser" value="Add user">
</form>
<?php echo message_success($success, 'successAdd') ?>

<h3>Remove a user manualy:</h3>
<form method="post">

    <label for="emailRemove">email</label>
    <input type="email" name="emailRemove" <?php if ($_POST['emailRemove'] !== ''){ echo "value='".$_POST['emailRemove']."'"; } ?>>
    <?php echo message_erreur($errors, 'emailRemove') ?>

    <input type="submit" name="removeUser" value="Remove user">
</form>
<?php echo message_success($success, 'successRemove') ?>

<h3>Mailing list:</h3>
<ul><?php echo $mailingList; ?></ul>

<a href="javascript:window.location.reload();">Refresh</a>