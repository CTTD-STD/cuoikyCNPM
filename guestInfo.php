<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
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
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto">
							<?php
								if( !isset($_COOKIE['user']))
								{
									?>
										<li class="nav-item"><a class="nav-link" href="#signIn">Sign In</a></li>
									<?php
								}
								else{
									?>
									<li class="nav-item">
										<a class="nav-link" href="guestInfo.php">Welcome, <?php echo $_COOKIE['user'];?>
										!</a>
									</li>
									<?php
								}
							?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<section class="sec1" id="menu" style="height: 100%;">
			<div class="container">
				<div class="row">
					<div class="offset-sm-2 col-sm-8">
						<div class="headerText text-center">
							<h2 data-aos="fade-up">Guest Info</h2>
							<form action="/action_page.php" data-aos="fade-up">
								<div class="form-group">
									<label for="id">Tên đăng nhập:</label>
									<input class="form-control" id="id"  value="<?php echo $_COOKIE['user']; ?>" readonly>
								</div>
								<?php 
									require_once('database/connectDB.php');
									$id = $_COOKIE['user'];
									$sql = "SELECT * FROM guestacc where guestUsername = '$id'";

									$result = $conn->query($sql);
									$row = $result->fetch_assoc();
									
								?>
								<div class="form-group">
									<label for="text">Password:</label>
									<input type="" class="form-control" id="pwd" value="<?php echo $row['psswd']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="text">Họ:</label>
									<input type="" class="form-control" id="pwd" value="<?php echo $row['firstName']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="text">Tên:</label>
									<input type="" class="form-control" id="pwd" value="<?php echo $row['lastName']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="pwd">Ngày sinh:</label>
									<input type="" class="form-control" id="pwd" value="<?php echo $row['bDay']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="pwd">Địa chỉ:</label>
									<input type="" class="form-control" id="pwd" value="<?php echo $row['address']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="pwd">Điện thoại:</label>
									<input type="number" class="form-control" id="pwd" value="<?php echo $row['tel']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="" class="form-control" id="pwd" value="<?php echo $row['email']; ?>" readonly>
								</div>
								<button type="button" class="btn btn-danger"><a href="logout.php" style="text-decoration: none; color: white;">Logout</a></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<hr>
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