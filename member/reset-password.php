<?php
include '../includes/reset_process.php';
 include 'top.php';
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
		<?php
				if(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				elseif(isset($output)) { echo '<div class="alert alert-success">'.$output.'</div>'; }
			elseif(isset($result)) {	
				?>
        <form action="reset-password" method="post">
          <div class="form-group">
            <input class="form-control" type="email" name="uemail" value="<?php echo $result; ?>" readonly>
          </div>
		  <div class="form-group">
            <input class="form-control" name="upass" type="password" placeholder="Enter password">
          </div>
		  <div class="form-group">
            <input class="form-control" name="cpass" type="password" placeholder="Re-enter password">
          </div>
          <button class="btn btn-primary btn-block" name="btnChange">Change Password</button>
        </form>
			<?php } ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="signup">Register an Account</a>
          <a class="d-block small" href="signin">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'bottom.php';
?>
