<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php


// checking if a user is logged in
	//if (!isset($_SESSION['user_id'])) {
	//	header('Location: index.php');
	//}//

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/dd825e3818.js" crossorigin="anonymous"></script>
    
    <style>
        
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 220px;
  border-radius: 5px;
  background-color:#3399ff;
    margin-top: 50px;
    margin-left: 40px;
    padding: 20px;
    float: left;
    
}
.card h1{
            
color: white;
            
            
        }
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
    </style>
    
</head>
<body>
    
    <header>
		
	</header>
	
    
    <h1 style="margin:50px;color:black;">Our Dashboard</h1>
    
     <h3 style="margin-left:50px;color:red;"><i class="fas fa-plug"></i>&nbsp;Online </h3>
    
    <div class="card">
  <div class="container">
    <h4> <i class="fas fa-users"></i>&nbsp;<b><?php
$sql="SELECT * FROM customer WHERE is_deleted = 0 ";

if ($result=mysqli_query($connection,$sql))
  {

  $rowcount=mysqli_num_rows($result);

  printf("Total users %d\n",$rowcount); 
    
  mysqli_free_result($result);
  }
?></b></h4> 
   
  </div>
</div>
    
     <div class="card">
  <div class="container">
    <h4> <i class="fas fa-chart-line"></i>&nbsp;<b><?php
$sql="SELECT * FROM product WHERE is_deleted = 0  ";

if ($result=mysqli_query($connection,$sql))
  {

  $rowcount=mysqli_num_rows($result);

  printf("locations %d\n",$rowcount); 
    
  mysqli_free_result($result);
  }
?></b></h4> 
   
  </div>
</div>   
    
         <div class="card">
  <div class="container">
    <h4> <i class="fas fa-user-nurse"></i>&nbsp;<b><?php
$sql="SELECT * FROM payment ";

if ($result=mysqli_query($connection,$sql))
  {

  $rowcount=mysqli_num_rows($result);

  printf(" Events %d\n",$rowcount); 
    
  mysqli_free_result($result);
  }
?></b></h4> 
   
  </div>
</div> 
    
    
    <div class="card">
  <div class="container">
    <h4> <i class="fas fa-truck"></i>&nbsp;<b><?php
$sql="SELECT * FROM payment ";

if ($result=mysqli_query($connection,$sql))
  {

  $rowcount=mysqli_num_rows($result);

  printf(" Event Manager  %d\n",$rowcount); 
    
  mysqli_free_result($result);
  }
?></b></h4> 
   
  </div>
</div>
    
     <div class="card">
  <div class="container">
    <h4> <i class="fas fa-money-bill-alt"></i>&nbsp;<b><?php
$sql="SELECT * FROM payment ";

if ($result=mysqli_query($connection,$sql))
  {

  $rowcount=mysqli_num_rows($result);

  printf(" complete payment  %d\n",$rowcount); 
    
  mysqli_free_result($result);
  }
?></b></h4> 
   
  </div>
</div> 
    <br>
    <br>
    
     
    
    <a href="message.php">
    <div class="card">
  <img src="img/2.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h1><b>Message</b></h1>
    
  </div>
</div>
    </a>
    
   
   
 
</body>
</html>

