<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	//if (!isset($_SESSION['user_id'])) {
		//header('Location: index.php');
	//}

	$errors = array();
	$subjects = '';
	$email = '';
	$message = '';
    $msg ='';

	if (isset($_POST['submit'])) {
		
		$Product_Title = $_POST['subjects'];
		$Price = $_POST['email'];
		$Stock_ID = $_POST['message'];
        
        
        
		$image = $_FILES['image']['name'];
        
        
		// checking required fields
		$req_fields = array('subjects', 'email', 'message');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('subjects' => 50);
		$errors = array_merge($errors, check_max_len($max_len_fields));
		
      

		if (empty($errors)) {
			// no errors found... adding new record
			$subjects = mysqli_real_escape_string($connection, $_POST['subjects']);
			$email = mysqli_real_escape_string($connection, $_POST['email']);
			$message = mysqli_real_escape_string($connection, $_POST['message']);
            
            
		
			$target = "images/".basename($image);

			$query = "INSERT INTO message ( ";
			$query .= "subjects , email , attachment , message";
			$query .= ") VALUES (";
			$query .= "'{$subjects}', '{$email}', '{$image}', '{$message}'";
			$query .= ")";

			
            
           if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		   $msg = "Image uploaded successfully";
  	        }else{
  		   $msg = "Failed to upload image";
        	}
              $result = mysqli_query($connection, $query);
            
            
			if ($result) {
				// query successful... redirecting to users page
				header('Location: Contact Us.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}


		}



	}



?>
<!DOCTYPE html>





<!doctype html>
<html>
<head>
    
   <head>
		<title>DreamWedding-Home</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="./JS/javascript.js" defer></script>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		/>
	</head>
	<body>
		<header>
			<div class="logo">
				<a href="#"><img src="./IMG/Webp.net-resizeimage.png" /></a>
			</div>
			<div id="user-controls">
				<div id="user-icons">
					<div id="cart-link">
						<a href="#"><img src="./IMG/shopping-cart.png" alt="" /></a>
					</div>
					<div id="profile">
						<a href="#"><img src="./IMG/user.png" alt="" /> </a>
					</div>
				</div>
				<div id="user-auth">
					<div><a href="">Log In</a></div>
					<div><a href="">Sign Up</a></div>
				</div>
				<div id="vendor-auth">
					<a href="">Are you a Vendor</a>
				</div>
			</div>
		</header>

		<div class="navbar" id="navbar">
			<a href="#home">Home</a>
			<div class="dropdown">
				<button class="dropbtn">Categories</button>
				<div class="dropdown-content">
					<a href="#">Category 1</a>
					<a href="#">Category 2</a>
					<a href="#">Category 3</a>
					<a href="#">Category 4</a>
					<a href="#">Category 5</a>
				</div>
			</div>
			<a href="#news">Vendors</a>
			<a href="#news">NewsLetter</a>
			<a href="#news">About Us</a>
			<a href="#news">Contact Us</a>
		</div>
  

   <br><br>
		
        <p id="pre"></p>
        
   <div class="formone">
        <h2>Send Message.</h2><br>
       
       
       
       
      		<form action="Contact Us.php" method="post" class="userform" enctype="multipart/form-data" >

           <p>Subjects</p>
            <select id="subjects" name="subjects" required >
                <option value="Comstomer_service">Comstomer service</option>
                 <option value="Webmaster">Webmaster</option>
            </select>
           
           <p>Email Address</p>
          <input type="email" id="email" name="email" placeholder="Your@email.com" required  <?php echo 'value="' . $email . '"'; ?>>
        

           
            <p>Attachment</p>
           
            <input type="file" name="image">
           
           <p>Message</p>
           <textarea id="Message" name="message" placeholder="How can we help...," style="height:200px" maxlength="300" required  <?php echo 'value="' . $message . '"'; ?>></textarea>
            <br>
           <input type ="checkbox" value = "acc" id = "acc" onclick="ebutton()"> Accept parvacy<br>
           <br>
           
          <button type="submit" name="submit">Save</button>
           
       </form>
  </div>
        
        
 <div class="contacttwo">
        
        
       <h2>NEED HELP? GET IN TOUCH.</h2>
     
        <p><i class="fa fa-phone"> &nbsp;</i>Call us:<br>(+94) 8767898768</p>
        
        <p><i class="fa fa-envelope-square"> &nbsp; </i>Email us:<br>info@piyumi.lk</p>
     <br>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7999329807935!2d79.97217963132836!3d6.914507966587938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1566845441341!5m2!1sen!2slk" width="550" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
     
     
     
        </div>    
		
		
		<footer>
		<div id="social-links">
					<h2>Connect us With</h2>
					<div id="social-media-img">
						<img src="./IMG/facebook.png" alt="" />
						<img src="./IMG/twitter.png" alt="" />
						<img src="./IMG/youtube.png" alt="" />
						<img src="./IMG/pinterest.png" alt="" />
						<img src="./IMG/instagram.png" alt="" />
						<img src="./IMG/linkedin.png" alt="" />
					</div>
				</div>
			</div>
			<div id="legal">
				<div>
					<div id="copyrights">
						Copyright 2020 DreamWedding | All rights reserved
					</div>
					<div id="policies">
						<ul>
							<li><a href="">Privacy Policy</a></li>
							<li><a href="">Terms of use</a></li>
							<li><a href="">Legal</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<button onclick="topFunction()" id="topBtn" title="Go to top">
			Back to Top
		
		</footer>
        
        
        
        
        
</body>



    
    
    <script>

         document.getElementById("pre").innerHTML = myFunction();
   
    </script>
	
	
	
   
    
</html>