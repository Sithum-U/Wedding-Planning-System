<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	
	//if (!isset($_SESSION['user_id'])) {
	//	header('Location: index.php');
	///}//

	$user_list = '';


	$query = "SELECT * FROM message  ORDER BY id DESC";
	$prod = mysqli_query($connection, $query);

	verify_query($prod);

     


	while ($pro = mysqli_fetch_assoc($prod)) {
		$user_list .= "<tr>";
		$user_list .= "<td> <img src='../contact/images/".$pro['attachment']."' width =100px height =100px></td>";
        $user_list .= "<td>{$pro['subjects']}</td>";
		$user_list .= "<td>{$pro['email']}</td>";
		$user_list .= "<td>{$pro['message']}</td>";
		$user_list .= "</tr>";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/dd825e3818.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		
	</header>

	<main>
         <main><a href="admin.php"> <i class="fas fa-backward"></i></a>
		<h1>Message</h1>

		<table class="masterlist">
			<tr>
                <th>photos</th>
				<th>subject</th>
				<th>Email</th>
				<th>Message</th>
				
			</tr>

			<?php echo $user_list; ?>

		</table>
		
		
	</main>
</body>
</html>