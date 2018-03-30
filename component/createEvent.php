<?php
include('../private/conn.php');
?>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div  name="error" id="error">
                                
                            </div>
                                    <form role="form" method="POST" id="create_event_form" name="create_event_form">
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input name="event_name" class="form-control" type="text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea  name="description" class="form-control" type="text" rows="6" cols="4">
                                            </textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input name="event_date" class="form-control" type="date" data-provide="datepicker">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <div class="input-group clockpicker">
                                                <input name="start_time" type="time" class="form-control" value="09:30">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <div class="input-group clockpicker">
                                                <input name="end_time" type="time" class="form-control" value="09:30">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                            </div>                                            
                                        </div>
                                        

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                             <?php
                                             $result=$db->get_results("select * from event_category;");
                                             foreach ($result as $value) {
                                                ?>
                                                <option value="<?php echo $value->category_name;?>"><?php echo $value->category_name;?></option>
                                                <?php
                                            }
                                             ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Venue</label>
                                            <input name="venue" class="form-control" type="text">
                                        </div>
                                    
                                        <button type="submit" id="btn_submit" class="btn btn-default">Submit Button</button>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
                <script>

  $('document').ready(function()
{
  
    
    /* validation */
    $("#create_event_form").validate({
        rules:
        {
            name: {
                required: true,
                minlength: 3
            },
            description: {
                required: true,
                minlength: 30,
                
            },
            start_time: {
                required: true,
                
            },
            end_time: {
                required: true,
                
            },
            event_date:{
                required:true,
                
            },
            venue:{
                required:true;
            }
        },
        messages:
        {
            name: "Event Name is required",
            description:{
                required: "Please provide Event Description",
                minlength: "Please add at least one sentence."
            },
            event_date: "Enter a Valid Date",
            start_time:{
                required: "Event start time is required",
               
            },
            
            end_time:
                    {
                        required: "Event ending time is required.",
                        
                    },
                    venue:"Venue details are required."
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#create_event_form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'insertEvent.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Adding Event ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already registered.Please login. !</div>');

                        $("#btn_submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Event');

                    });

                }
                else if(data=="inserted")
                {

                    $("#btn-submit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("template/successReg.php"); }); ',5000);
                    alert("Event Created Successfully");
                    window.location.href="./index.php";
                    

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});
</script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
