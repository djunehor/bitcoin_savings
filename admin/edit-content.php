<?php
require "../includes/edit_process.php";
?>
	   <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; }
				?>
<form method="post" action="">
<table class="ui striped celled table customtable feedbacktable">

							<tbody>							
								<tr>
									<td style="padding-left:20px;" width="30%">Title</td>
									<td  width="70%"><input type="text" name="title" class="form-control" value="<?php echo $page['title'];?>" required /></td>
								</tr>
								
<tr>
									<td style="padding-left:20px;">Content</td>
									<td><textarea type="text" id="editor1" class="form-control" name="content"><?php echo html_entity_decode(htmlspecialchars_decode($page['content'])); ?></textarea>
</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center;">
									<input type="hidden" name="cid" value="<?php echo $page['cid']; ?>">
										<button type="submit" name="btnEdit" class="btn btn-info"><i class="edit icon"></i>Modify Page</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
		</div>
	
<script>
		CKEDITOR.replace( 'editor1', {
			height: 300,
			width: 600,
		} );
	</script>
<?php
include "footer.php";
?>
