<?php
require '../includes/unblock_process.php';
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
									<td style="padding-left:20px;" width="30%">User Email</td>
									<td  width="70%">
									<input type="email" class="form-control" name="uemail" required />
									</td>
								</tr>	<tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnUnblock" class="btn btn-danger"><i class="edit icon"></i>Unblock User</button>
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
