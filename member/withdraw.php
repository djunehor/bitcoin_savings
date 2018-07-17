<?php
require '../includes/with_process.php';
?>
  <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
if($user['balance']>0) {	?>
<form method="post" action="">
<table class="ui striped celled table customtable feedbacktable">

							<tbody>							
<tr>
									<td style="padding-left:20px;">Amount (BTC)</td>
									<td><input type="text" name="uamount" class="form-control" value="<?php echo number_format($user['balance'],8); ?>" required /></td>
								</tr><tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnWith" class="btn btn-info"><i class="edit icon"></i>Withdraw</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>

<?php
}
else {echo '<div class="alert alert-danger">You do not have any balance to withdraw!</div>';}
include "footer.php";
?>
