<?php
include '../includes/r_process.php';
 include 'top.php';
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
		 <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
        <form action="" method="post">
          <div class="form-group">
            <input class="form-control" name="uemail" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
          </div>
          <button class="btn btn-primary btn-block" name="btnReset">Reset Password</button>
        </form>
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