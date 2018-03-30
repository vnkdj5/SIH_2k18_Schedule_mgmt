<!DOCTYPE html>
<?php
session_start();
//if (!isset($_SESSION['id'])) {
   // header("location:login.html");
//}
?>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MSP| Schedule management</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <style>
            
            .error {
  color: #F00;
  background-color: #FFF;
}
        </style>

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <div id="wrapper">
            <?php
            include("template/top.php");
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Event</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="page-content">  


                    <?php
                    include('private/conn.php');
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
                                            
                                            <form role="form" method="POST" id="create_event_form" name="create_event_form" action="insertEvent.php">
                                                <div class="form-group">
                                                    <label>Event Name</label>
                                                    <input name="event_name" class="form-control" type="text">
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea  name="description" class="form-control" type="text" rows="6" cols="4"></textarea>
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
                                                    <input name="venue" class="form-control" type="text">
                                                </div>
                                                <div class="text-center">
                                                <button type="submit" id="btn_submit" class="btn btn-lg btn-primary">Submit Button</button>
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
 <?php
        include("template/bottomScripts.php");
        ?>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        
                    <script>

                        $('document').ready(function ()
                        {


                            /* validation */
                            $("#create_event_form").validate({
                                rules:
                                        {
                                            event_name: {
                                                required: true,
                                                minlength: 3
                                            },
                                            description: {
                                                
                                                required: true,
                                               

                                            },
                                            start_time: {
                                                required: true

                                            },
                                            end_time: {
                                                required: true

                                            },
                                            event_date: {
                                                required: true,
                                                   date: true

                                            },
                                            venue: {
                                                required: true
                                            }
                                        },
                                messages:
                                        {
                                            event_name:
                                            {
                                                required:"Event Name is required",
                                                minlength: "Event Name is required"
                                            },
                                            description: {
                                                required: "Please provide Event Description(Minimum 20 Chars)"
                                                
                                            },
                                            event_date: 
                                                    {
                                                        date:"Enter a Valid Date",
                                                        required: "Event Date is Required"
                                                    },
                                            start_time: {
                                                required: "Event start time is required"

                                            },
                                            end_time:
                                                    {
                                                        required: "Event ending time is required."

                                                    },
                                            venue: 
                                                  {
                                                      required:"Venue details are required."
                                            }
                                        },
                                submitHandler: submitForm
                            });
                            /* validation */
                            $.validator.addMethod("date", function(value, element) {
                                    var curDate = new Date();
                                    var inputDate = new Date(value);
                                    if (inputDate >= curDate)
                                        return true;
                                    return false;
                                }, "Invalid Date!");   // error message
                                $("#frm").validate({
                                    rules: {
                                        
                                    }
                                });

                            /* form submit */
                            function submitForm()
                            {
                                var data = $("#create_event_form").serialize();
                                
                                $.ajax({
                                    type: 'POST',
                                    url: 'insertEvent.php',
                                    data: data,
                                    beforeSend: function ()
                                    {
                                        $("#error").fadeOut();
                                        $("#btn_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Adding Event ...');
                                    },
                                    success: function (data)
                                    {
                                       if (data === "EventInserted")
                                        {

                                            $("#btn_submit").html('Signing Up');
                                            setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("template/successReg.php"); }); ', 5000);
                                            alert("Event Submitted Successfully");
                                            window.location.href = "./index.php";


                                        } else {

                                            $("#error").fadeIn(1000, function () {

                                                $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');

                                                $("#btn_submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                                            });

                                        }
                                    }
                                });
                                return false;
                            }
                            /* form submit */

                        });
                    </script>


                </div>
            </div>
        </div>
       <script>
                    function loadDoc(filename) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function () {
                            if (this.readyState === 4 && this.status === 200) {
                                document.getElementById("page-content").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "component/" + filename, true);
                        xhttp.send();
                    }
        </script>
    </body>
</html>
