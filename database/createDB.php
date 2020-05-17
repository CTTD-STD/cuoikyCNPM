<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_query($conn,"SET NAMES 'UTF8'");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Create database
	$sql = "CREATE DATABASE coffeeShop";
	if (mysqli_query($conn, $sql)) {
	    echo "Database created successfully! ";
	} else {
	    echo "Error creating database: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>