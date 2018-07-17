<?php require '../includes/signup_process.php'; 
 include 'top.php';
?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
	  <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
        <form method="post" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="uemail" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" name="upass" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" name="cpass" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <button name="btnSignup" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="signin">Login Page</a>
          <a class="d-block small" href="forgot-password">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <?php
   include 'bottom.php';
?>