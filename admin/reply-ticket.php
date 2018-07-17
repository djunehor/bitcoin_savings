<?php
$page_name = "Reply Ticket";
$page_id = "reply-ticket";

require 'header.php';
if(isset($_POST['reply']))
{
$tbl_name="fanswer";
// Get value of id that sent from hidden field 
$id=$_POST['id'];

// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
$a_answer = filter_input(INPUT_POST,'a_answer',FILTER_SANITIZE_STRING);

$datetime=time(); // create date and time

// Insert answer 
$sql2="INSERT INTO $tbl_name(question_id, a_id, a_name, a_answer, a_datetime)VALUES('$id', '$Max_id', 'Admin', '$a_answer', '$datetime')";
$result2=mysqli_query($con,$sql2) or die("Reply: ".mysqli_error($con));

if($result2)
{
echo '<div class="alert alert-success">Response sent!</div>';

// If added new answer, add value +1 in reply column 
$tbl_name2="fquestions";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
$result3=mysqli_query($con,$sql3);
}
else 
{
echo '<div class="alert alert-danger">'.mysqli_error($con).'</div>';
}
}
$tbl_name="fquestions";
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);
?>
<title>View Ticket - <?php echo $_GLOBAL['website_name']; ?></title>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Email :</strong> <?php echo $rows['email']; ?></td>
</tr>
<?php if(isset($rows['screenshot']))
{
	?>
<tr>
<td bgcolor="#F8F7F1"><strong>Photo :</strong> <a target="_blank" href="<?php echo $rows['screenshot']; ?>">View Image</a></td>
</tr>
<?php } ?>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo date('M j Y, g:i a',$rows['datetime']); ?></td>
</tr>
<?php
if ($rows['topic']=="Report a user") { 
?>
<tr>
<td bgcolor="#F8F7F1"><a href="<?php echo $_GLOBAL['base_url']."/".$rows['screenshot']; ?>" target="_blank">View Proof</a></td>
</tr>
<?php } ?>
</table></td>
</tr>
</table>
<BR>

<?php

$tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($con,$sql2);
while($rows=mysqli_fetch_array($result2)){
?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Answer</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo date('M j Y, g:i a',$rows['a_datetime']); ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($con,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($con,$sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($con,$sql5);
?>

<BR>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" class="form-control" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" name="reply" class="btn btn-success" value="Submit"> <input type="reset" name="Submit2" class="btn btn-danger" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<?php include 'footer.php'; ?>