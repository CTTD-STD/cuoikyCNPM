<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<head>
		<title>Homepage</title>
		<link rel="stylesheet" type="text/css" href="CSS/homepageStyle.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<style type="text/css">
			body{
				background-image: url(img/bodyBg.jpg);
				/*cho màn background full scale*/
				-webkit-background-size: cover;  
			   	-moz-background-size: cover;  
			   	-o-background-size: cover;
				background-attachment: fixed;
				background-position: center;
				background-size: cover;
			}
		</style>
	</head>
	<body>
		<header>
			<div class="logo"><a href="index.php"><img src="img/logoTDT.jpg"></a></div>
			<nav>
				<ul>
					<li><a href="index.php" class="active">Home<i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a href="#">Menu<i class="fa fa-coffee" aria-hidden="true"></i></a></li>
					<li><a href="#">Online Order<i class="fa fa-bell" aria-hidden="true"></i></a></li>
					<li><a href="#">About Us<i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
					<li><a href="#">Contact<i class="fa fa-phone" aria-hidden="true"></i></a></li>
					<li><a href="guestLoginForm.php">Sign in<i class="fa fa-user" aria-hidden="true"></i></a></li>
				</ul>
			</nav>
			<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</header>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.menu-toggle').click(function(){
					$('nav').toggleClass('active')
				})
			})
		</script>
	</body>
</html>