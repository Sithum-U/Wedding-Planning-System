<?php
require 'config.php';

	$CustomerID = $_POST["useid"];
	$CusUsername = $_POST["use"];
	$Email = $_POST["eAdd"];
	$CusPassword = $_POST["pwd"];

	insertData ($CustomerID,$CusUsername,$Email,$CusPassword);

	function insertData ($CustomerID,$CusUsername,$Email,$CusPassword)
	{
		global $con;
		$sql = "insert into customerlogin1(Customer_ID,Customer_Username,Customer_Email,Customer_Password) Values('$CustomerID','$CusUsername','$Email','$CusPassword')";
		if($con->query($sql))
		{
			echo"Insert successful";
		}
		else
		{
			echo"Error" . $con->error;
		}
	}
?>