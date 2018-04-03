<!--<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

        <meta name="author" content="">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

   
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

   
    <link href="./vendor/morrisjs/morris.css" rel="stylesheet">

   
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
-->
<div class="col-lg-8">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Events</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <?php
                error_reporting(E_ERROR | E_PARSE);
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                    include_once '../private/conn.php';
                }

                $id = $_SESSION['id'];
                $events = NULL;
                $date = array();
                $text = array();
                $qs = '';
                if ($_GET['qs'] == 'todayschedule') {
                    $date[0] = date("Y-m-d");
                    $text[0] = "Today";
                    $qs = 'todayschedule';
                    $events = $db->get_results("(SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='" . $id . "' and date='" . date('Y-m-d') . "') union (SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where host_id='" . $id . "' and date='" . date('Y-m-d') . "') order by start_time,date");
                } elseif ($_GET['qs'] == 'tomorrowschedule') {
                    $futureDate = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
                    $date[0] = date("Y-m-d", $futureDate);
                    $text[0] = "Tomorrow";
                    $qs = 'tomorrowschedule';
                    $events = $db->get_results("SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='" . $id . "' and date='" . date('Y-m-d', $futureDate) . "' order by start_time,date");
                } elseif ($_GET['qs'] == 'weekschedule') {

                    $mon = strtotime("previous monday");
                    $monf = date("Y-m-d", strtotime("next monday"));
                    $qs = 'weekschedule';
                    $k = 0;
                    $loaddate = '';
                    $text = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
                    $temp = date('Y-m-d', $mon);
                    for ($k = 0; $k < 7; $k = $k + 1) {
                        $date[$k] = $temp;

                        $mon = strtotime('+1 day', $mon);
                        $temp = date('Y-m-d', $mon);
                    }
                    if (isset($_GET['d'])) {
                        $loaddate[0] = $_GET['d'];
                    } else {
                        $loaddate[0] = date('Y-m-d');
                    }
                    $events = $db->get_results("SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='" . $id . "' and date='" . $loaddate[0] . "' order by start_time,date");
                    //$events = $db->get_results("(SELECT * FROM create_event WHERE date>='".$mon."' and date<'".$monf."' and event_id in (SELECT event_id FROM guests WHERE guest_id='".$id."')) order by start_time,date");
                } elseif ($_GET['qs'] == 'calenderschedule') {
                    echo $_GET['d'];
                    $qs = 'calenderschedule';
                    $events = $db->get_results("SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='" . $id . "' and date='" . $_GET['d'] . "' order by start_time,date");
                } else {
                    $qs = 'todayschedule';
                    $text[0] = "Today";
                    $date[0] = date('Y-m-d');
                    $events = $db->get_results("SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='" . $id . "' and date='" . date('Y-m-d') . "' order by start_time,date");
                }
                ?>
                <div class="panel-heading">

                    <?php
                    for ($i = 0; $i < count($date); $i = $i + 1) {

                        echo "<a href='index.php?qs=" . $qs . "&d=" . $date[$i] . "' style='padding:2px'>" . $text[$i] . "</a>";
                    }
                    ?>

                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <?php
                        $cards = 0;
                        if ($events == NULL) {
                            echo "No Engagements Today!!";
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
                                                    <div class="col-sm-12 col-xs-12" >
                                                        <div class="col-xs-6">
                                                            Date
                                                        </div>
                                                        <div class="col-xs-6">
        <?php echo $event->date; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="col-xs-6">
                                                            Start Time
                                                        </div>
                                                        <div class="col-xs-6">
        <?php echo date('H:i:s', strtotime($event->start_time)); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="col-xs-6">
                                                            End Time
                                                        </div>
                                                        <div class="col-xs-6">
        <?php echo date('H:i:s', strtotime($event->end_time)); ?>
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
                                                <div class="col-sm-12 row">
                                                    <div class="col-xs-5 col-md-4">
                                                        <?php echo "<a href='" . $_SESSION['currentpage'] . ".php?qs=" . $qs . "&d=" . $_GET['d'] . "&f=EventCard&eventapproval=1&eventid=" . $event->event_id . "'> <button type='button' class='button inverted green'";
                                                        if ($event->Status == 2) {
                                                            echo "style='border: 2px solid blue;background-color: #77b950;color: white;'";
                                                        } echo "><i class='fa fa-check'>Going</i>
                                     </button></a>"; ?>
                                                    </div>
                                                    <div class="col-xs-5 col-md-4">

        <?php echo "<a href='" . $_SESSION['currentpage'] . ".php?qs=" . $qs . "&d=" . $_GET['d'] . "&f=EventCard&eventinterested=1&eventid=" . $event->event_id . "'> <button type='button' class='button inverted blue'";
        if ($event->Status == 1) {
            echo "style='border: 2px solid blue;background-color: #78c6e1;color: white;'";
        } echo "><i class='fa fa-star'>Interested</i>
                                     </button></a>"; ?>
                                                    </div>  
                                                    <div class="col-xs-5 col-md-4">

                            <?php echo "<a href='" . $_SESSION['currentpage'] . ".php?qs=" . $qs . "&d=" . $_GET['d'] . "&f=EventCard&eventdisapprove=1&eventid=" . $event->event_id . "'> <button type='button' class='button inverted red'";
                            if ($event->Status == 0) {
                                echo "style='border: 2px solid blue;background-color: #f14852;color: white;'";
                            } echo "><i class='fa fa-times'>Not Interested</i>
                                     </button></a>"; ?>
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
</div>

<!--
</body>
</html>
-->