<?php
$page_name="Edit Page";
require 'header.php';
$cid=$_POST['t'];
$page = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM $con_table where cid='$cid'"));
if(isset($_POST['btnEdit']))
{
$cid = filter_input(INPUT_POST,'cid',FILTER_SANITIZE_STRING);	
$title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);	
$content = htmlentities(htmlspecialchars($_POST['content']));

$edit = mysqli_query($con,"update $con_table set title='$title',content='$content' where cid='$cid'");
$result = "Content has been modified successfully!";
}
?>
