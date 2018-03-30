<?php
      include('private/conn.php');
      $event_id=$_GET['eventid'];
?>

<html>
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



		<!-- Custom Fonts -->
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		    <link href="https://fonts.googleapis.com/css?family=Bubbler+One|Tangerine" rel="stylesheet">
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		    <style>


		    #res1{
		      width:80%;
		      background-color:#ffffff;
		      margin-left:30%;

		    }

		    #res{
		     
		      padding:5px;
		      float:left;
		      width:15%;
		      height:35%;
		      list-style-type: none;

		    }
		    #navi{
		    background-color: #000000;
		    overflow:hidden;
		    list-style-type: none;
		    color:#ffffff;
		    margin:0;
		    padding: 0;
		  }

		  #navi1{
		    float:right;
		    padding: 15px;
		  }

		  #navi2{
		    color:#ffffff;
		    display:block;
		    text-decoration: none;
		  }

		  #navi1:hover{
			background-color: #cc0000;
		  }
		    </style>		
		
	</head>	





	
    <body>

        <div id="wrapper">
            <?php
	include("template/top.php");
?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Update Event</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="page-content">  
<?php 
      $sql="select * from create_event where event_id='$event_id'";
      $ans=$db->get_row($sql);
      
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
                                            
                                            <form role="form" method="POST" id="create_event_form" name="create_event_form" action="updateInDb.php?eventid=<?php echo $event_id;?>">
                                                <div class="form-group">
                                                    <label>Event Name</label>
                                                    <input name="event_name" class="form-control" type="text" value="<?php echo $ans->title;?>" disabled>
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea  name="description" class="form-control" type="text" rows="6" cols="4"><?php echo $ans->description;?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input  name="event_date" id="d" class="form-control" type="date" data-provide="datepicker" value="<?php echo $ans->date;?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <div class="input-group clockpicker">
                                                        <input name="start_time" type="time" class="form-control" value="<?php echo $ans->start_time;?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>                                            
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <div class="input-group clockpicker">
                                                        <input name="end_time" type="time" class="form-control" value="<?php echo $ans->end_time;?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>                                            
                                                </div>


                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select name="category" class="form-control" <?php echo $ans->category;?>>
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
                                                    <input name="venue" class="form-control" type="text" value="<?php echo $ans->venue;?>">
                                                </div>
                                                
                                                <!--KOMAL-->

		       <!--<input name="search_term" type="text" style="margin-left:25%;width:30%;height:5%;margin-top:8%;padding:5px;" >
			<input name="search_button" type="submit" value="Search" style="height:5%;"> -->
						
                                                <div class="text-center">
                                                <button type="submit" id="btn_submit" class="btn btn-lg btn-primary">Update Button</button>
                                                </div>
                                            </form>
                                                                                            <div id="#res1">
		 					<b>Select Ministry</b><br>
		   					<form  method="post" action="">
		       					<input name="search_term" list="search_term" class="form-control" ><br>
			 				<datalist id="search_term">
			    				<option value="Ministry">
			    				<option value="Department of Programme Implementation ">
			    				<option value="National Sample Survey Organisation(NSSO)">
			    				<option value="Central Statistical Organisation">
			    				<option value="Field Operations Division (FOD)">
			    				<option value="Survey Design and Research Division (SDRD) ">
			    				<option value="National Accounts Division (NAD)">
			    				<option value="Industrial Statistics Division (ISD)">
			    
							</datalist>
							
			<input name="search_button" type="submit" value="Search" style="height:5%;"> 
		    </form>
		    </div>
                                            
                                            
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
                 
            <?PHP            // Search.php
		
		$results = 0;
		$results1=0;
		$sql_query = 0;
		$results2=0;
		$sql_query2 = 0;
		$first_pos = 0;
		?>
		<!--<?php echo $_GET['eventid']?>-->
		
		   
		<?php
		 $sql1='SELECT `Name` , `office_name` , minister_info.Minister_ID , `designation_name` FROM `minister_info` INNER JOIN `designation` on minister_info.Minister_ID = designation.Minister_ID INNER JOIN `ministryoffice` on designation.Office_ID = ministryoffice.office_id AND minister_info.Minister_ID in ( SELECT `guest_id` from `guests` where guest_id=minister_info.Minister_id and event_id=\''.$event_id.'\' );';

			 $sql_query1 =  $db->get_results($sql1);     
			 $results1 =count($sql_query1);

		  if($results1!=0)
		  {
		     echo '<center>';
		     echo '<div class="row">';
			       echo '<div class="col-lg-12" >';
				   echo '<div class="panel panel-default">';
				      echo '<div class="panel-heading">';
				           echo '<h4><b>List Of Invitees</b></h4>';
				        echo '</div>';
				        echo '<div class="panel-body">';
				        echo '<div class="table-responsive">';
		       
			    echo '<table class="table table-striped table-bordered table-hover">';          
				echo '<tr>';
				    echo '<th>Sr_no</th>';
				    echo '<th>Minister_ID</th>';
				    echo '<th>Minister_Name</th>';
				    echo '<th>Designation</th>';
				    echo '<th>Office_Name</th>';
				    echo '<th>Send_Updates</th>';
				echo '</tr>';
			$i = 1;
			    ?>
			    <form style="padding-left:20px;" method="post" action="sendUpdate.php?eventid=<?php echo $event_id;?>">;
			    <?php  foreach ( $sql_query1 as $j )
			   {
			       echo "<tr>";
				    echo "<td>",$i,"</td>";
				    echo "<td>",$j->Minister_ID,"</td>";
				    echo "<td>",$j->Name,"</td>";
				    echo "<td>",$j->designation_name,"</td>";
				    echo "<td>",$j->office_name,"</td>";
				    echo '<td><input type="checkbox" name="id[]" value="'.$j->Minister_ID.'"checked /></td>';

				 echo "</tr>";
				$i = $i + 1;
			    
			  }
			    //<button type="button" class="btn btn-default">Default</button>
			echo '</table>';
			//echo '<br>';
			echo ' <button type="submit" class="btn btn-default">Send-Update</button>';
			    echo '</form>'; 
		       
			  echo'</div>';
				           // <!-- /.table-responsive -->
				        echo '</div>';
				        //<!-- /.panel-body -->
				    echo '</div>';
				        //<!-- /.panel -->
			       echo '</div>';
				echo '</center>'; 
		  } 
		if(isset($_POST['search_button']))
		{
		      $search_term = $_POST['search_term'];
		      echo $search_term;
			
			
			    
				try
				{
				  $date_beg='SELECT create_event.start_time from `create_event` where event_id=\''.$event_id.'\';';
				  $s1=$db->get_row($date_beg);
				  //echo $s1->start_time;
				  $date_end='SELECT create_event.end_time from `create_event` where event_id=\''.$event_id.'\';';
				  $s2=$db->get_row($date_end);
				  //echo $s2->end_time;
				  $date='SELECT  create_event.date from `create_event` where event_id=\''.$event_id.'\';';
				  $s3=$db->get_row($date);
				  //echo $s3->date;
				  $sql = 'SELECT `Name` , `office_name` , minister_info.Minister_ID , `designation_name` FROM `minister_info` INNER JOIN `designation` on minister_info.Minister_ID = designation.Minister_ID INNER JOIN `ministryoffice` on designation.Office_ID = ministryoffice.office_id WHERE `office_name`   = \''.$search_term.'\' AND minister_info.Minister_ID not in ( SELECT `guest_id` from `guests` where guest_id=minister_info.Minister_id and event_id= \''.$event_id.'\') AND minister_info.Minister_ID not in(SELECT `guest_id` from `guests` as gi inner join `create_event` as ce on gi.event_id=ce.event_id where ce.date = \''.$s3->date.'\' AND ( ce.start_time between  \''.$s1->start_time.'\' and  \''.$s2->end_time.'\' ) AND ( ce.end_time between \''.$s1->start_time.'\' and \''.$s2->end_time.'\' ) );';
				     //echo $sql;
				  $sql_query =  $db->get_results($sql);     
				  $results =count($sql_query);

				 
				 $sql2 = 'SELECT `Name` , `office_name` , minister_info.Minister_ID , `designation_name` FROM `minister_info` INNER JOIN `designation` on minister_info.Minister_ID = designation.Minister_ID INNER JOIN `ministryoffice` on designation.Office_ID = ministryoffice.office_id WHERE `office_name`   = \''.$search_term.'\' AND minister_info.Minister_ID not in ( SELECT `guest_id` from `guests` where guest_id=minister_info.Minister_id and event_id= \''.$event_id.'\') AND minister_info.Minister_ID  in(SELECT `guest_id` from `guests` as gi inner join `create_event` as ce on gi.event_id=ce.event_id where ce.date = \''.$s3->date.'\' AND ( ce.start_time between  \''.$s1->start_time.'\' and  \''.$s2->end_time.'\' ) AND ( ce.end_time between \''.$s1->start_time.'\' and \''.$s2->end_time.'\' ) );';
				    // echo $sql;
				  $sql_query2 =  $db->get_results($sql2);     
				  $results2 =count($sql_query2);

			      }
			      catch(Exception $e)
			      {
				;
			      }
			    
		     
		      //calculating the search time
		   
		}

		if($results != 0)
		{
		  echo '<center>';
		echo '<div class="row">';
			       echo '<div class="col-lg-12">';
				   echo '<div class="panel panel-default">';
				      echo '<div class="panel-heading">';
				          ?>
				        <h4><b>List Of Officers who are available in <?PHP echo $search_term; ?></b></h4>
				        <?php
				        echo '</div>';
				        echo '<div class="panel-body">';
				        echo '<div class="table-responsive">';
			    
			    echo '<table class="table table-striped table-bordered table-hover">';          
				echo '<tr>';
				     echo '<th>Sr_no</th>';
				    echo '<th>Minister_ID</th>';
				     echo '<th>Minister_Name</th>';
				    echo '<th>Designation</th>';
				    echo '<th>Office_Name</th>';
				    echo '<th>Invitee</th>';
				echo '</tr>';
			$i = 1;
			    //echo '<script>window.alert("'.$resultCheck.' row(s) fetched");</script>';
			  ?>
		 
			    <form style="padding-left:20px;" method="post" action="invitee.php?eventid=<?php echo $event_id?>">';
			    <?php
			     foreach ( $sql_query as $j )
			   {
			       echo "<tr>";
				    echo "<td>",$i,"</td>";
				    echo "<td>",$j->Minister_ID,"</td>";
				    echo "<td>",$j->Name,"</td>";
				    echo "<td>",$j->designation_name,"</td>";
				    echo "<td>",$j->office_name,"</td>";
				    echo '<td><input type="checkbox" name="id[]" value="'.$j->Minister_ID.'"/></td>';
				 echo "</tr>";
				$i = $i + 1;
			    
			  }
			echo '</table>';
			echo '<button type="submit" class="btn btn-default">Send Invitation</button>';
			    echo '</form>'; 
		      
			echo'</div>';
				           // <!-- /.table-responsive -->
				        echo '</div>';
				        //<!-- /.panel-body -->
				    echo '</div>';
				        //<!-- /.panel -->
			       echo '</div>';
			 echo '</center>';
		}
		//if nothing is found then displays a form and a message that there are nor results for the specified term
		elseif($sql_query)     
		{
		?>
			<h1 style="text-align:center; font-family:'Tangerine', cursive;margin-top:4%;">Oops!!! There are no officers who are available in <?PHP echo $search_term; ?><br>or you might already sent the invitation!!</h1>
			</div>
		<?PHP
		}
		 
		 if($results2 != 0)
		{
		  echo '<center>';
		echo '<div class="row">';
			       echo '<div class="col-lg-12" >';
				   echo '<div class="panel panel-default">';
				      echo '<div class="panel-heading">';
				          ?>
				        <h4><b>List Of Officers who are busy in <?PHP echo $search_term; ?></b></h4>
				        <?php
				        echo '</div>';
				        echo '<div class="panel-body">';
				        echo '<div class="table-responsive">';
			    
			    echo '<table class="table table-striped table-bordered table-hover">';          
				echo '<tr>';
				     echo '<th>Sr_no</th>';
				    echo '<th>Minister_ID</th>';
				     echo '<th>Minister_Name</th>';
				    echo '<th>Designation</th>';
				    echo '<th>Office_Name</th>';
				    echo '<th>Invitee</th>';
				echo '</tr>';
			$i = 1;
			    //echo '<script>window.alert("'.$resultCheck.' row(s) fetched");</script>';
			  
			    ?>
			    <form style="padding-left:20px;" method="post" action="invitee.php?'eventid=<?php echo $event_id?>">
			     <?php foreach ( $sql_query2 as $j )
			   {
			       echo "<tr>";
				    echo "<td>",$i,"</td>";
				    echo "<td>",$j->Minister_ID,"</td>";
				    echo "<td>",$j->Name,"</td>";
				    echo "<td>",$j->designation_name,"</td>";
				    echo "<td>",$j->office_name,"</td>";
				    echo '<td><input type="checkbox" name="id[]" value="'.$j->Minister_ID.'"/></td>';

				 echo "</tr>";
				$i = $i + 1;
			    
			  }
			echo '</table>';
			echo '<button type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>';
			    echo '</form>'; 
		      
			echo'</div>';
				           // <!-- /.table-responsive -->
				        echo '</div>';
				        //<!-- /.panel-body -->
				    echo '</div>';
				        //<!-- /.panel -->
			       echo '</div>';
			 echo '</center>';
		}
		//if nothing is found then displays a form and a message that there are nor results for the specified term
		elseif($sql_query2)     
		{
		?>
			<h1 style="text-align:center; font-family:'Tangerine', cursive;margin-top:4%;">There are no officers who are busy in <?PHP echo $search_term; ?></h1>
			</div>
		<?PHP
		}
		 
		?>
		
		</div>
            </div>
		 <?php
	include("template/bottomScripts.php");
?>
		    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
		    <script>
		    $(document).ready(function() {
			$('#dataTables-example').DataTable({
			    responsive: true
			});
		    });
		    </script>
			    

		
	</body>
</html>
