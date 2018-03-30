<?php 
	require_once 'private/conn.php';
        session_start();
         $event_id=$_GET["eventid"];
?>

<?php
echo"sdf";
$a=$_POST['end_time'];
	#echo $a;
	$update = 'UPDATE `create_event` SET `description`=\''.$_POST['description'].'\' , `date`=\''.$_POST['event_date'].'\',`start_time`=\''.$_POST['start_time'].'\',`end_time`=\''.$a.'\',`category`=\''.$_POST['category'].'\',venue=\''.$_POST['venue'].'\' where `event_id`=\''.$event_id.'\';';
	#echo $update;
	$db->query($update);
?>

<html>
	<head> 
		<script> location.href='add_invites.php'</script>
	</head>
</html>
