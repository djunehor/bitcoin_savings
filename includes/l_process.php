<?php
$page_name = "Pending Loans";
require 'header.php';
if(isset($_POST['btnLoan']))
{
$uid = $_POST['uid'];
$lid = $_POST['lid'];
$amount = $_POST['lamount'];
$a = mysqli_query($con,"update $loan_table set status=1 where lid='$lid'");
$b = mysqli_query($con,"update $user_table set debt=debt+'$amount' where user_id='$uid'");
echo '<div class="alert alert-success">Loan has been marked as paid</div>';
}
elseif(isset($_POST['DelLoan']))
{
$lid = $_POST['lid'];
$a = mysqli_query($con,"delete from $loan_table where lid='$lid'");
echo '<div class="alert alert-success">Loan request has been deleted</div>';
}
elseif(isset($_POST['CancelLoan']))
{
$lid = $_POST['lid'];
$a = mysqli_query($con,"update $loan_table set status=3 where lid='$lid'");
echo '<div class="alert alert-success">Loan request has been canceled</div>';
}
?>