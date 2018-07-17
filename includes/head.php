<?php
require '../includes/config.php';
session_start();
//if website has been set to maintenance mode
if(isset($_SESSION['user_id']))
{
$user_id =  $_SESSION['user_id'];
//select all user data
$user=mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='$user_id'")) or die("User data: ".mysqli_error($con)."");
if($user['status']==0 && $_SERVER['REQUEST_URI']!='/member/open-ticket')
{
header ("Location: open-ticket");
exit();	
}	
$w=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as wsum FROM $withdraw_table where user_id='$user_id' and status=1")) or die("Withdraw data: ".mysqli_error($con)."");  
$d=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as dsum FROM $deposit_table where user_id='$user_id'")) or die("Deposit data: ".mysqli_error($con)."");  
	$z = mysqli_query($con,"select * $deposit_table where status=0 and expiry<'now()' and user_id='$user_id'");
	while($x = mysqli_fetch_assoc($z))
	{
	$toget = $x['toget'];
	$uid = $x['user_id'];
	$did = $x['did'];
	$get = mysqli_query($con,"update $user_table set balance=balance+'$toget' where user_id='$uid'");
	$get2 = mysqli_query($con,"update $deposit_table set status=1 where did='$did'");
	}
}
else
{
header("Location: signin");
exit();
}
