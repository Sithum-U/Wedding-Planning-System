<?php

require 'Config.php';

$email =$_POST['emailAdd'];
	
	global $conn;
	$sql = " SELECT  , CompanyName, Category, Email, Password, MobileNo, Location, Bio FROM users WHERE Email='$email'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<h1><font color = white>!Your Profile Details As Bellow!</h1>";
			
			echo "<h2><font color = yellow>CompanyID : " . $row["CompanyID"]. "<br>" . "CompanyName : " . $row["CompanyName"]. "<br>" . "Category : " . $row["Category"] . "<br>" ."Email : " . $row["Email"]. "<br>" . "Password : " . $row["Password"]."<br>" . "MobileNo : " . $row["MobileNo"]."<br>" . "Location : " . $row["Location"]."<br>" . "MobileNo : " . $row["MobileNo"]."<br>" . "Location : " . $row["Location"]."<br>" . "Bio : " . $row["Bio"]."</h2></font><br>"  ;
		}
	}
	else
	{
		echo "<h2>Details are not available</h2>";
	}
	
?>
