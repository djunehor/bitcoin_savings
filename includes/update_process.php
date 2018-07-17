<?php
$page_name="Update Profile";
$page_id="account-details";
require "header.php";
if(isset($_POST['btnProfile'])) //if confirm button clicked
{
$ubtc = filter_input(INPUT_POST,'ubtc',FILTER_SANITIZE_STRING);
$oaddress = filter_input(INPUT_POST,'oaddress',FILTER_SANITIZE_STRING);
$raddress = filter_input(INPUT_POST,'raddress',FILTER_SANITIZE_STRING);
$occupation = filter_input(INPUT_POST,'occupation',FILTER_SANITIZE_STRING);
$dob = strtotime(strtolower(filter_input(INPUT_POST,'dob',FILTER_SANITIZE_STRING)));
$uphone = filter_input(INPUT_POST,'uphone',FILTER_SANITIZE_STRING);
$fullname = filter_input(INPUT_POST,'fullname',FILTER_SANITIZE_STRING);
$mytime = time();
if(!is_numeric($uphone))
{
	$err = "Only numbers allowed for phone number!";
}
else
{
if(isset($_FILES['file1']) && isset($_FILES['file2']))
{
	$uploaddir = "../uploads/";
$uploadfile1 = $uploaddir . basename($_FILES['file1']['name']);
$uploadfile2 = $uploaddir . basename($_FILES['file2']['name']);
$imageFileType = pathinfo($uploadfile1,PATHINFO_EXTENSION);
$imageFileType2 = pathinfo($uploadfile2,PATHINFO_EXTENSION);
 
$s = move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile1);
$t = move_uploaded_file($_FILES['file2']['tmp_name'], $uploadfile2);
}
else
{
$uploadfile1 = $_POST['file1'];	
$uploadfile2 = $_POST['file2'];	
}
//update payment status, available balance, confirmation time, total sent
$user_update = mysqli_query($con,"UPDATE $user_table SET full_name='$fullname',wallet='$ubtc',phone='$uphone',dob='$dob',occupation='$occupation',oaddress='$oaddress',raddress='$raddress',photo='$uploadfile1',idcard='$uploadfile2' WHERE user_id='$user_id'") or die('Update Error: '.mysqli_error($con)); //set downline pstatus as CONFIRMED
$result="Account Successfully Updated! Refreshing...<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"2;URL=".$page_id."\">";
}
}
?>