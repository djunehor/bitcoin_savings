<?php
$page_name = "Open Tickets";
$page_id = "view-tickets";
require 'header.php';
// OREDER BY id DESC is order result by descending
if(isset($_POST['close_submit'])){
$tb = $_POST['oid'];
 $our = mysqli_query($con,"DELETE FROM $tbl_name where id='$tb'");  //update current user time left
	echo '<div class="alert alert-successe">Delete Successful</div>';
}
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_name; ?></div>
        <div class="card-body">
          <div class="table-responsive">
             <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="5%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Full Name</strong></td>
<td width="43%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="5%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="10%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="14%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
<td width="10%" align="center" bgcolor="#E6E6E6"><strong>Action</strong></td>
</tr>

<?php
// How many adjacent pages should be shown on each side?
	$adjacents =3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$wweck = mysqli_query($con,"SELECT * FROM $tbl_name ORDER BY datetime ASC");  //update current user time left
	$total_pages=mysqli_num_rows($wweck);
	
	/* Setup vars for query. */
	$targetpage = $page_id; 	//your file name  (the name of this file)
	$limit = 20; 								//how many items to show per page
	$page = isset($_GET['page']) ? $_GET['page'] : 0;
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$result = mysqli_query($con,"SELECT * FROM $tbl_name ORDER BY datetime ASC LIMIT $start, $limit");
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">< previous</a>";
		else
			$pagination.= "<span class=\"disabled\">< previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next ></a>";
		else
			$pagination.= "<span class=\"disabled\">next ></span>";
		$pagination.= "</div>\n";		
	}
?>
 <!--new content starts here -->
	   <div class="page-header">
        <h4><b><?php echo "Showing page ".$page." (".$total_pages." total results)"; ?></b></h4>
      </div>
	<?php
// Start looping table row
while($rows = mysqli_fetch_array($result)){
?>
<tr>
<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['name']; ?></td>
<td bgcolor="#FFFFFF"><a target="_blank" href="reply-ticket?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo date('M j Y, g:i a',$rows['datetime']); ?></td>
<td colspan="5" align="right" bgcolor="#E6E6E6"><form action="" method="post"><input type="hidden" name="oid" value="<?php echo $rows['id']; ?>"><button type="submit" name="close_submit" class="btn btn-success">Close Ticket</button>
                </form> </td></tr><?php } 
// Exit looping and close connection 
?>
</table>
          </div>
        </div>
       
      </div>
  <?php
echo $pagination; ?>
<link href="css/pagination.css" rel='stylesheet' type='text/css' />
<?php require 'footer.php'; ?>