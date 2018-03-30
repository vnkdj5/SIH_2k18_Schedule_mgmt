<!-- /.row --><div id="page-content">  
                  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo $_SESSION["userName"]; ?></h1>
                   <?php include_once("private/conn.php"); ?>
                </div>
                <!-- /.col-lg-12 -->
                </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $count=$db->get_var("SELECT count(*) FROM `create_event` where date = ".date('Y-m-d',strtotime('today'))." and host_id='$id' or event_id in (select event_id from guests where guest_id='$id')"); echo $count;?></div>
                                    <div>Today</div> 
                                </div>
                            </div>
                        </div>
                        <?php echo "<a href='index.php?f=EventCard&qs=todayschedule&d=".date("Y-m-d")."'>";?>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $count1=$db->get_var("SELECT count(*) FROM `create_event` where date = ".date("Y-m-d", strtotime("+1 day",  strtotime("today")))." and host_id='$id' or event_id in (select guests.event_id from guests,create_event where guest_id='$id' and date = ".date("Y-m-d", strtotime("+1 day",  strtotime("today")))." and create_event.event_id=guests.event_id)"); echo $count1;?></div>
                                    <div>Tomorrow</div>
                                </div>
                            </div>
                        </div>
                        <?php echo "<a href='index.php?f=EventCard&qs=tomorrowschedule&d=".date("Y-m-d",  strtotime("tomorrow"))."'>";?>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $count=$db->get_var("SELECT count(*) FROM `create_event` where date >= ".date('Y-m-d',strtotime('today'))."  and date <= ".date("Y-m-d", strtotime("+7 day",  strtotime("today")))." and host_id='$id' or event_id in (select event_id from guests where guest_id='$id')"); echo $count;?></div>
                                    <div>This Week</div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_GET['d'])){
                            echo "<a href='index.php?f=EventCard&qs=weekschedule&d=".$_GET['d']."'>";
                        }else{
                            echo "<a href='index.php?f=EventCard&qs=weekschedule&d=".date('y-m-d')."'>";
                        }
                        ?>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Calendar</div>
                                </div>
                            </div>
                        </div>
                        <?php echo "<a href='index.php?f=EventCard&qs=calenderschedule'>";?>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
            </div>
   
      
        <?php include 'EventCard.php';
 
        ?>
        

          
                    </div>

 <!-- /.row -->
            
    </div>