<?php	
	if(isset($_POST['delete_officer']))
	{
		$officer_email = filter_var($_POST['delete_officer']);
		$delete_registration = $db->query("DELETE FROM officer_info WHERE officer_email='$officer_email'");
		$delete_area=$db->query("DELETE FROM officer_work where officer_email='$officer_email'");
	}
?>
