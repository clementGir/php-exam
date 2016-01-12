<?php

session_start();

include 'functions.inc.php';
include 'database.php';

$page = $_GET["p"];
switch ($page) {
	case 'validate':
		$page = "validate";
		$app = "validate";
		break;

	case 'login':
		$page = "login";
		$app = "login";
		break;

	case 'admin':
		$page = "admin";
		$app = "admin";
		break;
	
	default:
		$page = "home";
		$app = "home";
		break;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
	</head>

	<body>
		<?php include $app.'.inc.php'; ?>
		<?php include $page.'.view.php'; ?>
	</body>
</html>