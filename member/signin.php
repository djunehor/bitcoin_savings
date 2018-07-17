<?php require '../includes/login_process.php';
 include 'top.php';
?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
	    <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
        <form method="post" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="uemail" type="email" aria-describedby="emailHelp" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="upass" type="password" placeholder="Password">
          </div>
          <button class="btn btn-primary btn-block" name="btnLogin">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="signup">Register an Account</a>
          <a class="d-block small" href="forgot-password">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <?php
 include 'bottom.php';
?>