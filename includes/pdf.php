<?php
require_once 'config.php';
$user_id = $_GET['id'];
$type = $_GET['type'];
if($type==1)
{
$deposit = mysqli_query($con,"select * from $deposit_table where user_id='$user_id' order by add_time desc");
$n = mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='$user_id'"));
echo '
<html>
<body style="text-align:center;">
<h1>'.$option['website_name'].'</h1>
<h2>Deposit History</h2>
<h3>'.$n['full_name'].'</h3>
<h4>'.$n['email'].'</h4>
<table width="100%" border="1" cellpadding="5" cellspacing="5">
<thead>
<tr>
<td>Amount (BTC)</td>
<td>Date</td>
<td>ToGet (BTC)</td>
<td>Expiry Date</td>
<td>Status</td>
</tr>
</thead><tbody>';
		while($posts = mysqli_fetch_assoc($deposit))
				{
				echo '<tr>
<td>'.number_format($posts['amount'],8).'</td>
<td>'.date('d M Y g:i a',$posts['add_time']).'</td>
<td>'.number_format($posts['toget'],8).'</td>
<td>'.date('d M Y g:i a',$posts['expiry']).'</td><td>';
if($posts['status']==0) {echo "Active";} elseif($posts['status']==1) {echo "Expired";} elseif($posts['status']==2) {echo "Used to Pay Debt";};
echo '</td></tr>';
				} 
echo  '</tbody></table><br><hr><p>Reported Generated on '.date('d M Y, g:i a',time()).'</p></body></html>';
}
elseif($type==2)
{
$deposit = mysqli_query($con,"select * from $withdraw_table where user_id='$user_id' order by add_time desc");
$n = mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='$user_id'"));
echo '
<html>
<body style="text-align:center;">
<h1>'.$option['website_name'].'</h1>
<h2>Withdraw History</h2>
<h3>'.$n['full_name'].'</h3>
<h4>'.$n['email'].'</h4>
<table width="100%" border="1" cellpadding="5" cellspacing="5">
<thead>
<tr>
<td>Amount (BTC)</td>
<td>Date</td>
<td>Status</td>
</tr>
</thead><tbody>';
		while($posts = mysqli_fetch_assoc($deposit))
				{
				echo '<tr>
<td>'.number_format($posts['amount'],8).'</td>
<td>'.date('d M Y g:i a',$posts['add_time']).'</td>
<td>'.date('d M Y g:i a',$posts['expiry']).'</td><td>';
if($uw['status']==0){echo "Processing";} elseif($uw['status']==1){echo "Paid";};
echo '</td></tr>';
				} 
echo  '</tbody></table><br><hr><p>Reported Generated on '.date('d M Y, g:i a',time()).'</p></body></html>';
}
elseif($type==3)
{
$deposit = mysqli_query($con,"select * from $loan_table where user_id='$user_id' order by add_time desc");
$n = mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='$user_id'"));
echo '
<html>
<body style="text-align:center;">
<h1>'.$option['website_name'].'</h1>
<h2>Loan History</h2>
<h3>'.$n['full_name'].'</h3>
<h4>'.$n['email'].'</h4>
<table width="100%" border="1" cellpadding="5" cellspacing="5">
<thead>
<tr>
<td>Amount (BTC)</td>
<td>Date</td>
<td>To Pay (BTC)</td>
<td>Status</td>
</tr>
</thead><tbody>';
		while($posts = mysqli_fetch_assoc($deposit))
				{
				echo '<tr>
<td>'.number_format($posts['amount'],8).'</td>
<td>'.date('d M Y g:i a',$posts['add_time']).'</td>
<td>'.number_format($posts['topay'],8).'</td><td>';
if($posts['status']==0){echo "Not Approved Yet";} elseif($posts['status']==3){echo "Rejected";}elseif($posts['status']==1){echo "Debt Remains";} elseif($posts['status']==2){echo "Debt Paid";}
echo '</td></tr>';
				} 
echo  '</tbody></table><br><hr><p>Reported Generated on '.date('d M Y, g:i a',time()).'</p></body></html>';
}
?>