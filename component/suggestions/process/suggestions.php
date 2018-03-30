<?php
 if(isset($_POST['delete_complaints']))
{
    
    $complaint_id = filter_var($_POST['delete_complaints']);
    $delete_delete_suggestion = $db->query("DELETE FROM complaints WHERE complaint_id='$complaint_id'");
  
    ?>
    <script>
    alert("Complaint Id <?php echo $complaint_id?> Deleted Successfully!");
    </script>
    <?php
}

	if(isset($_POST['search']))
	{	
		if($_POST['email']!='')
		{
			$email = filter_var($_POST['email']);
			$complaints = $db->get_results("select * from complaints where user_email='$email'");
		}
		else
		{
			$complaints = $db->get_results("select * from complaints");
		}
	}
	else
	{
	$complaints = $db->get_results("select * from complaints");
	}
	if($complaints)
	{
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Complaints</h3>
                  <div class="box-tools">
				  <form action="" method='post'>
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="college" class="form-control input-sm pull-right" placeholder="College Name">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default" name="search"><i class="fa fa-search"></i></button>
                      </div>
					</div>
				  </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Complaint ID</th>
                      <th>Department</th>
                      <th>Problem</th>
					  <th>Address</th>
					  <th>Description</th>
					  <th>Status</th>
					  <th>Submit Date</th>
                    </tr>
					<?php
			foreach($complaints as $tmp_complaints)
			{
			?>
				<tr>
					<td><?php echo $tmp_complaints->complaint_id;?></td>
					<td><?php echo $tmp_complaints->cat_id;?></td>
					<td><?php echo $tmp_complaints->subcategory;?></td>
					<td><?php echo $tmp_complaints->address." ".$tmp_complaints->pincode;?></td>
					<td><?php echo $tmp_complaints->description;?></td>
					<td><?php echo $tmp_complaints->status;?></td>
					<td><?php echo $tmp_complaints->submitdate;?></td>

					<td>
					<form action="index.php?folder=suggestions&file=suggestions" method="post">
						<input type="hidden" value="<?php echo $tmp_complaints->complaint_id;?>" name="delete_complaints"/><button class="btn btn-group btn-danger" type="submit" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-remove"></i></button>
					</form>
					</td>
				</tr>
		<?php
			}
		?>	
<?php
	}
?>

                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
</section>
