<?php
$page_name = "Main Pages";
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
                  <th>Title</th>
                  <th>Content</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php
$w = mysqli_query($con,"select * from $con_table order by cid asc");
while($r = mysqli_fetch_array($w))
		{
		?>
						  <tr>					  
<td><?php echo $r['title']; ?></td>
<td><?php $string = (strlen($r['content']) > 50) ? substr($r['content'],0,50).'...' : $r['content']; echo html_entity_decode(htmlspecialchars_decode($string)); ?></td>
<td><form action="edit-content" method="post">
				<input name="t" value="<?php echo $r['cid']; ?>" type="hidden">
              <button type="submit" class="btn btn-success">Edit</button>
		</form></td>
						  </tr>
						 <?php
						 }
						 ?>
						</tbody>
					  </table>
          </div>
        </div>
       
      </div>
   <?php include 'footer.php'; ?>