<?php
      include('private/conn.php');
     session_start();
    if(isset($_SESSION["id"]))
    {
    	$id=$_SESSION["id"];
    }
      $event_id=$_GET['event_id'];
     // echo $event_id;
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
		
	</head>	





	
    <body>

        <div id="wrapper">
            <?php include("template/top.php");?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Of Guests</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>

    <?php
      $sql1='SELECT `Name` , `office_name` , minister_info.Minister_ID , `designation_name` FROM `minister_info` INNER JOIN `designation` on minister_info.Minister_ID = designation.Minister_ID INNER JOIN `ministryoffice` on designation.Office_ID = ministryoffice.office_id AND minister_info.Minister_ID in ( SELECT `guest_id` from `guests` where guest_id=minister_info.Minister_id and event_id=\''.$event_id.'\' );';

	$sql_query1 =  $db->get_results($sql1);

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
				    
				echo '</tr>';
			$i = 1;
			    ?>
			    <form style="padding-left:20px;">;
			<?php  foreach ( $sql_query1 as $j )
			   {
			       echo "<tr>";
				    echo "<td>",$i,"</td>";
				    echo "<td>",$j->Minister_ID,"</td>";
				    echo "<td>",$j->Name,"</td>";
				    echo "<td>",$j->designation_name,"</td>";
				    echo "<td>",$j->office_name,"</td>";
				  

				 echo "</tr>";
				$i = $i + 1;
			    
			  }
			  
			echo '</table>';
			    echo '</form>'; 
		       
			  echo'</div>';
				           // <!-- /.table-responsive -->
				        echo '</div>';
				        //<!-- /.panel-body -->
				    echo '</div>';
				        //<!-- /.panel -->
			       echo '</div>';
				echo '</center>'; 
?>
</body>
</html>