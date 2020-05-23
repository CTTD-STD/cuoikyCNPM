
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
							<li class="nav-item">
								<a class="nav-link" href="adminDashboard.php">Admin</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<section class="sec1" id="menu" style="height: 80vh;">
				<div class="row">
					<div class="offset-sm-2 col-sm-8">
						<div class="headerText text-center">
							<h2 data-aos="fade-up">Reservations:</h2>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Name</th>
										<th scope="col">Contact Number</th>
										<th scope="col">Email</th>
										<th scope="col">Number of people</th>
										<th scope="col">Date</th>
										<th scope="col">Time</th>
										<th scope="col">Message</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
									<?php 
												require_once('database/connectDB.php');
												$sql = "SELECT * FROM reservation";
												$result = $conn->query($sql);
												$results_per_page = 7;
												$number_of_results = mysqli_num_rows($result);
												$number_of_pages = ceil($number_of_results/$results_per_page);
												if (!isset($_GET['page'])) {
													$page = 1;
												} else {
													$page = $_GET['page'];
												}
												$this_page_first_result = ($page-1)*$results_per_page;
												$sql='SELECT * FROM reservation LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
												//$result = mysqli_query($conn, $sql);
												if(isset($_POST['search'])){
													$searchKey = $_POST['search'];
													$sql = "SELECT * FROM reservation where guestName like '%$searchKey%'";
												}
												$result = mysqli_query($conn,$sql);

												if (!$result) {
													trigger_error('Invalid query: ' . $conn->error);
												}
												if ($number_of_results > 0) 
												{
													while ($row = $result->fetch_assoc()) 
													{
											?>
												<tr class="item">
													<td> <?= $row['guestName']?> 	</td>
													<td> <?= $row['email']?> 	</td>
													<td> <?= $row['phoneNum']?> 	</td>
													<td> <?= $row['numOfPeople']?> 	</td>
													<td> <?= $row['reDay']?> 	</td>
													<td> <?= $row['reTime']?> 		</td>
													<td> <?= $row['message']?> 		</td>
													<?php echo "<td><a href=\"deleteReservation.php?guestName=$row[guestName]\" onClick=\"return confirm('Are you sure you want to delete this reservation ?')\"><button class=\"btn btn-danger btn-xs delete\">Delete</button</a></td>";
					?>
												</tr>
											<?php
													}
												}
												else {
											?>
												<tr class="item">
													<td>Null</td>
													<td>Null</td>
													<td>Null</td>
													<td>Null</td>
													<td>Null</td>
													<td>Null</td>
													<td>Null</td>
												</tr>
											<?php	
												}
											?>	
								</table>
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