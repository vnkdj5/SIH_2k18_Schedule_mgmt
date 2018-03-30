<?php

include_once('private/conn.php');
session_start();
$user_id=$_SESSION["id"];
if($_POST)
{
    $event_name=$_POST["event_name"];
    $description=$_POST["description"];
    $event_date=$_POST["event_date"];
    $start_time=$_POST["start_time"];
    $end_time=$_POST["end_time"];
    $category=$_POST["category"];
    $event_id=uniqid('E',false);
   
    
    $venue=$_POST["venue"];
    
    #$results=$db->get_results("select * from student_info where studentEmail='$email'");
    
        $insertRes=$db->query("INSERT INTO `create_event`(`event_id`,`host_id`, `title`, `description`, `date`, `start_time`, `end_time`, `category`, `venue`)"
                . " VALUES ('$event_id','$user_id','$event_name','$description','$event_date','$start_time','$end_time','$category','$venue')");
        
        if($insertRes)
        {
            echo "EventInserted";
            ?>
            <script>
                alert("Event Inserted");
            window.location.href="updateEvent.php?eventid=<?php echo $event_id;?>";
            </script>
    <?php
        }
          else
            {
                echo "Query could not execute !";
            }
   
}
