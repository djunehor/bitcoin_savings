<?php
$page_name = "View Ticket";
require('header.php');
$err = null;
$res = null;
$tbl_name2="fanswer";
$user_email = $user['email'];
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id' and email='$user_email'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);

if(isset($_POST['Submit_reply']))
{
// Get value of id that sent from hidden field 
$id=$_POST['id'];

// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name2 WHERE question_id='$id' and a_email='$user_email'";
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
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer= filter_input(INPUT_POST,'a_answer',FILTER_SANITIZE_STRING); 
$datetime=time(); // create date and time

// Insert answer 
$sql2="INSERT INTO $tbl_name2(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
$result2=mysqli_query($con,$sql2);

if($result2){
$res ="<div class=\"alert alert-success alert-dismissible\">Successful<BR><a href=supportdetail>View your ticket</a></div>";

// If added new answer, add value +1 in reply column 
$sql3="UPDATE $tbl_name SET reply='$Max_id' WHERE id='$id' and email='$user_email'";
$result3=mysqli_query($con,$sql3);
}
else {
$err =  "ERROR";
}
}
?>
<div id="page-wrapper">
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h3><a class="page-header" href="index">Dashboard</a> / <a href="<?php echo $page_id; ?>" class="page-header"><?php echo $page_name; ?></a></h3>
                </div>
                <!--End Page Header -->
            </div>
			<?php if ($err!=null) { echo $err; } else if ($res!=null) { echo $res; } ?>
<div class="table-responsive">
<table class="table table-bordered table-striped" width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1">TOPIC:<strong> <?php echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1">DETAIL: <?php echo $rows['detail']; ?></td>
</tr>
<tr>
<td align="right" bgcolor="#F8F7F1"><?php echo date('F j Y, g:i a',$rows['datetime']); ?></td>
</tr>
</table></td>
</tr>
</table>
<BR>

<?php

 // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($con,$sql2);
while($rows=mysqli_fetch_array($result2)){
?>

<table class="table table-bordered table-striped" width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
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
<td align="right" bgcolor="#F8F7F1"><?php echo date('F j Y, g:i a',$rows['a_datetime']); ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
}
$sql3="SELECT view FROM $tbl_name WHERE id='$id' and email='$user_email'";
$result3=mysqli_query($con,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id' and email='$user_email'";
$result4=mysqli_query($con,$sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($con,$sql5);
?>

<BR>
<table class="table table-bordered table-striped" width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<input name="a_name" type="hidden" value="<?php echo $user['full_name']; ?>" id="a_name">
<input name="a_email" type="hidden" id="a_email" value="<?php echo $user['email']; ?>">
<textarea name="a_answer" cols="45" rows="3" id="a_answer" placeholder="Reply here" ></textarea>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" name="Submit_reply" class="btn btn-success" value="Submit"> <input type="reset" class="btn btn-danger" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
     
        </div>   </section>
</div>
 <?php

include 'footer.php';
?>