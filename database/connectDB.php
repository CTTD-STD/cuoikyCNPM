<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "coffeeshop";
	// Create connection
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	//Tiếng việt
	$conn->set_charset('utf8');
	// Check connection

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


?>
