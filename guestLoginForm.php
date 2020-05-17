<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="CSS/adminLoginStyle.css">
	</head>
	<body>
		<div class="form" method="POST">
			<div><h1><img src="img/logoTDT.jpg" style=" margin-bottom: 20px; width:100px; height:60px; "></h1></div>
			<h2>Guest Login</h2>
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
			<p class="forget"> <a href="#">Don't have an account?</a></p>
			<p class="forget">Forget Password? <a href="#">Click Here</a></p>

		</div>
	</body>
</html>