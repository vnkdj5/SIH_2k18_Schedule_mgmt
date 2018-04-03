<?php
require_once('private/conn.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $db->get_results("SELECT designation_name,minister_info.Name FROM designation INNER JOIN minister_info ON designation.Minister_ID = minister_info.Minister_ID WHERE minister_info.Office_ID IN (SELECT office_id FROM ministryoffice WHERE office_name = '".$id."')");
	#$stmt->execute(array(':id' => $id));
	?>
	<option selected="selected">Select:</option>
	

	<?php
	foreach($stmt as $row)
	{
		?>
        	<option value="<?php echo $row->designation_name; ?>
"> 
			<?php echo $row->designation_name.'-'.$row->Name; ?>
			</option>
        <?php
	}	
}
?>

