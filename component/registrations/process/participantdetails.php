<?php
	$officer_email = $_GET['officer_email'];
	$details = $db->get_results("SELECT * FROM `officer_work` ow,officer_info oi where ow.officer_email='$officer_email' and ow.officer_email=oi.officer_email");
?>
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Officer Work Details</h3>
                  <div class="box-tools">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Officer Email</th>
					<th>Officer Name</th>
					  <th>Pincode</th>
                    </tr>
<?php
foreach($details as $detail)
{
?>
					<tr>
					<td><?php echo $detail->officer_email;?></td>
					<td><?php echo $detail->officer_name; ?></td>
					<td><?php echo $detail->pincode;?></td>
					</tr>

<?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section>
