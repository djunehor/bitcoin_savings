<?php
error_reporting(0); //set as E_ALL for debugging
//MySQL database parameters
$host = "localhost";
$duname = "root";//"bitcoinsavings_djunehor";
$dpword = "";//"AwC2P-I=Js}n";
$db_name = "esusu";//"bitcoinsavings_loans";
$tbl_name = "fquestions";
$user_table = "users";
$admin_table = "admins";
$withdraw_table = "withdrawals";
$option_table = "options";
$deposit_table = "deposits";
$loan_table = "loans";
$con_table = "contents";

$con = mysqli_connect($host,$duname,$dpword,$db_name) or die("Cannot connect to database");
//select all website data
$option = mysqli_fetch_assoc(mysqli_query($con,"select * from $option_table"));
date_default_timezone_set('Africa/Lagos');	
