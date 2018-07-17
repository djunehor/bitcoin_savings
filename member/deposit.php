<?php
$page_name="New Deposit";
$page_id="deposit";
include '../includes/deposit_process.php';
?>
<form method="post" action="">
<table class="table table-bordered table-striped">
							<tbody>
<?php if (isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; } 
elseif (isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
else {echo '<div class="alert alert-info">Send your bitcoin to <b>'.$option['admin_wallet'].'</b> and post your transaction hash below.</div>';}
?>																			
								<tr>
									<td >Transacton Hash</td>
									<td><input type="text" class="form-control" name="uhash" required /></td>
								</tr>
								<tr>
									<td >Deposit Lock Period (days)</td>
									<td><input type="number" class="form-control" name="uexp" required /></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnDeposit" class="btn btn-info"><i class="edit icon"></i>Add Deposit</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
<?php
include "footer.php";
?>
