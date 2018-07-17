
<?php
$page_name="Member Home";
include 'header.php'; ?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo number_format($d['dsum'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Total Deposits</span>
              
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?php echo number_format($w['wsum'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Total Withdrawals</span>
              
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo number_format($user['debt'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Total Debt</span>
              
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?php echo number_format($user['balance'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Available Balance</span>
              
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
<?php if(!empty($option['website_notice']))
{ ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Important Notice</div>
        <div class="card-body">
<?php
echo  html_entity_decode(htmlspecialchars_decode($option['website_notice']));
?>
        </div>
        <div class="card-footer small text-muted"><?php echo date('d M Y g:i a',$option['update_time']); ?></div>
      </div>
 <?php
}
if(mysqli_num_rows(mysqli_query($con,"select * from $deposit_table where user_id='$user_id'"))>0)
{
	?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Deposits (<a href="dhistory">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Amount (BTC)</th>
                  <th>Date</th>
                  <th>Current (BTC)</th>
                  <th>Expiry</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$deposit = mysqli_query($con,"select * from $deposit_table where user_id='$user_id' order by add_time desc limit 5");
while($ud = mysqli_fetch_assoc($deposit))
{ 
?>
                <tr>
                  <td><?php echo number_format($ud['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i a',$ud['add_time']); ?></td>
                  <td><?php $f = floor((time()-$ud['add_time'])/86400); $current=$ud['amount']+($ud['amount']*($f/100)); echo number_format($current,8); ?></td>
                  <td><?php echo date('d M Y g:i a',$ud['expiry']); ?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
<?php }
if(mysqli_num_rows(mysqli_query($con,"select * from $withdraw_table where user_id='$user_id'"))>0)
{
 ?>
	  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Withdrawals (<a href="whistory">View All</a>)</div>
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
$withdraw = mysqli_query($con,"select * from $withdraw_table where user_id='$user_id' order by add_time desc limit 5");
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
<?php }
if(mysqli_num_rows(mysqli_query($con,"select * from $loan_table where user_id='$user_id'"))>0)
{
	?>
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Loans (<a href="lhistory">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Amount (BTC)</th>
                  <th>Date</th>
                  <th>To Pay (BTC)</th>
                  <th>Loan Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$loan = mysqli_query($con,"select * from $loan_table where user_id='$user_id' order by add_time desc limit 5");
while($ul = mysqli_fetch_assoc($loan))
{ 
?>
                <tr>
                  <td><?php echo number_format($ul['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i a',$ul['add_time']); ?></td>
				  <td><?php echo number_format($ul['topay'],8); ?></td>
				  <td><?php if($ul['status']==0){echo "Processing";} elseif($ul['status']==1){echo "Approved";} elseif($ul['status']==2){echo "Debt Cleared";} elseif($ul['status']==3){echo "Rejected";}?></td>
				  </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
<?php } ?>	  
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include 'footer.php'; ?>