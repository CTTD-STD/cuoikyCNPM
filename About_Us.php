<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<head>
		<title>About us</title>
		<link rel="stylesheet" type="text/css" href="CSS/homepageStyle.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="logo"><a href="index.php"><img src="img/logoTDT.jpg"></a></div>
			<nav>
				<ul>
					<li><a href="index.php">HOME<i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href="#">MENU<i class="fa fa-coffee" aria-hidden="true"></i></a></li>
					<li><a href="#">ONLINE ORDER<i class="fa fa-bell" aria-hidden="true"></i></a></li>
					<li><a href="#" class="active">ABOUT US<i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
					<li><a href="#">CONTACT<i class="fa fa-phone" aria-hidden="true"></i></a></li>
					<li><a href="guestLoginForm.php">SIGN IN<i class="fa fa-user" aria-hidden="true"></i></a></li>
				</ul>
			</nav>
			<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</header>
		<main>
			
		</main>
		<footer>
			
		</footer>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.menu-toggle').click(function(){
					$('nav').toggleClass('active')
				})
			})
		</script>
		<div class="clearfix"></div>
		<div class="content">
						
		</div>
	</body>
</html>