<?php
require 'includes/config.php';
for($i=0;$i<100;$i++)
{
$dep = '0.0'.rand(000,555).rand(000,999);
$a = rand(111,999);
$toget = $dep + 0.0000456;
$f = time();
$time = $f+$a;
$e = mysqli_query($con,"INSERT INTO $deposit_table(user_id,amount,toget,add_time,expiry) VALUES(2,'$dep','$toget','$f','$time')") or die("Error: ".mysqli_error($con));
}
var_dump($e);
?>