<!DOCTYPE html>
<?php
require_once('private/conn.php');

session_start();
include('mailsih.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		#echo "HEY";
		$id = $_POST["id"];
		$event_id=$_SESSION["event_id"];
		
		for($x = 0; $x < count($id); $x++)
		$insert = 'INSERT INTO `guests` VALUES  (\''.$event_id.'\', \''.$id[$x].'\' , 0) ;';
		
		$b=array();
			
		for($x=0;$x<count($id);$x++){	
			$sql = 'select `Email_id` from `minister_info` where `minister_id`= \''.$id[$x].'\'';
			$a=$db->get_row($sql);
			array_push($b, $a->Email_id);
			var_dump($a);
		}
		
		SendCode($b,$event_id);
		
		if($db->query($insert)) 
		{
?>
			<script>
			window.alert("The mail has been sent!!:)");
		    //window.document.location.href="add_invites.php";
			</script> 
<?php
		}
	}		     
?>		
