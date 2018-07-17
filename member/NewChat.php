<?php
$page_name = "Open Chat";
include '../views/manager_header.php'; ?>
 <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="../css/starlight.css">
    <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index"><?php echo $option['website_name']; ?></a>
        <span class="breadcrumb-item active"><?php echo $page_name; ?></span>
      </nav>

      <div class="sl-pagebody">
	  <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New</h6>
       <!--  <p class="mg-b-20 mg-sm-b-30">List of your chat history.</p> -->

          <div class="table-wrapper">
		   <div class=" alert alert-danger pname_error_show" style="display:none"></div>
<?php
$tbl_name="fquestions";
$err = null;
$res = null;
if(isset($_POST['Submit_open']))
{
$topic= filter_input(INPUT_POST,'topic',FILTER_SANITIZE_STRING);
$detail= filter_input(INPUT_POST,'detail',FILTER_SANITIZE_STRING);
$name= filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

$datetime=time(); //create date time
$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
$imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
 
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile))
{
echo "";
}
else {
$uploadfile = "";
}

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime,screenshot)VALUES('$topic', '$detail', '$name', '$email', '$datetime','$uploadfile')";
$result=mysqli_query($con,$sql);

if($result){
$res = "Successful<BR><a href=supportdetail>View your ticket</a>";
}
else {
$err = mysqli_error($con);
}
}

 if($err!=null)
{
?>	   <div class="alert alert-danger">
          <?php echo $err; ?>
            </div>
			<?php } 
			else if($res!=null)
			{
			?>
			<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $res; ?>
                </div>
				<?php
			}
			?>
         <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong>Open New Ticket</strong> </td>
</tr>
<tr>
<td width="14%"><strong>Topic</strong></td>
<td width="2%">:</td>
<td width="84%"><input type="text" name="topic">	</td>
</tr>
<tr>
<td ><strong>Detail</strong></td>
<td valign="top">:</td>
<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
</tr>
<tr>
<td><strong>Photo (optional)</strong></td>
    <td>                    <input  type="file" name="fileToUpload" id="fileToUpload"></td>
<td>upload a screenshot of the comment.</td>
                   
</tr>
<input name="name" type="hidden" value="<?php echo $user['full_name']; ?>"/>
<input name="email" value="<?php echo $user['email']; ?>" type="hidden" />
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-success" name="Submit_open" value="Submit" /> <input type="reset" class="btn btn-danger" name="Submit2" value="Reset" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table>    

          </div><!-- table-wrapper -->
        </div><!-- card -->
		<script>
		function del_task(value){
	$.post("<?php echo $website_url."../"; ?>includes/ajax_check_input?value=del_task",{pid:value},function(data){
		if(data.length != 0){
			$('.pname_error_show').show();
			$('.pname_error_show').html(data);
		$('.pname_error_show').show();
		}else{
			$('.pname_error_show').hide();
			$('#btnDelete').removeAttr('disabled');
		}
	});
}
		$('#datatable1').DataTable({
responsive: true,
language: {
  searchPlaceholder: 'Search...',
  sSearch: '',
  lengthMenu: '_MENU_ items/page',
}
});</script>
 <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/starlight.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script> 
</div>

    <!-- ########## END: MAIN PANEL ########## -->
<?php include '../views/manager_footer.php'; ?>