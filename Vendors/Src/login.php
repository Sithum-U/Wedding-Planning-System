<?php include_once 'Config.php'; ?>
<?php
	//check for form submission
	if (isset($_POST['btn1'])) {

		$errors = array();

		//check whether the username and password is entered
		if(!isset($_POST['emailAdd']) || strlen(trim($_POST['emailAdd']))<1) {
			$errors[] = "Username is Missing / Invalid";
		}

		if(!isset($_POST['pwd']) || strlen(trim($_POST['pwd']))<1) {
			$errors[] = "Password is Missing / Invalid";
		}

		//check for errors in the form 
		if (empty($errors)) {
			//save username and password into variables
			$email = mysqli_real_escape_string($conn,$_POST['emailAdd']);
			$password = mysqli_real_escape_string($conn,$_POST['pwd']); 

			//prepare database query
			$query = "SELECT * FROM users
						WHERE Email = '{$email}'
						AND Password = '{$password}'
						LIMIT 1";

			$result_set = mysqli_query($conn,$query);

			if ($result_set) {
				//query successfull

				if (mysqli_num_rows($result_set) == 1) {
					//valid user found
					//direct to VendorProfile.php
					header('Location: VendorProfile.php');
				}
				else {
					//username and password invalid
					$errors[] = 'Invalid Username / Password';
				}
			}
			else {
				$errors[] = 'Database query failed';
			}
		}
	}
?>

<html>
<head>
	<title>DW-VendorRegistration</title>
	<link rel="stylesheet" href="../Styles/styles.css">
	<link rel="stylesheet" href="../Styles/hfstyle.css">
	<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		/>
	<script src="../Js/myscript.js" defer></script>
</head>
<body>
	<header>
			<div class="logo1">
				<a href="#"><img src="../Images/Webp.net-resizeimage.png" /></a>
			</div>
			<div id="user-controls">
				<div id="user-icons">
					<div id="cart-link">
						<a href="#"><img src="../Images/shopping-cart.png" alt="" /></a>
					</div>
					<div id="profile">
						<a href="#"><img src="../Images/user.png" alt="" /> </a>
					</div>
				</div>
				<div id="user-auth">
					<div><a href="">Log In</a></div>
					<div><a href="">Sign Up</a></div>
				</div>
				<div id="vendor-auth">
					<a href="">Are you a Vendor?</a>
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

		<div class="ven-reg1">
			<form class= "typ" action="VendorProfile.php" target="" method="POST" onsubmit="return validatePassword()">
			<h1>Vendor Login</h1><br>
			<p style="font-size:18px">Please fill in this form to login</p><br>
			<?php
				if (isset($errors) && !empty($errors)) {
					echo '<p>Invalid Username / Password</p>';
				}
			?>
			<hr>
			<br>
				<b>Email</b><br>
				<input type="email" id="email" name="emailAdd" style="width:450px" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" placeholder="Enter Company email" required><br><br>

				<b>Password</b><br>
				<input type="Password" id="pwd" name="pwd" style="width: 450px" placeholder="Enter Password" required><br><br>
				
				
				<input class="subButton" type="submit" id="btn1" name="btn1" value="Login">
				<input class="rst-btn" type="reset" id="btn2" name="reset" value="Reset">
			</form>
		</div>

	<div class="footer">
			<button class="open-button" onclick="openForm()">Chat</button>
			<div class="chat-popup" id="myForm">
				<form action="#" class="form-container">
					<h1 style="text-align: center;">Messages</h1> <br>

					<label for="mail" style="text-align: left;"><b>Enter your email</b></label>
					<input for="mail"type="email" placeholder="Enter your mail address to reach you back" required><br>
					<label for="msg" style="text-align: left;"><b>Enter your message</b></label>
					<textarea placeholder="Type message.." name="msg" required></textarea>

					<button type="submit" class="btn">Send</button>
					<button type="button" class="btn cancel" onclick="closeForm()">
						Close
					</button>
				</form>
			</div>
			<div id="site-map">
				<div class="columnleftfooter vertical-menu">
					<h2>DreamWedding</h2>
					<a href="#" class="active">Home</a>
					<div class="dropup">
						<button class="dropbtn">Category</button>
						<div class="dropup-content">
							<a href="#">Category 1</a>
							<a href="#">Category 2</a>
							<a href="#">Category 3</a>
							<a href="#">Category 4</a>
							<a href="#">Category 5</a>
						</div>
					</div>
					<a href="#">Vendors</a>
					<a href="#">NewsLetter</a>
					<a href="#">About Us</a>
					<a href="#">Contact Us</a>
				</div>
				<div id="newsletter">
					<h2>NewsLetter</h2>
					<div id="email-sub">
						<div id="enter-email">
							<img src="../Images/email.png" alt="" width="30px" height="30px"/>
							<input type="email" placeholder="Enter your e-mail" />
						</div>
						<div id="emailSubcribe">
							<div><button>Subscribe to NewsLetter ></button></div>
						</div>
					</div>
				</div>
				<div id="social-links">
					<h2>Connect us With</h2>
					<div id="social-media-img">
						<img src="../Images/facebook.png" alt="" />
						<img src="../Images/twitter.png" alt="" />
						<img src="../Images/youtube.png" alt="" />
						<img src="../Images/pinterest.png" alt="" />
						<img src="../Images/instagram.png" alt="" />
						<img src="../Images/linkedin.png" alt="" />
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
		</button>
</body>
</html>
<?php mysqli_close($conn); ?>