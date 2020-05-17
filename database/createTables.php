<?php
	include 'connectDB.php';

	$sql = "CREATE TABLE Admin(
		adminUsername VARCHAR(30) NOT NULL UNIQUE primary key,
		psswd VARCHAR(30) NOT NULL,
		fullName VARCHAR(30),
		age INT
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