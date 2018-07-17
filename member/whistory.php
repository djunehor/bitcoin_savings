<?php
if(isset($_POST['btnPdf']))
{
$user_id = $_POST['dstat'];
$report_type = 2;
require_once '../includes/pdf-generator.php';
}
$page_name = "Withdrawal History";
require 'header.php';
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_name; ?></div>
<!--<form method="post" action=""><input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="dstat"><button class="btn btn-sucess" name="btnPdf">Get Statement</button></form>-->
       <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Amount (BTC)</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$withdraw = mysqli_query($con,"select * from $withdraw_table where user_id='$user_id' order by add_time desc limit 100");
while($uw = mysqli_fetch_assoc($withdraw))
{ 
?>
                <tr>
                  <td><?php echo number_format($uw['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i a',$uw['add_time']); ?></td>
				  <td><?php if($uw['status']==0){echo "Processing";} elseif($uw['status']==1){echo "Paid";}?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>