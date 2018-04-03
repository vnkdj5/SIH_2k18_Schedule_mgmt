<!DOCTYPE html>
<?php
require_once('private/conn.php');
session_start();
include('mailsih2.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		#echo "HEY";
		$id = $_POST["id"];
		$event_id=$_GET["eventid"];
		//echo $event_id;
		
		$b=array();
			
		for($x=0;$x<count($id);$x++){	
		//echo "id; ".$id[$x];
			$sql = 'select `Email_ID` from `minister_info` where `minister_ID`= \''.$id[$x].'\'';
			$a=$db->get_row($sql);
			array_push($b, $a->Email_ID);
			var_dump($a);
		}
		
		SendCode($b,$event_id);
		
		//if($db->query($insert)) 
		//{
?>
			<script>
			window.alert("The Update has been sent to the invitees!! :)");		//Change this a bit
		    window.document.location.href="updateEvent.php?eventid='<?php echo $event_id?>'";</script>
			</script> 
<?php
		//}
	}		     
?>
