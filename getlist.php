<!DOCTYPE html>
<?php
require_once('private/conn.php');
global $event_id;
session_start();
include('mailsih3.php');
 
	{
		#echo "HEY";
		//$id = $_POST["id"];
		$event_id=$_GET["eventid"];
		$insert = 'SELECT * FROM `guests` where `event_id`=\''.$event_id.'\' ;';
		$res=$db->get_results($insert);	
		

		$b=array();
			
		for($x=0;$x<count($res);$x++){	
			echo "\nGues id".$res[$x]->guest_id;			
			$sql = 'select `Email_ID` from `minister_info` where `Minister_ID`= \''.$res[$x]->guest_id.'\'';
			$a=$db->get_row($sql);
			echo "\nemail id".$a->Email_ID;			
			array_push($b, $a->Email_ID);
			var_dump($a);
		}
		
		SendCode($b,$event_id);
                
		
		
?>
<script>
    location.href='updateEvent.php?cancel=1&eventid=<?php echo $event_id?>';
    </script>
    
<?php
		
	}		     
?>		
