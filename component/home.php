<!-- /.row --><div id="page-content">  
                  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo $_SESSION["userName"]; ?></h1>
                    
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
                                    <div class="huge">5</div>
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
                                    <div class="huge">8</div>
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
                                    <div class="huge">30</div>
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
                                    <div class="huge">10</div>
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