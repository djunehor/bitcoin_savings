<?php
$z = mysqli_query($con,"select * $deposit_table where status=0 and expiry<'now()'");
while($x = mysqli_fetch_assoc($z))
{
$toget = $x['toget'];
$uid = $x['user_id'];
$did = $x['did'];
$get = mysqli_query($con,"update $user_table set balance=balance+'$toget' where user_id='$uid'");
$get2 = mysqli_query($con,"update $deposit_table set status=1 where did='$did'");
}
?>