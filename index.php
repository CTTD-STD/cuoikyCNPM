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
<?php
	if (isset($_POST['Rname']) && isset($_POST['Contact'])) {
		require_once("database/connectDB.php");
		$Rname = $_POST['Rname'];
		$Contact = $_POST['Contact'];
		$Remail = $_POST['Remail'];
		$Rnum = $_POST['Rnum'];
		$Rdate= $_POST['Rdate'];
		$Rtime= $_POST['Rtime'];
		$Rmessage= $_POST['Rmessage'];

		$sql = "INSERT INTO reservation(guestName,email, phoneNum, numOfPeople, reDay, retime, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssss", $Rname, $Contact, $Remail, $Rnum, $Rdate, $Rtime,$Rmessage);
		
		$reServed = $stmt->execute();
		if ($reServed) {?>
			<div class="alert alert-success" style="padding: 0; margin: 0;">
				Information has been recored.
			</div>
		<?php	
		}
		else{?>
			<div class="alert alert-danger">
				Error.
			</div>
		<?php
		}
		$stmt->close();
		$conn->close();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

		<script src="js/jquery.min.js"></script>
		
		<script src="js/bootstrap.min.js"></script>

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
							<li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
							<li class="nav-item"><a class="nav-link" href="#Reservation">Reservation</a></li>
							<li class="nav-item"><a class="nav-link" href="#aboutUs">About Us</a></li>
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
		<div class="jumbotron jumbotron-fluid height100p banner" id="home">
			<div class="container h100">
				<div class="contentBox h100">
					<div >
						<h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Coffee Shop</h1>
						<p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"> Gives you the opportunity to experience the best coffee ever.
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
							<h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Special Menu</h2>
							<div class="makeorder" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" style="text-align: center;">
					<a href="coffeeCart.php" class="btn btn-success" id="clear_cart">
						<span></span> Make Order
					</a>
				</div>
							<p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">This is our special menu.</p>
						</div>
					</div>
				</div>
				
				<div class="row">

					<div class="col-sm-4">
						<div class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
							<div class="imgBx">
								<img src="img/img1.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Capuccino<br><span>40.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
							<div class="imgBx">
								<img src="img/img2.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Espresso<br><span>40.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
							<div class="imgBx">
								<img src="img/img3.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Cà phê sữa đá<br><span>30.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox" class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
							<div class="imgBx">
								<img src="img/img4.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Matcha<br><span>55.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox" class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
							<div class="imgBx">
								<img src="img/img5.jpg" class="img-fluid" style="width: 300px; height: 250px">
							</div>
							<div class="content">
								<h3>Peach Tea<br><span>45.000 Đ</span></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="placeBox" class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
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
		<section class="signIn1" id="Reservation">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="headerText text-center">
							<h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Reservation</h2>
							<p  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">You can book your table here.</p>
						</div>
					</div>
				</div>
				<div class="row clearfix" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
					<div class="offset-sm-2 col-sm-8">
						<form method="POST">
							<div class="row">
								<div class="form-group col-md-6 col-sm-12">
									<label>Name</label>
									<input type="text" name="Rname" placeholder="" class="form-control" id="Rname" required>
								</div>
								<div class="form-group col-md-6 col-sm-12">
									<label>Contact Number</label>
									<input type="text" name="Contact" placeholder="" class="form-control" id="Contact" required>
								</div>
								<div class="form-group col-md-6 col-sm-12">
									<label>Email</label>
									<input type="Email" name="Remail" placeholder="" class="form-control" id="Remail" required>
								</div>
								<div class="form-group col-md-6 col-sm-12">
									<label>Number of people</label>
									<input type="Number" value="5"name="Rnum" min="5" placeholder="" class="form-control" id="Rnum" required>
								</div>
							</div>
							<div class="form-group">
								<label>Date</label>
								<input type="date" name="Rdate" placeholder="" class="form-control" id="Rdate" required>
							</div>
							<div class="form-group">
								<label>Time</label>
								<input type="time" name="Rtime" placeholder="" class="form-control" id="Rtime" required>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control textarea" name="Rmessage" id="Rmessage">
								</textarea>
								<!--<input type="text" name="Rmessage"  placeholder="" class="form-control" id="Rmessage" required>-->
							</div>
							<div class="form-group text-center">
								<button class="btn btnD1" type="submit">Booking
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<section class="sec2" id="aboutUs">
			<div class="container h100">
				<div class="containerBox h100" >
					<div>
						<h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">About Us</h2>
						<p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">We are students from TDTU.<br>TDTU is the number 1 university in VietNam and among top 1000 universities in the world</p>
					</div>
				</div>
			</div>
		</section>
		


		<?php
			if( !isset($_COOKIE['user']))
			{
				?>
					<section class="signIn" id="signIn" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="headerText text-center">
										<h2><a href="adminLoginForm.php">Admin Sign In</a></h2>
										<p>or<br><h2>Guest Sign In</h2><br>You can sign in here.</p>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="offset-sm-2 col-sm-8">
									<form action="index.php" method="POST">
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="guestUsername" placeholder="Enter Username" class="form-control" id="guestUsername" required>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" placeholder="********" class="form-control" id="password" required>
										</div>
										<div class="form-group text-center">
											<button class="btn btnD1" type="submit">Sign In
											</button>
										</div>
										<p class="forget"> <a href="guestRegister.php">Don't have an account?</a></p>
									</form>
								</div>
							</div>
						</div>
					</section>
				<?php
			}
		?>
		




		<hr>
		<footer >
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