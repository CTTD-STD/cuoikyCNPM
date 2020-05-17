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

<?php
	include 'connectDB.php';
	//Tạo bảng
	$sql = "CREATE TABLE adminAcc(
		adminUsername VARCHAR(30) NOT NULL UNIQUE primary key,
		psswd VARCHAR(30) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";
 	if ($conn->query($sql) === TRUE) {
	    echo "Table created successfully";
	}
	else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>