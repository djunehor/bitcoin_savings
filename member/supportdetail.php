<?php
$page_name="Support Tickets";
require('header.php');
?>
<div id="page-wrapper">
  <a href="open-ticket">Open Ticket</a>                          
<div class="table-responsive">
<table class="table table-bordered table-striped">
<tr>
<th width="32">#</th>
<th>Topic</th>
<th>Details</th>
<th>Date</th>
<th>Reply</th>
<th></th>
</tr>
<?php
$email=$user["email"];
$tabla = mysqli_query($con,"SELECT * FROM $tbl_name where email='$email' ORDER BY id ASC limit 0,50"); 
while ($registro = mysqli_fetch_array($tabla)) { 
echo "
<tr class=\"even\">
<td>".  $registro["id"]."</td>
<td>". $registro["topic"] ."</td>
<td>". $registro["detail"] ."</td>
<td>". date('M j Y, g:i a',$registro['datetime']) ."</td>
<td>". $registro["reply"] ."</td>
<td><a href=\"view-ticket?id=".$registro["id"]."\">View Ticket</a></td>
</tr>";}
?>
</table>
<br><br>
</div></div>
<?php include "footer.php"; ?>