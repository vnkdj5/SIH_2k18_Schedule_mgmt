 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                            <?php /*
				error_reporting(0);	
					if($_GET['folder']=="events")
					{	
				?>	
                        <li><a href="index.php?folder=events&file=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
				<?php	
					}
                                        else
                                        {
                             * */?>
                               <?php  //         }
				?>
                        <li><a  href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li> 
                           	
                            
                        <li>
                            <a href="#" onclick="loadDoc('createEvent.php')"><i class=" glyphicon glyphicon-list "></i> My Events</a>
                        </li>
                        <li>
                            <a href="#" "><i class="glyphicon glyphicon-tasks"></i> Engagements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="engagement.php?f=EventCardEngagement">All Events</a>
                                </li>
                                <li>
                                    <a href="engagement.php?f=MyEventCard" >Confirmed Events</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="createEvent.php" onclick="loadDoc('form1.html')" ><i class="glyphicon glyphicon-plus"></i> Create Event</a>
                        </li>
                        <li>
                            <a href="generateReports.php"><i class="fa fa-edit fa-fw"></i> Generate Reports</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->