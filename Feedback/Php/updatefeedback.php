<?php

	require 'config.php';
	
	$Rate = $_POST["erate"];
	$CustomerID = $_POST["eid"];
	$Id = $_POST["bill"];
	$Comment = $_POST["eco"];
	
	global $con;
	$sql = "UPDATE customerfeedback SET C_rate  = '$Rate' ,C_Comment = '$Comment' WHERE C_ID = '$CustomerID' and Bill_Id='$Id' ";
	
		if($con->query($sql) === TRUE)
		{
		
			$message = "Feedback Updated";
			echo "<script type='text/javascript'>alert('$message');</script>";
			exit();
		}
		else
		{
			$message = "Error".$con->error;
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		

?>

