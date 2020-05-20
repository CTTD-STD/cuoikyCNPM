<?php  
	if (isset($_POST['guestUsername']) && isset($_POST['password'])) {
		require_once("database/connectDB.php");
				
		$username = $_POST['guestUsername'];
					
		$sql = "SELECT * FROM guestacc WHERE guestUsername = '$username'";
		$result = $conn->query($sql) or die($conn->error);
		$row = $result->fetch_assoc();
				
		if ($_POST['password'] == $row['psswd']) {
			setcookie("user", $username, time() + 600, "/");
			header('Location:index.php');
		} 
		else {
			echo "<p class='alert alert-danger'> Invalid username or password </p>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="CSS/adminLoginStyle.css">
	</head>
	<body>
		<form method="POST">
			<div class="form">
				<div><h1><img src="img/logoTDT.jpg" style=" margin-bottom: 20px; width:100px; height:60px; "></h1></div>
				<h2>Guest Login</h2>
				<div class="input">
					<div class="inputBox">
						<label>Username</label>
						<input type="text" name="guestUsername" placeholder="Enter Username" id="uName" required>
					</div>

					<div class="inputBox">
						<label>Password</label>
						<input type="password" name="password" placeholder="********" id="pssw" required>
					</div>
					
					<div class="inputBox">
						<input type="submit" name="" value="Sign In">
					</div>
				</div>
				<p class="forget"> <a href="#">Don't have an account?</a></p>
			

			</div>
		</form>	
	</body>
</html>