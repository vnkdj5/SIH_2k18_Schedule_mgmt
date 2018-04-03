<?php 
	require_once 'private/conn.php';
?>

<?php
#echo"sdf";
$a=$_POST['end_time'];
	#echo $a;
	$update = 'UPDATE `create_event` SET `description`=\''.$_POST['description'].'\' , `date`=\''.$_POST['event_date'].'\',`start_time`=\''.$_POST['start_time'].'\',`end_time`=\''.$a.'\',`category`=\''.$_POST['category'].'\',venue=\''.$_POST['venue'].'\' where `event_id`=\''.$_GET['eventid'].'\';';
	#echo $update;
	$db->query($update);
?>

<html>
	<head>
		<script> window.location.href='updateEvent.php?eventid=<?php echo $_GET['eventid']?>'</script>
	</head>
</html>
