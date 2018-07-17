<?php
include '../includes/update_process.php';
?>
<a href="edit-password">Edit password</a>
<div id="page-wrapper">
<form method="post" action="" enctype="multipart/form-data">
<table class="table table-bordered table-striped">
							<tbody>
<?php if (isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; } 
elseif (isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
?>																			
								<tr>
									<td >Email</td>
									<td><input type="text" class="form-control" value="<?php echo $user['email']; ?>" readonly /></td>
								</tr>
								<tr>
									<td >Bitcoin Wallet Address</td>
									<td><input type="text" class="form-control" name="ubtc" value="<?php echo $user['wallet']; ?>" required /></td>
								</tr>
								<tr>
									<td >Registration Date</td>
									<td><input type="text" class="form-control" placeholder="Registration Date" value="<?php echo date("d M Y ",$user['reg_time']);?>" readonly /></td>
								</tr>
								<tr>
									<td >Full Name</td>
									<td><input type="text" name="fullname" class="form-control" placeholder="Full Name" value="<?php echo $user['full_name']; ?>"/></td>
								</tr>
								<tr>
									<td >Phone</td>
									<td><input type="text" name="uphone" class="form-control" placeholder="Telephone Number" value="<?php echo $user['phone']; ?>" /></td>
								</tr>
								<tr>
									<td >Residential Address</td>
									<td><input type="text" name="raddress" class="form-control" placeholder="Residential Address" value="<?php echo $user['raddress']; ?>" /></td>
								</tr>
								<tr>
									<td >Occupation</td>
									<td><input type="text" name="occupation" class="form-control" placeholder="Occupation" value="<?php echo $user['occupation']; ?>" /></td>
								</tr>
								<tr>
									<td >Office Address</td>
									<td><input type="text" name="oaddress" class="form-control" placeholder="Office Address" value="<?php echo $user['oaddress']; ?>" /></td>
								</tr>
								<tr>
									<td >D.O.B (dd-mm-yyyy)</td>
									<td><input type="text" name="dob" class="form-control" placeholder="DD-MM-YYYY" value="<?php echo date('d-M-Y',$user['dob']); ?>" /></td>
								</tr>
								<tr>
									<td >Photo</td>
									<td><input type="file" name="file1" class="form-control"/></td>
								</tr>
								<tr>
									<td >ID Card (Govt Approved)</td>
									<td><input type="file" name="file2" class="form-control"/></td>
								</tr>
								<input type="hidden" name="file1" value="<?php echo $user['photo']; ?>"/>
								<input type="hidden" name="file2" value="<?php echo $user['idcard']; ?>"/>
								<tr>
									<td colspan="2" style="text-align:center;">
										<button type="submit" name="btnProfile" class="btn btn-info"><i class="edit icon"></i>Update Profile</button>
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
