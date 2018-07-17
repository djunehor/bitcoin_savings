<?php
$page_name = "Email Verification";
require '../includes/config.php';
$id = $_GET['a'];
$email_code = $_GET['b'];
	if(mysqli_num_rows(mysqli_query($con,"select * from users WHERE user_id='$id' and email_code='$email_code'"))==1)
	{
	$s = mysqli_query($con,"update users set email_code=null WHERE user_id='$id' and email_code='$email_code'") or die('Verification failed');
$result = 'Email Verification Successful! You can <a href="signin">Sign In</a> now';
	}
	else
	{
$result = "Email Verification failed. Try again or contact support.";
	}	
	?>