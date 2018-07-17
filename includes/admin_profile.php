<?php
$page_name = "Edit Login";
require 'header.php';
if(isset($_POST['profile_update']))
{
$u = filter_input(INPUT_POST,'un',FILTER_SANITIZE_STRING);
$p1 = filter_input(INPUT_POST,'p1',FILTER_SANITIZE_STRING);
$p2 = filter_input(INPUT_POST,'p2',FILTER_SANITIZE_STRING);
if(strlen($p1)<8)
{
	$err = "Password must be greater than 8 characters";
}
elseif(strlen($u)<8)
{
	$err = "Username must be greater than 8 characters";
}
else
{
$p = md5($p1);
$change = mysqli_query($con,"update $admin_table set username and password='$p' where id='".$_SESSION['aid']."'");
$result = 'Username and password has been updated! Redirecting to login page. <script>window.setTimeout(function(){ window.location = "signin"; },5000)</script>';
}
}
?>