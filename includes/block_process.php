<?php
$page_name = "Block User";
require 'header.php';
if(isset($_POST['btnBlock']))
{
$uid = $_POST['uemail'];
if(empty($uid) || filter_var($uid,FILTER_VALIDATE_EMAIL)===false){
$err = 'Enter a valid Email';
}
elseif(mysqli_num_rows(mysqli_query($con,"select * from $user_table where email='$uid'"))!=1)
{
$err ="User not found";	
}
elseif(mysqli_num_rows(mysqli_query($con,"select * from $user_table where email='$uid' and status=0"))==1)
{
$err ="User already blocked!";	
}
else
{
$block = mysqli_query($con,"update $user_table set status=0 where email='$uid'");
$result = "User has been blocked!";
}
}
?>