<?php
$page_name="Support";
require('header.php');
$err = null;
$res = null;
if(isset($_POST['Submit_open']))
{
$topic= filter_input(INPUT_POST,'topic',FILTER_SANITIZE_STRING); //username
$detail = filter_input(INPUT_POST,'detail',FILTER_SANITIZE_STRING); //email
$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING); //phone
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING); //referrer

$datetime=time(); //create date time
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
 
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile))
{
echo "";
}
else {
$uploadfile = "";
}

$sql=mysqli_query($con,"INSERT INTO $tbl_name(topic, detail, name, email, datetime,screenshot)VALUES('$topic', '$detail', '$name', '$email', '$datetime','$uploadfile')");

if($sql){
$res = "<div class=\"alert alert-success alert-dismissible\">Successful<BR><a href=supportdetail>View your ticket</a></div>";
}
else {
$err = "<div class=\"alert alert-danger alert-dismissible\">".mysql_error($con)."</div>";
}
}
?>
<div id="page-wrapper">

<?php if ($err!=null) { echo $err; } else if ($res!=null) { echo $res; } ?>
<form method="post" action="">
<table class="table table-bordered table-striped">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong>Open New Ticket</strong> </td>
</tr>
<tr>
<td><strong>Topic: </strong></td>
<td><input type="text" name="topic">	</td>
<td valign="top">:</td></tr>
<tr>
<td><strong>Message: </strong></td>
<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
</tr>
<tr>
<td><strong>Screenshot</strong></td>
    <td>                    <input  type="file" name="fileToUpload" id="fileToUpload"></td>
                   
</tr>
<input class="form-control" name="name" type="hidden" id="name" value="<?php echo $user["username"]; ?>" />
<input class="form-control" name="email" value="<?php echo $user["email"]?>" type="hidden" />
<tr>
<td><input type="submit" class="btn btn-success" name="Submit_open" value="Submit" /> <input type="reset" class="btn btn-danger" name="Submit2" value="Reset" /></td>
</tr>
</table>
</td>
</form>    
</div>
 <?php

include "footer.php";
?>
