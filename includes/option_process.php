<?php
$page_name = "Website Settings";
require 'header.php';
if(isset($_POST['btnOption']))
{
$website_name = filter_input(INPUT_POST,'website_name',FILTER_SANITIZE_STRING);
$admin_wallet = filter_input(INPUT_POST,'admin_wallet',FILTER_SANITIZE_STRING);
$website_notice = htmlentities(htmlspecialchars($_POST['website_notice']));;
$loan_fee = filter_input(INPUT_POST,'loan_processing_fee',FILTER_SANITIZE_STRING);
$minimum_loan = filter_input(INPUT_POST,'minimum_loan',FILTER_SANITIZE_STRING);
$maximum_loan = filter_input(INPUT_POST,'maximum_loan',FILTER_SANITIZE_STRING);
$rate1 = filter_input(INPUT_POST,'rate1',FILTER_SANITIZE_STRING);
$rate2 = filter_input(INPUT_POST,'rate2',FILTER_SANITIZE_STRING);
$rate3 = filter_input(INPUT_POST,'rate3',FILTER_SANITIZE_STRING);
$rate4 = filter_input(INPUT_POST,'rate4',FILTER_SANITIZE_STRING);
$rate5 = filter_input(INPUT_POST,'rate5',FILTER_SANITIZE_STRING);
$rate6 = filter_input(INPUT_POST,'rate6',FILTER_SANITIZE_STRING);
$time=time();
if(!is_numeric($loan_fee) || !is_numeric($minimum_loan) || !is_numeric($maximum_loan) || !is_numeric($rate1) || !is_numeric($rate2) || !is_numeric($rate3) || !is_numeric($rate4) || !is_numeric($rate5) || !is_numeric($rate6))
{
	$err="Enter Valid number!";
	}
	else
	{
$update=mysqli_query($con,"UPDATE $option_table SET website_name='$website_name',admin_wallet='$admin_wallet',website_notice='$website_notice',loan_processing_fee='$loan_fee',minimum_loan='$minimum_loan',maximum_loan='$maximum_loan',rate1='$rate1',rate2='$rate2',rate3='$rate3',rate4='$rate4',rate5='$rate5',rate6='$rate6',update_time='$time'") or die(mysqli_error($con));
$result = "Options have been saved.";
}
}
?>