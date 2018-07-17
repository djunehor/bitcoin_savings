<?php
require '../includes/l_process.php';
?>
<a href="all-loans" class="btn btn-info">All Loans</a>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_name; ?></div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Details</th>
                  <th>Processing Fee</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$withdraw = mysqli_query($con,"select * from $loan_table where status=0 order by add_time asc limit 100");
while($uw = mysqli_fetch_assoc($withdraw))
{ 
?>
                <tr>
				<td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='".$uw['user_id']."'")); echo $q['email']; ?></td>
                 
                  <td>Amount: <?php echo number_format($uw['amount'],8); ?> BTC<br>
                  Date: <?php echo date('d M Y g:i a',$uw['add_time']); ?><br>
                  D.O.B: <?php echo date('d M Y',$q['dob']); ?><br>
				  Address: <?php echo $q['raddress']; ?></br>
				  Office: <?php echo $q['oaddress']; ?><br>
				  <a target="_blank" href="<?php echo $q['photo']; ?>">View Photo</a><br>
				  <a target="_blank" href="<?php echo $q['idcard']; ?>">View IDCard</a><br>
				  <a target="_blank" href="<?php echo $uw['proof']; ?>">View Letter</a><br>
				  To Pay: <?php echo number_format($uw['topay'],8); ?> BTC<br>
				  Wallet: <?php echo $q['wallet']; ?></td>
				  <td><a target="_blank" href="https://blockchain.info/q/txresult/<?php echo $uw['hash']; ?>/<?php echo $option['admin_wallet']; ?>?format=json">Verify Payment</a><td>
				  <td><form method="post" action="">
				  <input type="hidden" name="lid" value="<?php echo $uw['lid']; ?>">
				  <input type="hidden" name="lamount" value="<?php echo $uw['topay']; ?>">
				  <input type="hidden" name="uid" value="<?php echo $uw['user_id']; ?>">
				  <button class="btn btn-success" name="btnLoan">Mark as Paid</button>
				  </form></td>
				  <?php if($uw['status']==0)
				  {
					  ?>
				  <td><form method="post" action=""><input type="hidden" name="lid" value="<?php echo $uw['lid']; ?>"><button class="btn btn-danger" name="DelLoan">Delete Request</button></form></td>
				  <td><form method="post" action=""><input type="hidden" name="lid" value="<?php echo $uw['lid']; ?>"><button class="btn btn-info" name="CancelLoan">Reject Request</button></form></td>
				  <?php } ?>               
			   </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>