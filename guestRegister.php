<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<!--animation on scroll-->
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
		<link rel="stylesheet" type="text/css" href="CSS/homepageStyle.css">		
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light fixed-top">
				<div class="container">
					<img src="img/TDTlogo.png" alt="TDTlogo"style="height: 50px; width: 100px; padding-right: 10px;">
					<a class="navbar-brand" href="index.php">Coffee Project</a>
				</div>
			</nav>
		</header>
		<section class="signIn1" id="Reservation" style="height: 100%;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="headerText text-center">
							<h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Register</h2>
						</div>
					</div>
				</div>
				<div class="row clearfix" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
					<div class="offset-sm-2 col-sm-8">
						<form action="register.php" method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="FirstN" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="LastN" class="form-control"  required>
							</div>
							<div class="form-group">
								<label>Birth day</label>
								<input type="date" name="Birthday" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="Add" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Telephone number</label>
								<input type="text" name="Tele" class="form-control"  required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" required>
							</div>
							<div class="form-group text-center">
								<button class="btn btnD1" type="submit">Register
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
				<div class="row">
					<div class="col-sm-12">
						<ul class="sci">
							<li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						</ul>
						<p class="cpryt">Copyright © 2020 Coffee Project. All rights reserved. Built by <a href="https://www.facebook.com/caotran.tuanduy">CTTD</a> & <a href="https://www.facebook.com/profile.php?id=100009451589729">TTK</a>.</p>
					</div>
				</div>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
				<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
		AOS.init();
		</script>
		<script type="text/javascript">
			$(document).scroll(function(){
				$('.navbar').toggleClass('scrolled', $(this).
					scrollTop() > $('.navbar').height());
			})
		</script>
	</body>
</html>