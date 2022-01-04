<?php
require 'config.php';
	 
	$Rate = $_POST["rate"];
	$CustomerID = $_POST["bill"];
	$CusUsername = $_POST["use"];
	$Email = $_POST["eAdd"];
	$vendor = $_POST["vendor"];
	$Comment = $_POST["co"];


	insertData ($Rate,$CustomerID,$CusUsername,$Email,$vendor,$Comment);

	function insertData ($Rate,$CustomerID,$CusUsername,$Email,$vendor,$Comment)
	{
		global $con;
		$sql = "insert into customerfeedback(Bill_Id,C_ID,C_Username,C_Email,C_rate,C_Comment) Values('$vendor','$CustomerID','$CusUsername','$Email','$Rate','$Comment')";
		if($con->query($sql))
		{
			$message = "Insert successful";
			echo "<script type='text/javascript'>alert('$message');</script>";
			
		}
		else
		{
			$message = "Error".$con->error;
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>