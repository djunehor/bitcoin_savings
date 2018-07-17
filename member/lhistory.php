<?php
if(isset($_POST['btnPdf']))
{
$user_id = $_POST['dstat'];
$report_type = 3;
require_once '../includes/pdf-generator.php';
}
$page_name = "Loan History";
require 'header.php';
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_name; ?></div>
<!--<form method="post" action=""><input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="dstat"><button class="btn btn-success" name="btnPdf">Get Statement</button></form> -->
       <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Amount (BTC)</th>
                  <th>Date</th>
                  <th>To Pay (BTC)</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$loan = mysqli_query($con,"select * from $loan_table where user_id='$user_id' order by add_time desc limit 100");
while($ul = mysqli_fetch_assoc($loan))
{ 
?>
                <tr>
                  <td><?php echo number_format($ul['amount'],8); ?> BTC</td>
                  <td><?php echo date('d M Y g:i a',$ul['add_time']); ?></td>
                  <td><?php echo number_format($ul['topay'],8); ?> BTC</td>
                  <td><?php  if($ul['status']==0){echo "Not Approved Yet";} elseif($ul['status']==3){echo "Rejected";}elseif($ul['status']==1){echo "Debt Remains";} elseif($ul['status']==2){echo "Debt Paid";}?></td>
              
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>