<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["drink_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO drinks (name, price, image) 
			VALUES (:name, :price, :image)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':price'	=>	$_POST["price"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["drink_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_drink_image"];
		}
		$statement = $connection->prepare(
			"UPDATE drinks 
			SET name = :name, price = :price, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':price'	=>	$_POST["price"],
				':image'		=>	$image,
				':id'			=>	$_POST["drink_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>