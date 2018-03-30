    
<?php
      include('private/conn.php');
?>

<div id="wrapper">
            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Event</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="page-content">  
<?php 
      $sql="select * from create_event where event_id='E1234567898765'";
      $ans=$db->get_row($sql);
      
?>

                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                            Add a new Event
                        </div>
                                <div class="panel-body ">
                                    <div class="row">
                                         
                                        
                                        <div class="col-lg-6">
                                            <div  name="error" id="error">

                                            </div>
                                            
                                            <form role="form" method="POST" id="create_event_form" name="create_event_form" action="updateInDb.php">
                                                <div class="form-group">
                                                    <label>Event Name</label>
                                                    <input name="event_name" class="form-control" type="text" value="<?php echo $ans->title;?>" disabled>
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea  name="description" class="form-control" type="text" rows="6" cols="4"><?php echo $ans->description;?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input  name="event_date" id="d" class="form-control" type="date" data-provide="datepicker" value="<?php echo $ans->date;?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <div class="input-group clockpicker">
                                                        <input name="start_time" type="time" class="form-control" value="<?php echo $ans->start_time;?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>                                            
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <div class="input-group clockpicker">
                                                        <input name="end_time" type="time" class="form-control" value="<?php echo $ans->end_time;?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>                                            
                                                </div>


                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select name="category" class="form-control" <?php echo $ans->category;?>>
                                                        <?php
                                                        $result = $db->get_results("select * from event_category;");
                                                        foreach ($result as $value) {
                                                            ?>
                                                            <option value="<?php echo $value->category_name; ?>"><?php echo $value->category_name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Venue</label>
                                                    <input name="venue" class="form-control" type="text" value="<?php echo $ans->venue;?>">
                                                </div>
                                                <div class="text-center">
                                                <button type="submit" id="btn_submit" class="btn btn-lg btn-primary">Update Button</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                           <div class="col-lg-3"></div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                 </div>
            </div>
        </div>