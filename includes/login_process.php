<?php
require_once '../includes/config.php';
$page_name = "Sign-In";
if(isset($_POST['btnLogin']))
{ 
$uemail = filter_input(INPUT_POST,'uemail',FILTER_SANITIZE_EMAIL);
$pasword = filter_input(INPUT_POST,'upass',FILTER_SANITIZE_STRING);
$pword = md5($pasword);
if(!isset($uemail) || !isset($pasword))
{
	$err="All fields are required!";
}
elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email='$uemail' AND password='$pword'"))!=1)
{
	$err="Email and password does not match!";
}
elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email='$uemail' AND password='$pword' AND email_code is not null"))>0)
{
	$err="Email has not been verified! Please click the activation link sent to your email address.";
}
else
{
$u = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE email='$uemail' AND password='$pword'")) or die('Select Error: '.mysqli_error($con));
 session_regenerate_id(true);
       session_start();
       $_SESSION['user_id'] = $u['user_id'];
$last_login = time();
$update_login = mysqli_query($con,"UPDATE users SET last_login='$last_login' where user_id='".$_SESSION['user_id']."'") or die('Update failed:'.mysqli_error($con));
header("Location: index");
 exit();
}
}
?>