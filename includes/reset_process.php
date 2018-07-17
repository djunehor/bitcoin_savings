<?php
$page_name = "Password Reset";
require '../includes/config.php';
if(isset($_GET['code']))
{
$reset_code = $_GET['code'];
	if(mysqli_num_rows(mysqli_query($con,"select email from $user_table WHERE reset_code='$reset_code'"))==1)
	{
$o = mysqli_fetch_assoc(mysqli_query($con,"select email from $user_table WHERE reset_code='$reset_code'"));
$result = $o['email'];
	}
	else
	{
$err = "The password reset link is not valid!";
	}
}
if(isset($_POST['btnChange']))
{
$email = filter_input(INPUT_POST,'uemail',FILTER_SANITIZE_EMAIL);	
$pass = filter_input(INPUT_POST,'upass',FILTER_SANITIZE_STRING);	
$pass2 = filter_input(INPUT_POST,'cpass',FILTER_SANITIZE_STRING);	
if(strlen($pass)<8)
{
	$err = "Password must be minimum of 8 characters!";
}
elseif($pass!=$pass2)
{
	$err = "Passwords do not match!";
}
else
{
$password = md5($pass);
$pass_update = mysqli_query($con,"update $user_table set password='$password' where email='$email'");	
$output = "Password reset successful. You can login now";
}
}
	?>