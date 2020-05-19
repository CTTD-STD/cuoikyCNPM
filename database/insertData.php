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
	    echo "Tạo thành công database coffeeShop! <br> ";
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
		psswd VARCHAR(30) NOT NULL,
		fullName NVARCHAR(30),
		age INT,
		phoneNum CHAR(15)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";
 	if ($conn->query($sql) === TRUE) {
	    echo "Tạo bảng adminAcc thành công! <br> ";
	}
	else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>

<?php
	include 'connectDB.php';
	//Tạo tài khoản admin
	$sql = "INSERT INTO adminAcc VALUES ('517h0111','123', 'Cao Trần Tuấn Duy', 21, '0903118098');";
	if (mysqli_multi_query($conn, $sql)) {
   	 echo "Đã thêm tài khoản admin: 517H0111! <br> ";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>

<?php
	include 'connectDB.php';
	//tạo bảng
	$sql = "CREATE TABLE guestAcc(
		guestUsername VARCHAR(30) NOT NULL UNIQUE primary key,
		psswd VARCHAR(30) NOT NULL,
		Firstname NVARCHAR(30) NOT NULL,
		Lastname NVARCHAR(30) NOT NULL,
		Bday TEXT NOT NULL,
		Address TEXT NOT NULL,
		Tel int(10) NOT NULL,
		Email VARCHAR(30) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";
 	if ($conn->query($sql) === TRUE) {
	    echo "Tạo bảng guestAcc thành công! <br> ";
	}
	else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>