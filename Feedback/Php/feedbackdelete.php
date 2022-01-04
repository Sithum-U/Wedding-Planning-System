<?php
require 'config.php';

	$CustomerID = $_POST["delete"];
	$Id = $_POST["delete1"];
		
	global $con;
	$sql="DELETE FROM customerfeedback WHERE C_ID = '$CustomerID' and Bill_Id ='$Id' ";
		
		if($con->query($sql) === TRUE)
		{
			$message = "Feedback Deleted";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else
		{
			$message = "Error".$con->error;
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	

?>