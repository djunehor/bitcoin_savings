<?php
$page_name="New Deposit";
$page_id="deposit";
require "header.php";
if(isset($_POST['btnDeposit']))
{
    unset($_SESSION['uwallet']);
unset($_SESSION['uhash']);
$_SESSION['uwallet'] = $user['wallet'];	
$_SESSION['expiry'] = filter_input(INPUT_POST,'uexp',FILTER_SANITIZE_STRING);	
$_SESSION['uhash'] = filter_input(INPUT_POST,'uhash',FILTER_SANITIZE_STRING);
$result = "Transaction hash has been saved. Please wait for page to reload...<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=".$page_id."\">";
}

elseif(isset($_SESSION['uwallet']) && isset($_SESSION['uhash']))
{
$url = "https://blockchain.info/q/txresult/".$_SESSION['uhash']."/".$option['admin_wallet']."?format=json";
$json = file_get_contents($url);
$output = json_decode($json, TRUE); //result in satoshi
//$output = 122873;
	if(isset($output))
	{
		$amount = $output/100000000; //result in bitcoin
		$time = time();
		$next = $time+($_SESSION['expiry']*86400);
		$toget = $amount+($amount*($_SESSION['expiry']/100));
		$status=0;
		$rdebt = $amount-$user['debt'];
		if($rdebt>0) //amount greater than debt
{
	$amount = $rdebt;
	$status = 0;
	$toget = $amount+($amount*($_SESSION['expiry']/100));
	$adt = mysqli_query($con,"update $user_table set debt=0 where user_id='$user_id'");
	$adt2 = mysqli_query($con,"update $loan_table set status=2,topay=0 where user_id='$user_id'");
		$result .= "Debt of ".number_format($user['debt'],8)." BTC has been deducted. ";
}
		elseif($rdebt<0) //debt greater than amount
{
	$debt = abs($rdebt);
	$toget = 0;
	$status = 2;	
$adt = mysqli_query($con,"update $user_table set debt='$debt' where user_id='$user_id'");
$adt2 = mysqli_query($con,"update $loan_table set topay='$debt' where user_id='$user_id'");
	$result .= "Debt of ".number_format($amount,8)." BTC has been deducted. ";
}
$c = mysqli_query($con,"insert into $deposit_table (user_id,amount,add_time,expiry,toget,status) values('$user_id','$amount','$time','$next','$toget','$status')") or die("Deposit Error: ".mysqli_error($con));	
$result .=  "Payment of ".($output/100000000)." BTC has been received. ".$amount." BTC saved.";
		unset($_SESSION['uwallet']);
unset($_SESSION['uhash']);
	}
	else
	{
		$err = "Transaction has not been verified. Please wait for page to reload...<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=".$page_id."\">";

	}
}
 ?> 