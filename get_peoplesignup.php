<?php
require_once('private/conn.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		//echo $id;
	$stmt = $db->get_results("SELECT designation_name FROM designation WHERE Office_ID IN (SELECT office_id FROM ministryoffice WHERE office_name = '$id')");
	#$stmt->execute(array(':id' => $id));
	?>
	<option selected="selected">Select:</option>
	<?php
	foreach($stmt as $row)
	{
		?>
        	<option value="<?php echo $row->designation_name; ?>
"> 
			<?php echo $row->designation_name; ?>
			</option>
        <?php
	}	
}
?>

