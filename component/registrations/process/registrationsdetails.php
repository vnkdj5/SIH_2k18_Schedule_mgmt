<?php
if(isset($_POST['delete_officer']))
{
    $officer_email = filter_var($_POST['delete_officer']);
    $delete_registration = $db->query("DELETE FROM officer_info WHERE officer_email='$officer_email'");
    $delete_area=$db->query("DELETE FROM officer_work where officer_email='$officer_email'");
    ?>
    <script>
    alert("Officer with Email-Id : <?php echo $officer_email?> Deleted Successfully!");
    </script>
    <?php

}
	if(isset($_POST['search']))
	{	
		if($_POST['officer_email']!='')
		{
			$officer_email = filter_var($_POST['officer_email']);
			$officerDetails = $db->get_results("select * from officer_info where officer_email='$officer_email'");
		}
		else
		{
			$officerDetails = $db->get_results("select * from officer_info");
		}
	}
	else
	{
	$officerDetails = $db->get_results("select * from officer_info");
	}
	if($officerDetails)
	{
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Officer Details</h3>
                  <div class="box-tools">
				  <form action="" method='post'>
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="officer_email" class="form-control input-sm pull-right" placeholder="Officer Email">
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
                      <th>Officer Id</th>
                      <th>Officer Name</th>
                      <th>Officer Email</th>
                      <th>Officer Mobile</th>
					  <th>Department Id</th>
					  <th>Password</th>
					<!--  <th>Email</th>-->
					  <th>Option</th>  
					  <th>Delete</th>
                    </tr>
					<?php
			foreach($officerDetails as $tmp_participant)
			{
			?>
				<tr>
					<td><?php echo $tmp_participant->officer_id;?></td>
					<td><?php echo $tmp_participant->officer_name;?></td>
					<td><?php echo $tmp_participant->officer_email;?></td>
					<td><?php echo $tmp_participant->officer_mobile;?></td>
					<td><?php echo $tmp_participant->officer_dept_id;?></td>
					<td><?php echo $tmp_participant->officer_password;?></td>
				<!--	<td><?php echo $tmp_participant->email;?></td>  -->
					<td><a href="index.php?folder=registrations&file=participantdetails&officer_email=<?php echo $tmp_participant->officer_email;?>"><button class="btn btn-group btn-default" data-toggle="tooltip" title="Details"><i class="fa fa-fw fa-list"></i></button></a>
					</td>
					<td>
					<form action="index.php?folder=registrations&file=registrationsdetails" method="post">
						<input type="hidden" value="<?php echo $tmp_participant->officer_email;?>" name="delete_officer"/><button class="btn btn-group btn-danger" type="submit" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-remove"></i></button>
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
