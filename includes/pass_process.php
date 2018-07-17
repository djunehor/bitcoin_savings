<?php
$page_name="Change Password";
require '../includes/config.php';
if (isset($_POST['btnPass']))
{
$userid=filter_input(INPUT_POST,'userid',FILTER_SANITIZE_STRING);
$pass=filter_input(INPUT_POST,'upass',FILTER_SANITIZE_STRING);
$passc=filter_input(INPUT_POST,'cpass',FILTER_SANITIZE_STRING);
$password = md5($pass);

if(strlen($pass) < 8)
{
$err = "Password min 8 characters.";
}
elseif($pass!=$passc)
{ 
$err = "New Passwords don't match!";
}
else
{
$b = mysqli_query($con,"UPDATE $user_table SET password='$password' WHERE user_id='$userid'") or die("Reset Error: ".mysqli_error($con));
$result = "Change Password Successful";
}
}

?>