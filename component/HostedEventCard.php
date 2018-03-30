<!--
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    
    <link href="./vendor/morrisjs/morris.css" rel="stylesheet">

    
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
-->
<?php
$date = '';
if (isset($_GET['d'])) {
    $date = date('Y-m-d', strtotime($_GET['d']));
} else {
    $date = date('Y-m-d');
}
?>
<div class="row">
    <div class="col-lg-8">
        <h1 class="page-header">My Events</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label>
                    Confirmed List
                </label>
                <div style="float: right">
                    <form role="form" method="POST" class="form-inline">
                        <div class="form-group col-sm-4">
<?php echo "<input name='startDate' type='date' onchange='window.location=\"engagement.php?f=MyEventCard&d=\"+this.value' class='form-control' value=" . $date . ">"; ?>
                        </div>

                    </form>
                </div>
            </div>
            <div class="panel-body">
                <div class="panel-group" id="accordion">
<?php
if (!isset($_SESSION)) {
    session_start();
    include_once '../private/conn.php';
}
$id = $_SESSION['id'];
$events = $db->get_results("(SELECT * FROM create_event WHERE host_id='" . $id . "'  and date = '" . $date . "') union (SELECT * FROM create_event WHERE event_id in (SELECT event_id FROM guests WHERE guest_id='" . $id . "' AND Status = 2) and date = '" . $date . "') order by start_time");
$cards = 0;
if ($events == NULL) {
    echo 'No events confirmed today';
} else {
    foreach ($events as $event) {
        ?> 
                            <div class="row" style="padding: 5px">
                                <div class="col-lg-12">
                                    <div class="col-sm-12 col-lg-12"> 
                                        <font size="4">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" style="height: 50px;">

                                                <h4 class="panel-title" style="font-size: 25px">
        <?php echo "<a data-toggle='collapse' data-parent='#accordion' href='#card" . $cards . "'>" . $event->title . "</a>"; ?>
                                                </h4>

                                            </div>
        <?php
        if ($cards == 0) {
            echo "<div id='card" . $cards . "' class='panel-collapse collapse in'>";
        } else {
            echo "<div id='card" . $cards . "' class='panel-collapse collapse in'>";
        }
        $cards = $cards + 1;
        ?>
                                            <div class="panel-body" >
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="col-xs-6">
                                                        Venue
                                                    </div>
                                                    <div class="col-xs-6">
        <?php echo $event->venue; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="col-xs-6">
                                                        Date
                                                    </div>
                                                    <div class="col-xs-6">
        <?php echo $event->date; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12" >
                                                    <div class="col-xs-6">
                                                        Start Time 
                                                    </div>
                                                    <div class="col-xs-6">
        <?php echo $event->start_time; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="col-xs-6">
                                                        End Time
                                                    </div>
                                                    <div class="col-xs-6">
        <?php echo $event->end_time; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="col-xs-6">
                                                        Description
                                                    </div>
                                                    <div class="col-xs-6">
        <?php echo $event->description; ?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="panel-footer" style="height:70px;">
                                            <div class="col-sm-12">
                                                <div class="col-xs-0 col-md-4" style="padding-left: 10%">

                                                </div>
                                                <div class="col-xs-0 col-md-4" style="padding-left: 10%">

                                                </div>  
                                                <div class="col-xs-8 col-md-4" style="width:130%;">
                                                    <?php echo "<a href='updateEvent.php?eventid=" . $event->event_id . "'>"; ?><button type="button" class="button  red"><i class="fa fa-key">Manage Event</i>
                                            </button></a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </font>
                                </div>

                            </div>
                        </div>
    <?php }
} ?>
            </div>
        </div>
    </div>
</div>
</div>
<!--
</body>
</html>
-->