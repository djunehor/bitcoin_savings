<?php
$page_name="Admin Home";
include 'header.php';
$with=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as wsum FROM $withdraw_table where status=1")) or die("Withdraw data: ".mysqli_error($con)."");  
$dep=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as dsum FROM $deposit_table")) or die("Deposit data: ".mysqli_error($con)."");  
$loan=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as lsum FROM $loan_table where status=1")) or die("Loan data: ".mysqli_error($con)."");  
 ?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo mysqli_num_rows(mysqli_query($con,"select * from $user_table")); ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="all-users">
              <span class="float-left">Total Members</span>
              
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?php echo number_format($with['wsum'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="whistory">
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
              <div class="mr-5"><?php echo number_format($loan['lsum'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="lhistory">
              <span class="float-left">Total Loans</span>
              
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?php echo number_format($dep['dsum'],8); ?> BTC</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="dhistory">
              <span class="float-left">Total Deposits</span>
              
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
   
         <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Users (<a href="all-users">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Reg Date</th>
                  <th>Last Login</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$us = mysqli_query($con,"select * from $user_table order by reg_time desc limit 5");
while($ms = mysqli_fetch_assoc($us))
{ 
?>
                <tr>
                  <td><?php echo $ms['email']; ?></td>
                  <td><?php echo date('d M Y g:i a',$ms['reg_time']); ?></td>
				  <td><?php echo date('d M Y g:i a',$ms['last_login']); ?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Deposits (<a href="dhistory">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Current</th>
                  <th>Expiry</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$deposit = mysqli_query($con,"select * from $deposit_table order by add_time desc limit 5");
while($ud = mysqli_fetch_assoc($deposit))
{ 
?>
                <tr>
				 <td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select email from $user_table where user_id='".$ud['user_id']."'")); echo $q['email']; ?></td>
                  
                  <td><?php echo number_format($ud['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i',$ud['add_time']); ?></td>
                  <td><?php $f = floor($ud['expiry']-$ud['add_time']); $current=$ud['amount']+($ud['amount']*($f/100)); echo number_format($current,8); ?></td>
                  <td><?php echo date('d M Y g:i a',$ud['expiry']); ?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
	  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Withdrawals (<a href="whistory">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				
                  <th>User</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$withdraw = mysqli_query($con,"select * from $withdraw_table order by add_time desc limit 5");
while($uw = mysqli_fetch_assoc($withdraw))
{ 
?>
                <tr>
				<td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select email from $user_table where user_id='".$uw['user_id']."'")); echo $q['email']; ?></td>
                 
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
	 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Loans (<a href="lhistory">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				
                  <th>User</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$loan = mysqli_query($con,"select * from $loan_table order by add_time desc limit 5");
while($ul = mysqli_fetch_assoc($loan))
{ 
?>
                <tr>
				<td><?php $q = mysqli_fetch_assoc(mysqli_query($con,"select email from $user_table where user_id='".$ul['user_id']."'")); echo $q['email']; ?></td>
                 
                  <td><?php echo number_format($ul['amount'],8); ?></td>
                  <td><?php echo date('d M Y g:i',$ul['add_time']); ?></td>
				  <td><?php if($ul['status']==0){echo "Processing";} elseif($ul['status']==1){echo "Paid";}?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div> 
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Last 5 Tickets (<a href="view-tickets">View All</a>)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Topic</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$alld=mysqli_query($con,"select SUBSTRING(detail,1,40),name,datetime from $message_table order by datetime desc limit 5");
									while($allde = mysqli_fetch_assoc($alld))
									{ 
?>
                <tr>
                  <td><?php echo number_format($allde['name']); ?></td>
                  <td><?php echo date('d M Y g:i',$allde['datetime']); ?></td>
				  <td><?php echo $allde['SUBSTRING(detail,1,50)']; ?>...</td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>	  
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include 'footer.php'; ?>
   