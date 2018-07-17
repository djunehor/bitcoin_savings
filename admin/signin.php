<?php require '../includes/loginp.php'; 
include '../member/top.php';
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
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" name="username" type="text" aria-describedby="emailHelp" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="upassword" type="password" placeholder="Password">
          </div>
          <button class="btn btn-primary btn-block" name="submit_login">Login</button>
        </form>
        
      </div>
    </div>
  </div>
  <?php
  include '../member/bottom.php';
?>