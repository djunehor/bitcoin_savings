<?
$result=null;
$page_name="Change Picture";
$page_id="profile-picture";
require('header.php');
?>    
<div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h3><a class="page-header" href="index">Dashboard</a> / <a href="<?php echo $page_id; ?>" class="page-header"><?php echo $page_name; ?></a></h3>
                </div>
                <!--End Page Header -->
            </div>
<?php
if(isset($_POST['avatar_submit'])) //if confirm button clicked
{
            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

           
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                        $valid = false;
                        $result = 'Invalid file extension.';
                    }
                    //validate file size
                    if ( $size/512/512 > 2 ) {
                        $valid = false;
                        $result = 'File size is exceeding maximum allowed size.';
                    }
                    //upload file
                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. '../uploads' . DIRECTORY_SEPARATOR. $name;
                        move_uploaded_file($tmpName,$targetPath);
						
$qb = mysqli_query($con,"UPDATE $user_table SET avatar='uploads/$name' WHERE username='$username'") or die(mysqli_error($con));
$result = 'Profile Picture Updated Successful...<META HTTP-EQUIV="REFRESH" CONTENT="1;URL="'.$page_id.'">';
}
			}
}
?>
  <?php if($result!=null) {echo '<div class="alert alert-success alert-dismissible">'.$result.'</div>';} ?>
<form action="" method="post" enctype="multipart/form-data">
		
<table class="ui striped celled table customtable feedbacktable">
							<tbody>

<tr>
<td align="left">Upload Avatar </td>
<td align="center" width="50">:</td>
<td><input type="file" class="file"  name="file">
                    <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 256 KB is allowed.</p></td>
</tr>

<tr>
					<td colspan="3" style="text-align:center;">
										<button type="submit" name="avatar_submit" class="btn btn-info"><i class="edit icon"></i>Change Avatar
									</td>
								</tr>
</tbody></table>


		</form>
 </div>           

<?include "foot.php";?>