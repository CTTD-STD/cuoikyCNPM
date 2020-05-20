<?php  
	session_start();
	if (isset($_POST['uName']) && isset($_POST['password'])) {
		require_once("database/connectDB.php");
					
		$username = $_POST['uName'];
					
		$sql = "SELECT * FROM adminacc WHERE adminUsername = '$username'";
		$result = $conn->query($sql) or die($conn->error);
		$row = $result->fetch_assoc();

					
		if ($_POST['password'] == $row['psswd']) {
			$_SESSION['isLoggedIn'] = true;
			header("Location: adminDashboard.php");
		} 
		else {
			echo "<div class='alert alert-danger'> Invalid username or password </div>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/adminLoginStyle.css">
	</head>
	<body>
		<form method="POST">
			<div class="form">
				<div><h1><img src="img/logoTDT.jpg" style=" margin-bottom: 20px; width:100px; height:60px; "></h1></div>
				<h2>Admin Login</h2>
				<div class="input">
					<div class="inputBox">
						<label>Username</label>
						<input type="text" name="uName" placeholder="Enter Username" id="uName" required>
					</div>

					<div class="inputBox">
						<label>Password</label>
						<input type="password" name="password" placeholder="********" id="pssw" required>
					</div>
					
					<div class="inputBox">
						
						<input type="submit" name="" value="Sign In">
					</div>
				</div>
				
				<p class="forget">Forget Password ? <a href="#">Click Here</a></p>

			</div>
		</form>
	</body>
</html>