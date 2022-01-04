
<?php include_once 'Config.php'; ?>

<?php 
$company_name =$_POST['cname'];
$category =$_POST['bcategory'];
$email =$_POST['emailAdd'];
$password =$_POST['pwd'];
$phone=$_POST['mobile'];
$location = $_POST['blocation'];
$bio =$_POST['bio'];

$errors=array();
//checking email address
/*if(!is_email($_POST['emailAdd'])){
	$errors[] ='Email address is invalid!';
}*/

$query ="SELECT * FROM customer where Email='{$email}' LIMIT 1";
$result_set = mysqli_query($conn,$query);

if($result_set){
	if(mysqli_num_rows($result_set)==1){
		$errors[] = 'Email address already exist!';
	}
}



$sql = "INSERT INTO users(CompanyID,CompanyName,Category,Email,Password,MobileNo,Location,Bio) VALUES('','$company_name','$category','$email','$password','$phone','$location','$bio')";

if(mysqli_query($conn,$sql)){
    echo "<script type='text/javascript'>alert('Registed Sucessfully!')</script>"; 
    header("Location:VendorProfile.html");

}
else{
    echo "<script type='text/javascript'>alert('Registration Failed!'); window.location.href='VendorRegistrationForm.html';</script>";
}

mysqli_close($conn);

?>