<?php
require '../includes/admin_profile.php';
?>
 <div id="page-wrapper">
  <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a><i class="fa fa-angle-right"></i>Profile <i class="fa fa-angle-right"></i> Edit</li>
            </ol>
 		<h2 id="forms-example" class="">Profile Settings</h2>
 		<form action="" method="post">
		<div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="un" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="p1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="p2" required>
  </div>
  <button type="submit" class="btn btn-default" name="profile_update">UPDATE</button>
</form>
 	<!--//grid-->
<?php include 'footer.php'; ?>