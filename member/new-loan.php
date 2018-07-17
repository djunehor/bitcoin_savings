<?php
include '../includes/loan_process.php';
?>
<div id="page-wrapper">
<form method="post" action="" enctype="multipart/form-data">
<table class="table table-bordered table-striped">
							<tbody>
<?php if (isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; } 
elseif (isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
else {echo '<div class="alert alert-info"><p>Loan Processing Fee of '.$option['loan_processing_fee'].' BTC applies. Ensure you <a href="account-details">update your profile</a> first before applying for loan.</p><p>First send <span style="color:white;">'.$option['loan_processing_fee'].' BTC</span> to <span style="color:black;">'.$option['admin_wallet'].'</span> using your registerd wallet address.<br>Then enter the transaction hash below.</p> <p style="color:red;">Your loan request will not be processed if you do not pay Loan Processing Fee or submit transaction hash for payment verification.</p></div>';}
?>																			
								<tr>
									<td >Amount</td>
									<td><input type="text" class="form-control" name="uamount" placeholder="in BTC" required /></td>
								</tr>
								<tr>
									<td >Duration</td>
									<td>
									<select name="urate" class="form-control" required />
									<?php if($d['dsum']==0)
									{
										?>
									<option value="<?php echo $option['rate1']; ?>">30 days (<?php echo $option['rate1']; ?>% interest)</option>
									<option value="<?php echo $option['rate2']; ?>">60 days (<?php echo $option['rate2']; ?>% interest)</option>
									<option value="<?php echo $option['rate3']; ?>">Over 60 days (<?php echo $option['rate3']; ?>% interest)</option>
									<?php
									}
									else
									{
										?>
									<option value="<?php echo $option['rate4']; ?>">30 days (<?php echo $option['rate4']; ?>% interest)</option>
									<option value="<?php echo $option['rate5']; ?>">60 days (<?php echo $option['rate5']; ?>% interest)</option>
									<option value="<?php echo $option['rate6']; ?>">Over 60 days (<?php echo $option['rate6']; ?>% interest)</option>
									<?php
									}
									?>
									</select>
									</td>
								</tr>
								<tr>
									<td >Transaction Hash</td>
									<td><input type="text" class="form-control" name="uhash" required /></td>
								</tr>
								<tr>
									<td >Guarantor/Employee Letter</td>
									<td><input type="file" name="file1" class="form-control"  required /></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnLoan" class="btn btn-info"><i class="edit icon"></i>Apply</button>
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
