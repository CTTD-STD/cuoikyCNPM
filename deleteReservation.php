<?php
	include("database/connectDB.php");
	$guestName = $_GET['guestName'];
	$sql = "DELETE FROM reservation WHERE guestName='$guestName';"; 
	if (mysqli_query($conn, $sql)) {
		echo '<h1>' . "Delete successfully ". $guestName.'</h1>'.'<br>';
		echo '<h3>' . "Click " . '<h1>'.'<a href="reservation.php">'." here ".'</a>' .'</h1>'. " to go back to reservation." . '</h3>';
	}
?>