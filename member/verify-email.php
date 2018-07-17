<?php require '../includes/verify_process.php';
include 'top.php';
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Email Verification</div>
      <div class="card-body">
	    <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
        <div class="text-center">
          <a class="d-block small mt-3" href="signup">Register an Account</a>
          <a class="d-block small" href="signin">Sign In?</a>
        </div>
      </div>
    </div>
  </div>
<?php
 include 'bottom.php';
?>