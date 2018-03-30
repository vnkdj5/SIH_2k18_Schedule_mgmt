<?php
include('../private/conn.php')

?>
<!-- /.row -->
            <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="load123">
                            Event Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Event Name</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Venue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=$db->get_results("select * from create_event;");
                                    $count=1;
                                    if(isset($result))
                                    {
                                    foreach($result as $row)
                                    {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row->title; ?></td>
                                        
                                        <td><?php echo $row->description; ?></td>
                                        <td class="center"><?php echo $row->date; ?></td>
                                        <td class="center"><?php echo $row->start_time; ?></td>
                                        <td class="center"><?php echo $row->end_time; ?></td>
                                        <td class="center"><?php echo $row->venue; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    }
 
                                    ?>
                                </tbody>
                            </table>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    
     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    $(document).ready(function (){
       $("#load123").click(function()
       {
          $('#dataTables-example').DataTable({
            responsive: true
        }); 
       }); 
    });
    </script>