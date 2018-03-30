<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:login.html");
}
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

        <!-- Morris Charts CSS -->
        <link href="vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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
                        <h1 class="page-header">Reports</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="page-content">  

                    <?php
                    include('private/conn.php');
                    ?>
                    <form role="form" method="POST" class="form-inline" style="margin-bottom: 20px;">
                        <div class="form-group col-sm-4">
                            <label for="startDate" style="margin-right: 10%;">Start Date: </label>
                            <input name="startDate" type="date"class="form-control">
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="endDate" style="margin-right: 10%;">End Date:</label>
                            <input name="endDate" type="date" class="form-control">
                        </div>

                        <button type="submit" name="searchCriteria" class="btn btn-primary">Search</button>
                    </form>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="panel panel-default">
                                <div class="panel-heading" id="load123">
                                    <b>  Generate Event Report</b>

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
                                            if (isset($_POST["searchCriteria"])) {
                                                $startDate = $_POST["startDate"];
                                                $endDate = $_POST["endDate"];
                                                $result = $db->get_results("SELECT * FROM `create_event` where date >= '$startDate' and date<='$endDate'");
                                            } else {
                                                $result = $db->get_results("select * from create_event;");
                                            }

#
                                            $count = 1;
                                            if (isset($result)) {
                                                foreach ($result as $row) {
                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $row->title; ?></td>

                                                        <td><?php echo $row->description; ?></td>
                                                        <td class="center"><?php echo $row->date; ?></td>
                                                        <td class="center"><?php echo date('H:i:s', strtotime($row->start_time)); ?></td>
                                                        <td class="center"><?php echo date('H:i:s', strtotime($row->end_time)); ?></td>
                                                        <td class="center"><?php echo $row->venue; ?></td>
                                                    </tr>
        <?php
        $count=$count+1;
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

                </div>
            </div>
        </div>

<?php
include("template/bottomScripts.php");
?>
        <script>
            function loadDoc(filename) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("page-content").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "component/" + filename, true);
                xhttp.send();
            }
        </script>
        <!-- DataTables JavaScript -->


        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'copy',
                            text: 'Copy',
                            className: "btn btn-primary",
                        }, {
                            extend: 'csv',
                            text: 'CSV',
                            className: "btn btn-primary",
                        }, {
                            extend: 'excel',
                            text: 'Excel',
                            className: "btn btn-primary",
                        },
                        {
                            extend: 'pdf',
                            text: 'Save AS PDF',
                            className: "btn btn-primary",
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            className: "btn btn-primary"
                        }
                    ]
                });
            });


        </script>


        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    </body>
</html>
