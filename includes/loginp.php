<?php
$page_name="Admin Login";
include '../includes/config.php';
$err = null;
if(isset($_POST['submit_login']))
{ 
$email = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST,'upassword',FILTER_SANITIZE_STRING);
$q = mysqli_query($con,"SELECT * FROM $admin_table WHERE username='$email'");
		if(mysqli_num_rows($q)>0)
		{ //Checking Email from the Database
		$pword = md5($password);
		$u = mysqli_query($con,"SELECT * FROM $admin_table WHERE username='$email' AND password='$pword'");
			if(mysqli_num_rows($u)>0)
			{ //Matching Email and Password from the Database
		session_regenerate_id(true);
       session_start();
       $mdata = mysqli_fetch_assoc($u);
       $_SESSION['aid'] = $mdata['aid'];
	$_SESSION['admin_name'] = $mdata['username'];
	   //upline code ends here
	   $mid = $_SESSION['aid'];
$ulast_login = time();
$updlogin = mysqli_query($con,"UPDATE $admin_table SET last_login='$ulast_login' where aid='$mid'");
 header("Location: index");

			}
			else
			{
			$err = "Username and Password doesn't match";
			}
 }
 else{
  $err = "Username and Password doesn't match";
 }

}
?>