<?php
require 'Config.php';

	 $email =$_POST['emailAdd'];
		
	global $con;
	$sql="DELETE FROM users WHERE Email='$email'";
		
		if($conn->query($sql) === TRUE)
		{
			echo"<h1>Your Account Details Are Deleted</h1>";
		}
		else
		{
			echo"Error Error Error: " . $conn->error;
		}
	

?>



