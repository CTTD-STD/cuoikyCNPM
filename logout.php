<?php
	session_start();
	setcookie("user", "null", "1", "/");
	unset($_SESSION['username']);
	session_destroy();

	header("Location: index.php");
	exit;
?>