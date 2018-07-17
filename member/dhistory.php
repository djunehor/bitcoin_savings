<?php
if(isset($_POST['btnPdf']))
{
$user_id = $_POST['dstat'];
$report_type = 1;
require_once '../includes/pdf-generator.php';
}
$page_name = "Deposit History";
require 'header.php';
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_name; ?></div>
<!--<form method="post" action=""><input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="dstat"><button class="btn btn-success" name="btnPdf">Get Statement</button></form>-->
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Amount (BTC)</th>
                  <th>Date</th>
                  <th>Current</th>
                  <th>To Get</th>
                  <th>Expiry</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$deposit = mysqli_query($con,"select * from $deposit_table where user_id='$user_id' order by add_time desc limit 100");
while($ud = mysqli_fetch_assoc($deposit))
{ 
?>
                 <tr><td><?php echo number_format($ud['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i a',$ud['add_time']); ?></td>
                  <td><?php $f = floor((time()-$ud['add_time'])/86400); $current=$ud['amount']+($ud['amount']*($f/100)); echo number_format($current,8); ?></td>
                  <td><?php echo number_format($ud['toget'],8); ?></td>
                  <td><?php echo date('d M Y g:i a',$ud['expiry']); ?></td>
                  <td><?php if($ud['status']==0) {echo "Active";} elseif($ud['status']==1) {echo "Expired";} elseif($ud['status']==2) {echo "Used to Pay Debt";}?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>