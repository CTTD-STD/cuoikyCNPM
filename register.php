<?php 
	include 'database/connectDB.php';
		
	$id = $_POST['username'];
	$pass = $_POST['password'];
	$firstname = $_POST['FirstN'];
	$lastname = $_POST['LastN'];
	$birthday = $_POST['Birthday'];
	$address = $_POST['Add'];
	$telephone = $_POST['Tele'];
	$email = $_POST['email']; 
	$sql = "INSERT INTO guestacc(guestUsername,psswd, firstName, lastName, bDay, Address, Tel, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssssss", $id, $pass, $firstname, $lastname, $birthday, $address, $telephone, $email);
	
	$isOK = $stmt->execute();
	
	$stmt->close();
	$conn->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">

		<title>Kết quả Add Customer</title>

		<!-- Bootstrap core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
		  
			
			<?php if ($isOK) { ?>
			<div class="alert alert-success">
				<h1>Create account successfully.</h1> <br>
				<h3><a href="guestLoginForm.php">Click here to go back to guestLoginForm.</a></h3>
			</div>
			<?php } else {?>
			<div class="alert alert-danger">
				Failed to add Customer. (Trùng tài khoản)
			</div>
			<?php } ?>
		  
		</div>
	</body>
</html>