<?php
$page_name = "Pending Withdrawal";
require 'header.php';
if(isset($_POST['btnWith']))
{
$wid = $_POST['wid'];
$a = mysqli_query($con,"update $withdraw_table set status=1 where wid='$wid'");
echo '<div class="alert alert-success">Transaction has been marked as paid</div>';
}
?>
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
                  <th>Amount (BTC)</th>
                  <th>Date</th>
                  <th>Wallet</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$withdraw = mysqli_query($con,"select * from $withdraw_table where status=0 order by add_time asc limit 100");
while($uw = mysqli_fetch_assoc($withdraw))
{ 
?>
                <tr>
				<td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select email,wallet from $user_table where user_id='".$uw['user_id']."'")); echo $q['email']; ?></td>
                 
                  <td><?php echo number_format($uw['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i a',$uw['add_time']); ?></td>
				  <td><?php echo $q['wallet']; ?></td>
				  <td><form method="post" action=""><input type="hidden" name="wid" value="<?php echo $uw['wid']; ?>"><button name="btnWith">Mark as Paid</button></form></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>