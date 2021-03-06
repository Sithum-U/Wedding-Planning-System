<?php include_once 'Config.php'; ?>

<html>
<head>
	<title>Vendor Profile</title>
	<link rel="stylesheet" type="text/css" href="../Styles/styles.css">
	<link rel="stylesheet" href="../Styles/hfstyle.css">
	<script src="../Js/myscript.js" defer></script>
	<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		/>
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
		</div><br>

	<div class="ven-reg1"><br>
	<div class="proDiv">
	
		<img class="dp" src="../Images/vendor.png" width="150px" height="150px"><br>
		<b><p align="center">
			Cphoto Studio
			<br><br>Customer Ratings<br><img src="../Images/rate.png" height="30" width="150"><br><br></p>
		<p align="left">cphotostudio@gmail.com<br><br>0711234567<br><br><img src="../Images/edit.png" width="30px" height="30px">
		<button class="editButton" type="button" id="button3" onclick="document.getElementById('ids').style.display='block'">Edit account</button>
		<button onclick="document.getElementById('ids').style.display='block'" style="width:auto;"></button><br><br><br>
	<div id="ids" class="modalbg">
		<span onclick="document.getElementById('ids').style.display='none'" class="clse" title="Close Modal">&times;</span>
			<form class= "typ" action="#" target="_blank" method="POST" onsubmit="return comparePassword()">
			<h1>Edit Details</h1>
			<p style="font-size:18px">Please fill this to edit your current details</p><br>
			<hr>
			<br>
				<b>Enter new Email</b><br>
				<input type="email" id="e-emailAdd" name="e-emailAdd" style="width:450px" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" placeholder="Enter new Company email" required><br><br>

				<b>Enter new Password</b><br>
				<input type="Password" id="epwd" name="epwd" style="width: 450px" placeholder="Enter Password" required><br><br>
				
				<b>Re-enter password</b><br>
				<input type="Password" id="erpwd" name="erpwd" style="width: 450px" placeholder="Re-enter Password" required><br><br>

				<b>Enter new Mobile Number</b><br>
				<input type="text" id="emobile" name="emobile" style="width:450px" pattern="[0-9]{10}" placeholder="Enter Contact Number" required><br><br>

				<b>Bio</b><br>
				<textarea style="background-color: lightgray; width: 450px; height: 100px; padding: 15px; margin: 5px 0 22px 0;" id="bio" name="bio" placeholder="About Company" required></textarea>" <br><br>

				<input class="subButton" type="submit" id="btn1" name="btn1" value="Confirm">
				<input class="rst-btn" type="reset" id="btn2" name="btn2" value="Reset">
			</form>
		</div>

		<hr><br>
		<p><img src="../Images/order.png" height="30" width="30">		<a href="https://courseweb.sliit.lk/">View Customer Orders</a></p><br>
		<hr><br>
		<img src="../Images/service.png" width="30px" height="30px">Services<br><br>

		<div align="center">
			<p><img src="../Images/message.png" width="20px" height="20px">		<a href="https://courseweb.sliit.lk/">Messages</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<img src="../Images/calendar.png" width="20px" height="20px">		<a href="https://courseweb.sliit.lk/">Calendar</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<img src="../Images/help.jpg" width="20px" height="20px">		<a href="https://courseweb.sliit.lk/">Help</a></p>
		</div>
		</b>
	</div>
	</div>
	<br>
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
