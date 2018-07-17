<?php
$page_name="Loan Application";
$page_id="new-loan";
require "header.php";
if(isset($_POST['btnLoan'])) //if confirm button clicked
{
$amount = filter_input(INPUT_POST,'uamount',FILTER_SANITIZE_STRING);
$rate = filter_input(INPUT_POST,'urate',FILTER_SANITIZE_STRING);
$hash = filter_input(INPUT_POST,'uhash',FILTER_SANITIZE_STRING);
$mytime = time();
if(!is_numeric($amount))
{
	$err = "Only numbers allowed for amount!";
}
elseif($amount>$option['maximum_loan'])
{
	$err = "Amount greater than maximum loan request of ".$option['maximum_loan']." BTC!";
}
elseif($amount<$option['minimum_loan'])
{
	$err = "Amount less than minimum loan request of ".$option['minimum_loan']." BTC!";
}
elseif(mysqli_num_rows(mysqli_query($con,"select * from $loan_table where user_id='$user_id' and status<2")))
{
	$err = "You have an outstanding loan!";
}
else
{
$topay = $amount+($amount*($rate/100));
if(isset($_FILES['file1']))
{
$uploaddir = "../uploads/";
$uploadfile1 = $uploaddir . basename($_FILES['file1']['name']);
$imageFileType = pathinfo($uploadfile1,PATHINFO_EXTENSION);
 
$s = move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile1);
}
//update payment status, available balance, confirmation time, total sent
$new_loan = mysqli_query($con,"insert into $loan_table(amount,add_time,topay,proof,hash,user_id) values('$amount','$mytime','$topay','$uploadfile1','$hash','$user_id')") or die('Insert Error: '.mysqli_error($con)); //set downline pstatus as CONFIRMED
$result="Loan Application Submitted! Your wallet will be credited when the loan is approved.";
}
}
?>