<?php
$page_name = "All Users";
require 'header.php';
?>
 
		  <a class="btn btn-danger" href="block-user">Block User</a>  <a class="btn btn-success" href="unblock-user">Unblock User</a>        <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $page_name; ?></div>
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Reg Date</th>
                  <th>Last Login</th>
                  <th>Full Name</th>
                  <th>Photo</th>
                  <th>D.O.B</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$us = mysqli_query($con,"select * from $user_table order by reg_time desc limit 100");
while($ms = mysqli_fetch_assoc($us))
{ 
?>
                <tr>
                  <td><?php echo $ms['email']; ?></td>
                  <td><?php echo date('d M Y g:i a',$ms['reg_time']); ?></td>
				  <td><?php echo date('d M Y g:i a',$ms['last_login']); ?></td>
				  <td><?php echo $ms['full_name']; ?></td>
				  <td><a target="_blank" href="<?php echo $ms['photo']; ?>">View Image</a></td>
				   <td><?php echo date('d M Y',$ms['dob']); ?></td>
                </tr>
                <?php } ?>
				
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>