<?php
require '../includes/pass_process.php';
require 'header.php';
?>
 <div id="page-wrapper">
  <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
<form method="post" action="">
<table class="ui striped celled table customtable feedbacktable">

							<tbody>
<tr>
<td colspan="2">


</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">Username</td>
									<td  width="70%">
									<input type="text" class="form-control" value="<?php echo $user['full_name'];?>" readonly />
									<input type="hidden" name="userid" value="<?php echo $_SESSION['user_id']; ?>">
									</td>
								</tr>
								
<tr>
									<td style="padding-left:20px;">New Password</td>
									<td><input type="password" name="upass" class="form-control" placeholder="Input Your New Password" required /></td>
								</tr>
								<tr>
									<td style="padding-left:20px;">Confirm New Password</td>
									<td><input type="password" name="cpass" class="form-control" placeholder="Confirm Your New Password" required /></td>
								</tr>	<tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnPass" class="btn btn-info"><i class="edit icon"></i>Change Password</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
			</section>
		</div>

<?php
include "footer.php";
?>
