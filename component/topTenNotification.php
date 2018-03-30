<?php
	require_once('private/conn.php');
?>
<?php
	//$users=$db->get_results("SELECT * FROM `create_event` INNER JOIN guests ON create_event.event_id = guests.event_id WHERE guests.guest_id = 'M3105' AND //guests.Status IN ('1' OR '2') AND create_event.date >= date(now()) ");

$users=$db->get_results("SELECT * FROM `create_event` INNER JOIN guests ON create_event.event_id = guests.event_id WHERE guests.guest_id = 'M3105' AND (guests.Status = 1 OR guests.Status=2) AND create_event.date >= date(now()) ");


	
	
?>
<!--
<html>
	<head>
		   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

 
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

   
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]


	</head>
	<body>
-->
<div class="col-lg-3">
		<div class="col-lg-12" style="padding-left:1134px;">
                    <h1 class="page-header">Notifications</h1>
                </div>
		<div class="col-lg-6" style="padding-left:1134px;">
                    <div class="panel panel-default" style="width:364px;" >
                        <div class="panel-heading" style="width:364px;" >
                            Your Latest Events
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="width:364px;">
                            <div class="alert alert-success">
                               <?php 
						
						$var = sizeof($users);
						 if (0<$var){
							echo  "<a href='eventDetails.php?val=".$users[0]->event_id."' class='alert-link'>";
							echo $users[0]->title;
							echo $users[0]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
                            <div class="alert alert-info">
                                 <?php 
						$var = sizeof($users);
						 if (1<$var){
							echo  "<a href='eventDetails.php?val=".$users[1]->event_id."' class='alert-link'>";
							echo $users[1]->title;
							echo $users[1]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
                            <div class="alert alert-warning">
                                  <?php 
						$var = sizeof($users);
						 if (2<$var){
		                                       echo  "<a href='eventDetails.php?val=".$users[2]->event_id."' class='alert-link'>";
							echo $users[2]->title;
							echo $users[2]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
                            <div class="alert alert-danger">
                                  <?php 
						$var = sizeof($users);
						 if (3<$var){
							echo  "<a href='eventDetails.php?val=".$users[3]->event_id."' class='alert-link'>";
							echo $users[3]->title;
							echo $users[3]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
			    <div class="alert alert-success">
                                 <?php  
						$var = sizeof($users);
						 if (4<$var){
							echo "<a href='eventDetails.php?val=".$users[4]->event_id."' class='alert-link'>";
							echo $users[4]->title;
							echo $users[4]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
			    <div class="alert alert-info">
                                  <?php
						$var = sizeof($users);
						 if (5<$var){
							echo "<a href='eventDetails.php?val=".$users[5]->event_id."' class='alert-link'>";
							echo $users[5]->title;
							echo $users[5]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
                            <div class="alert alert-warning">
                                  <?php
						$var = sizeof($users);
						 if (6<$var){
							echo "<a href='eventDetails.php?val=".$users[6]->event_id."' class='alert-link'>";
							echo $users[6]->title;
							echo $users[6]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
                            <div class="alert alert-danger">
                                <?php
						$var = sizeof($users);
						 if (7<$var){
							echo "<a href='eventDetails.php?val=".$users[7]->event_id."' class='alert-link'>";
							echo $users[7]->title;
							echo $users[7]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
			    <div class="alert alert-success">
                                 <?php
						$var = sizeof($users);
						 if (8<$var){
							echo "<a href='eventDetails.php?val=".$users[8]->event_id."' class='alert-link'>";
							echo $users[8]->title;
							echo $users[8]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
			    <div class="alert alert-info">
                                <?php
						$var = sizeof($users);
						 if (9<$var){
							echo "<a href='eventDetails.php?val=".$users[9]->event_id."' class='alert-link'>";
							echo $users[9]->title;
							echo $users[9]->date;
					 	 }
						else
						{
						echo 'No Events Planned';
						}
  				?></a>.
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
</div>
<!--		
	</body>
</html>-->