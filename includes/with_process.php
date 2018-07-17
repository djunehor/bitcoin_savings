<?php
$page_name = "Withdraw Fund";
require 'header.php';
if(isset($_POST['btnWith']))
{
$amount = $_POST['uamount'];
	if(empty($amount) || !is_numeric($amount))
	{
$err = "Enter a valid amount!";
	}
	elseif($amount>$user['balance'])
	{
$err = "Amount greater than available balance!";
	}
	else
	{
		$time=time();
$with = mysqli_query($con,"insert into $withdraw_table(amount,user_id,add_time) values('$amount','$user_id','$time')");
$result = "Withdrawal request has been submitted. Your wallet will be credited soon.";
	}
}
?>