<!DOCTYPE html>
<?php
require_once('private/conn.php');
session_start();
include('mailsih.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		#echo "HEY";
		$id = $_POST["id"];
		$event_id=$_GET["eventid"];
		
		for($x = 0; $x < count($id); $x++){
                    $insert = 'INSERT INTO `guests` VALUES  (\''.$event_id.'\', \''.$id[$x].'\' , 0,0) ;';
		$db->query($insert);
                }
		$b=array();
			
		for($x=0;$x<count($id);$x++){	
			$sql = 'select `Email_ID` from `minister_info` where `Minister_ID`= \''.$id[$x].'\'';
			$a=$db->get_row($sql);
			array_push($b, $a->Email_ID);
			var_dump($a);
		}
		
		SendCode($b,$event_id);
              
?>
			<script>
			window.alert("The mail has been sent!!:)");
                     window.location.href="updateEvent.php?eventid=<?php echo $event_id;?>";
			</script> 
<?php
		
	}	
        
?>
