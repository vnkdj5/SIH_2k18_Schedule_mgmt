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
        <h1 class="page-header">All Events</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
            <label>
                All list
            </label>
            <div style="float: right">
                <form role="form" method="POST" class="form-inline">
                    <div class="form-group">
                        <?php echo "<input id='edate' name='startDate' type='date' onchange='changequery()' class='form-control' value=" . $date . ">"; ?>
                    </div>
                    <div class="form-group">
                        <select name="time" onchange="changequery()" id='etime'>
                            <option value='99'>All</option>
                         <?php
                        for($i=0;$i<24;$i=$i+1){
                            echo "<option value='".$i."'";
                            if(isset($_GET['t'])){
                                if($i==$_GET['t']){
                                    echo "selected";
                                }
                            }else{
                                if($i==1){
                                    echo "selected";
                                }
                            }
                            echo ">".$i."-".(($i+1)%24)."</option>";
                         }
                         ?>
                          </select>
                        Hrs.
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-body">
            <div class="panel-group" id="accordion">

                <?php
                //error_reporting(E_ERROR | E_PARSE);
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                    include_once '../private/conn.php';
                }

                $id = $_SESSION['id'];
                $events = NULL;
                $date = array();
                $qs = '';

                //$qs='calenderschedule';
                if(isset($_GET['t']) && $_GET['t']!=99){
                    $events = $db->get_results("SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='".$id."' and date='".$_GET['d']."' and start_time>='".date('H:i:s',mktime($_GET['t'],0,0,date("m"),date("d"),date("Y")))."' and start_time<'". date('H:i:s',mktime($_GET['t']+1,0,0,date("m"),date("d"),date("Y"))) ."' order by start_time,date");
                   
                }else{
                    $events = $db->get_results("SELECT * FROM create_event inner join guests on create_event.event_id = guests.event_id where guest_id='".$id."' and date='".$_GET['d']."' order by start_time,date");
                }
                $cards = 0;
                if($events==NULL){
                    echo "No engagements today!!";
                }else{
                foreach ($events as $event) {
                    ?>  


                    <div class="row" style="padding: 5px">
                        <div class="col-lg-12">
                            <div class="col-sm-12 col-lg-12">
                                <font size="4">
                                <div class="panel panel-primary">
                                    <!--heading-->
                                    <div class="panel-heading" style="height: 50px;">

                                        <h4 class="panel-title" style="font-size: 25px">
                                            <?php echo "<a data-toggle='collapse' data-parent='#accordion' href='#card" . $cards . "'>" . $event->title . "</a>"; ?>
                                        </h4>

                                    </div>
                                    <!--heading-->
                                    <?php
                                    if ($cards == 0) {
                                        echo "<div id='card" . $cards . "' class='panel-collapse collapse in'>";
                                    } else {
                                        echo "<div id='card" . $cards . "' class='panel-collapse collapse'>";
                                    }
                                    $cards = $cards + 1;
                                    ?>
                                    <!--body-->
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
                                    <!--body-->
                                </div>
                                <!--footer-->
                                <div class="panel-footer" style="height:50px;">
                                    <div class="col-sm-12">
                                        <div class="col-xs-4">
                                     <?php echo "<a href='".$_SESSION['currentpage'].".php?qs=".$qs."&d=".$_GET['d']."&f=EventCardEngagement&eventapproval=1&eventid=".$event->event_id."'> <button type='button' class='btn btn-success btn-rect btn-xl'"; if($event->Status==2){echo "style='border: 2px solid black; box-shadow: 3px 3px 5px black;'";} echo "><i class='fa fa-check'>Going</i>
                                     </button></a>";?>
                                 </div>
                                 <div class="col-xs-4">
                                     
                                     <?php echo "<a href='".$_SESSION['currentpage'].".php?qs=".$qs."&d=".$_GET['d']."&f=EventCardEngagement&eventinterested=1&eventid=".$event->event_id."'> <button type='button' class='btn btn-info btn-rect btn-xl'"; if($event->Status==1){echo "style='border: 2px solid black; box-shadow: 3px 3px 5px black;'";} echo "><i class='fa fa-star'>Interested</i>
                                     </button></a>";?>
                                 </div>  
                                 <div class="col-xs-4">
                                    
                                      <?php echo "<a href='".$_SESSION['currentpage'].".php?qs=".$qs."&d=".$_GET['d']."&f=EventCardEngagement&eventdisapprove=1&eventid=".$event->event_id."'> <button type='button' class='btn btn-warning btn-rect btn-xl'"; if($event->Status==0){echo "style='border: 2px solid black; box-shadow: 3px 3px 5px black;'";} echo "><i class='fa fa-times'>Not Interested</i>
                                     </button></a>";?>
                                </div>
                                    </div>
                                </div>
                                <!--footer-->
                            </div>
                            </font>
                        </div>
                    </div>
            </div>
          

<?php }}?>
    </div>
</div>
</div>
</div>
</div>

<!--
</body>
</html>
-->
    