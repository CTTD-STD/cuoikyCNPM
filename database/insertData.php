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
	//tạo bảng
	$sql = "CREATE TABLE guestAcc(
		guestUsername VARCHAR(30) NOT NULL UNIQUE primary key,
		psswd VARCHAR(30) NOT NULL,
		firstName NVARCHAR(30) NOT NULL,
		lastName NVARCHAR(30) NOT NULL,
		bDay TEXT NOT NULL,
		address TEXT NOT NULL,
		tel int(10) NOT NULL,
		email VARCHAR(30) NOT NULL
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

<?php
	include 'connectDB.php';
	//Tạo bảng
	$sql = "CREATE TABLE reservation(
		guestName VARCHAR(30) NOT NULL,
		email VARCHAR(30) NOT NULL,
		phoneNum VARCHAR(30) NOT NULL,
		numOfPeople TEXT NOT NULL,
		reDay DATE NOT NULL,
		reTime TIME NOT NULL,
		message VARCHAR(300)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";
 	if ($conn->query($sql) === TRUE) {
	    echo "Tạo bảng reservation thành công! <br> ";
	}
	else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>
<?php
	include 'connectDB.php';
	//Tạo bảng
	$sql = "CREATE TABLE drinks(
		id int(11) PRIMARY KEY NOT NULL,
		name varchar(150) UNIQUE NOT NULL ,
		price int(11) NOT NULL,
		image varchar(150) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";	
 	if ($conn->query($sql) === TRUE) {
	    echo "Tạo bảng drinks thành công! <br> ";
	}
	else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>
<?php
	include 'connectDB.php';
	//Tạo tài khoản admin
	$sql = "INSERT INTO adminAcc VALUES ('517h0111','123','Cao Trần Tuấn Duy', 21, '0903118098');";
	$sql .= "INSERT INTO guestAcc VALUES ('517h0111','123','Cao','Trần Tuấn Duy','12-06-1999','Ho Chi Minh City', '0903118098', '517h0111@gmail.com');";
	$sql .= "ALTER TABLE drinks MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;";
	$sql .= "INSERT INTO `drinks` (`id`, `name`, `price`, `image`) VALUES (75, 'Capuccino', 40000, 'img1.jpg'),(76, 'Espresso', 40000, 'img2.jpg'), (77, 'Cà phê sữa đá', 30000, 'img3.jpg'), (78, 'Matcha', 55000, 'img4.jpg'), (79, 'Peach Tea', 45000, 'img5.jpg'), (80, 'Blue Berry', 55000, 'img6.jpg');";
	if (mysqli_multi_query($conn, $sql)) {
   	 echo "Đã thêm tài khoản guest và admin: 517H0111! <br> Đã thêm item cơ bản của menu thành công ";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>