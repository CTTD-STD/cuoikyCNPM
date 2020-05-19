<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="CSS/adminLoginStyle.css">
	</head>
	<body>
		<?php  
			if (isset($_POST['guestUsername']) && isset($_POST['password'])) {
				require_once("connectDB.php");
				
				$username = $_POST['guestUsername'];
					
				$sql = "SELECT * FROM guestacc WHERE guestUsername = '$username'";
				$result = $conn->query($sql) or die($conn->error);
				$row = $result->fetch_assoc();
				
				if ($_POST['password'] == $row['psswd']) {
					setcookie("user", $username, time() + 600, "/");
					header('Location:index.php');
				} 
				else {
					echo "<div class='alert alert-danger'> Invalid username or password </div>";
				}
			}
				
		?>
		<div class="form" method="POST">
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
			<p class="forget">Forget Password? <a href="#">Click Here</a></p>
			

		</div>
	</body>
</html>