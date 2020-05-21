<?php
include('db.php');
include('function.php');
if(isset($_POST["drink_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM drinks 
		WHERE id = '".$_POST["drink_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] = $row["name"];
		$output["price"] = $row["price"];
		if($row["image"] != '')
		{
			$output['drink_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_drink_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['drink_image'] = '<input type="hidden" name="hidden_drink_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>