<?php

function upload_image()
{
	if(isset($_FILES["drink_image"]))
	{
		$extension = explode('.', $_FILES['drink_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['drink_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($drink_id)
{
	include('db.php');
	$statement = $connection->prepare("SELECT image FROM drinks WHERE id = '$drink_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM drinks");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>