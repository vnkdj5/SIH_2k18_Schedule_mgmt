<?php

    session_start();
    //require_once('connect.php');
    require_once('private/conn.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
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


<?PHP            // Search.php
$event_id= $_SESSION["event_id"];
$results = 0;
$results1=0;
$sql_query = 0;
$results2=0;
$sql_query2 = 0;
$first_pos = 0;
?>
 <div id="#res1">
   <form  method="post" action="add_invites.php" >
       <input name="search_term" list="search_term" style="margin-left:25%;width:30%;height:5%;margin-top:8%;padding:5px;" >
         <datalist id="search_term">
            <option value="Ministry">
            <option value="Office Of Union Minister">
            <option value="Office Of Minister Of State">
            <option value="Office Of Secretary/CSI">
            <option value="Additional Secretary">
            <option value="Joint Secretary(Admin)">
            <option value="Administration Wing">
            <option value="Integrated Finance Division">
            <option value="PI Wing">
            <option value="Infrastructure and Project Monitoring Division">
            <option value="MPLADS">
            <option value="Twenty Point Programme">
        </datalist>
        <input name="search_button" type="submit" value="Search" style="height:5%;"> 
    </form>
       <!--<input name="search_term" type="text" style="margin-left:25%;width:30%;height:5%;margin-top:8%;padding:5px;" >
        <input name="search_button" type="submit" value="Search" style="height:5%;"> -->
   
<?php
 $sql1='SELECT `Name` , `office_name` , minister_info.Minister_ID , `designation_name` FROM `minister_info` INNER JOIN `designation` on minister_info.Minister_ID = designation.Minister_ID INNER JOIN `ministryoffice` on designation.Office_ID = ministryoffice.office_id AND minister_info.Minister_ID in ( SELECT `guest_id` from `guests` where guest_id=minister_info.Minister_id and event_id=\''.$event_id.'\' );';

         $sql_query1 =  $db->get_results($sql1);     
         $results1 =count($sql_query1);

  if($results1!=0)
  {
     echo '<center>';
     echo '<div class="row">';
               echo '<div class="col-lg-6" style="margin-left:25%;padding:5px;">';
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
            
            echo '<form style="padding-left:20px;" method="post" action="">';
              foreach ( $sql_query1 as $j )
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
            //<button type="button" class="btn btn-default">Default</button>
        echo '</table>';
        //echo '<br>';
        echo ' <button type="button" class="btn btn-default">Send-Update</button>';
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
    if(!isset($first_pos))
    {
        $first_pos = "0";
    }
   
      //initializing mysqli Quary  
    $select='SELECT `office_name` FROM `ministryoffice` WHERE MATCH(`office_name`) AGAINST(\''.$search_term.'\');';
    //echo $select;
    //echo "\n";
   
    $sql_query = $db->get_results($select);
    //additional check. Insurance method to re-search the database again in case of too many matches (too many matches cause returning of 0 results)
        if(!$sql_query)
            {
                // $results =$sql_query->num_rows;
                $sql = 'SELECT `Name` , `office_name` , minister_info.Minister_ID , `designation_name` FROM `minister_info` INNER JOIN `designation` on minister_info.Minister_ID = designation.Minister_ID INNER JOIN `ministryoffice` on designation.Office_ID= ministryoffice.office_id WHERE MATCH(`office_name`) AGAINST(\''.$search_term.'\') AND minister_info.Minister_ID not in ( SELECT `guest_id` from `guests` where guest_id=minister_info.Minister_id and event_id= \''.$event_id.'\') ;';
                //echo $sql;
                  echo "\n";
                  $sql_result_query = $db->get_results($sql);        
            }
        else
            {
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
                     //echo $sql;
                  $sql_query2 =  $db->get_results($sql2);     
                  $results2 =count($sql_query2);

              }
              catch(Exception $e)
              {
                ;
              }
            }
     
      //calculating the search time
   
}

if($results != 0)
{
  echo '<center>';
echo '<div class="row">';
               echo '<div class="col-lg-6" style="margin-left:25%;padding:5px;">';
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
          
 
            echo '<form style="padding-left:20px;" method="post" action="invitee.php">';
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
               echo '<div class="col-lg-6" style="margin-left:25%;padding:5px;">';
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
          
            
            echo '<form style="padding-left:20px;" method="post" action="invitee.php">';
             foreach ( $sql_query2 as $j )
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
 <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>

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