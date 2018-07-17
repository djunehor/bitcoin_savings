<?php
require '../includes/option_process.php';
?>
 <div id="page-wrapper">
  <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
				<script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
<form method="post" action="">
<table class="ui striped celled table customtable feedbacktable">

							<tbody>
							<tr><td><b>General Settings</b></td></tr>
							<tr>
									<td style="padding-left:20px;" width="30%">Website Name</td>
									<td  width="70%">
									<input type="text" class="form-control" name="website_name" value="<?php echo $option['website_name']; ?>" readonly>
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">General Notice</td>
									<td  width="70%">
									<textarea type="text" class="form-control" id="editor1" name="website_notice"><?php echo html_entity_decode(htmlspecialchars_decode($option['website_notice'])); ?> ?></textarea>
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">Admin wallet</td>
									<td  width="70%">
									<input type="text" class="form-control" name="admin_wallet" value="<?php echo $option['admin_wallet']; ?>" required />
									</td>
</tr>
<tr><td><b>Loan Settings</b></td></tr>
<tr>
									<td style="padding-left:20px;" width="30%">Loan Processing Fee (BTC)</td>
									<td  width="70%">
									<input type="text" class="form-control" name="loan_processing_fee" value="<?php echo number_format($option['loan_processing_fee'],8); ?>" required />
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">Minimum Loan Request (BTC)</td>
									<td  width="70%">
									<input type="text" class="form-control" name="minimum_loan" value="<?php echo number_format($option['minimum_loan'],8); ?>" required />
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">Maximum Loan Request (BTC)</td>
									<td  width="70%">
									<input type="text" class="form-control" name="maximum_loan" value="<?php echo number_format($option['maximum_loan'],8); ?>" required />
									</td>
</tr>
<tr><td><b>Interest Rates for New Comers (%)</b></td></tr>
<tr>
									<td style="padding-left:20px;" width="30%">30 Days</td>
									<td  width="70%">
									<input type="text" class="form-control" name="rate1" value="<?php echo $option['rate1']; ?>" required />
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">60 Days</td>
									<td  width="70%">
									<input type="text" class="form-control" name="rate2" value="<?php echo $option['rate2']; ?>" required />
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">Over 60 Days</td>
									<td  width="70%">
									<input type="text" class="form-control" name="rate3" value="<?php echo $option['rate3']; ?>" required />
									</td>
</tr>
<tr><td><b>Interest Rates for Existing Members (%)</b></td></tr>
<tr>
									<td style="padding-left:20px;" width="30%">30 Days</td>
									<td  width="70%">
									<input type="text" class="form-control" name="rate4" value="<?php echo $option['rate4']; ?>" required />
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">60 Days</td>
									<td  width="70%">
									<input type="text" class="form-control" name="rate5" value="<?php echo $option['rate5']; ?>" required />
									</td>
</tr>
<tr>
									<td style="padding-left:20px;" width="30%">Over 60 Days</td>
									<td  width="70%">
									<input type="text" class="form-control" name="rate6" value="<?php echo $option['rate6']; ?>" required />
									</td>
</tr>
								<tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnOption" class="btn btn-danger"><i class="edit icon"></i>Update Settings</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
			</section>
		</div>
<script>
		CKEDITOR.replace( 'editor1', {
			height: 200,
			width: 500,
		} );
	</script>
<?php
include "footer.php";
?>
