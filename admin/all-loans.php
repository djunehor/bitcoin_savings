<?php
$page_name = "All Loans";
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
                  <th>ToPay</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$withdraw = mysqli_query($con,"select * from $loan_table where status=1 order by add_time asc limit 100");
while($uw = mysqli_fetch_assoc($withdraw))
{ 
?>
                <tr>
				<td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='".$uw['user_id']."'")); echo $q['email']; ?></td>
                 
                  <td><?php echo number_format($uw['amount'],8); ?> BTC</td>
                  <td><?php echo date('d M Y g:i a',$uw['add_time']); ?></td>
                  <td><?php echo number_format($uw['topay'],8); ?> BTC</td>
                  <td><?php if($uw['status']==1){echo "Debt Remains";} elseif($uw['status']==2){echo "Debt Paid";}?></td>
              <tr>
<?php } ?>
			  </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>