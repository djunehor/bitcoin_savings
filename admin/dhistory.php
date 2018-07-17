<?php
$page_name = "Deposit History";
require 'header.php';
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
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Current</th>
                  <th>To Get</th>
                  <th>Expiry</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$deposit = mysqli_query($con,"select * from $deposit_table order by add_time desc limit 500");
while($ud = mysqli_fetch_assoc($deposit))
{ 
?>
                <tr>
                  <td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select email from $user_table where user_id='".$ud['user_id']."'")); echo $q['email']; ?></td>
                  <td><?php echo number_format($ud['amount']); ?></td>
                  <td><?php echo date('d M Y g:i',$ud['add_time']); ?></td>
                  <td><?php $f = floor($ud['expiry']-$ud['add_time']); $current=$ud['amount']+($ud['amount']*($f/100)); echo number_format($current,8); ?></td>
                  <td><?php echo number_format($ud['toget'],8); ?></td>
                  <td><?php echo date('d M Y g:i',$ud['expiry']); ?></td>
                  <td><?php if($ud['status']==0) {echo "Active";} elseif($ud['status']==1) {echo "Expired";} elseif($ud['status']==2) {echo "Used to Pay Debt";}?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>