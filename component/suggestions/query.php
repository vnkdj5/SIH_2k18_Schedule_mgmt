<?php	
	if(isset($_POST['delete_complaints']))
	{
		$complaint_id = filter_var($_POST['delete_complaints']);
		$delete_delete_suggestion = $db->query("DELETE FROM complaints WHERE complaint_id='$complaint_id'");
	}
?>