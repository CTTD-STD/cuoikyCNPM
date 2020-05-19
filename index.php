<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/homepageStyle.css">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light fixed-top">
				<div class="container">
					<img src="img/TDTlogo.png" alt="TDTlogo"style="height: 50px; width: 100px; padding-right: 10px;">
					<a class="navbar-brand" href="#">Coffee Project</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto">
							<li class="nav-item active"><a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a></li>
							<li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
							<li class="nav-item"><a class="nav-link" href="#Reservation">Reservation</a></li>
							<li class="nav-item"><a class="nav-link" href="#aboutUs">About Us</a></li>
							<li class="nav-item"><a class="nav-link" href="#signIn">Sign In</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div class="jumbotron jumbotron-fluid height100p banner" id="home">
			<div class="container h100">
				<div class="contentBox h100">
					<div >
						<h1>Coffee Shop</h1>
						<p> Gives you the opportunity to experience the best coffee ever.
							<br>
							TO INFINITY AND BEYOND.
						</p>
					</div>
				</div>
			</div>
		</div>
		<section class="sec1" id="menu">
			<div class="container">
				<div class="row">
					<div class="offset-sm-2 col-sm-8">
						<div class="headerText text-center">
							<h2>Special Menu</h2>
							<p>This is our menu.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="placeBox">
							<div class="imgBx">
								<img src="img/img1.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Capuccino<br><span>40.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox">
							<div class="imgBx">
								<img src="img/img2.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Espresso<br><span>40.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox">
							<div class="imgBx">
								<img src="img/img3.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Cà phê sữa đá<br><span>30.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox">
							<div class="imgBx">
								<img src="img/img4.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Matcha<br><span>55.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox">
							<div class="imgBx">
								<img src="img/img5.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Peach Tea<br><span>45.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox">
							<div class="imgBx">
								<img src="img/img6.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Blue Berry<br><span>55.000 Đ</span></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sec2" id="aboutUs">
			<div class="container h100">
				<div class="containerBox h100">
					<div>
						<h2>About Us</h2>
						<p>We are students from TDTU.<br>TDTU is the number 1 university in VietNam and among top 1000 universities in the world</p>
						<a href="#" class="btn btnD1">Read More</a>
					</div>
				</div>
			</div>
		</section>
		
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
					echo "<div class='alert alert-danger'> Invalid username or password </div>";
				}
			}
				
		?>

		<section class="signIn" id="signIn">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="headerText text-center">
							<h2>Sign In</h2>
							<p>You can sign in here</p>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="offset-sm-2 col-sm-8">
						<form method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="guestUsername" placeholder="Enter Username" class="form-control" id="uName" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" placeholder="********" class="form-control" id="pssw" required>
							</div>
							<div class="form-group">
								<button class="btn btnD2">Sign In
								</button>
							</div>
							<p class="forget"> <a href="#">Don't have an account?</a></p>
			<p class="forget">Forget Password? <a href="#">Click Here</a></p>
						</form>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul class="sci">
							<li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						</ul>
						<p class="cpryt">Copyright © 2020 Coffee Project. All rights reserved. Built by <a href="https://www.facebook.com/caotran.tuanduy">CTTD</a>.</p>
					</div>
				</div>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).scroll(function(){
				$('.navbar').toggleClass('scrolled', $(this).
					scrollTop() > $('.navbar').height());
			})
		</script>
	</body>
</html>