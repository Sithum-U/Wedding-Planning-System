<?php
	$con=new mysqli("localhost","root","","Dreamwedding");
	
	if($con->connect_error)
	{
		die("connection failed: ".$con->connect_error);
	}


?>
