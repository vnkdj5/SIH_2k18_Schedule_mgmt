<!DOCTYPE html>
<!--
<HTML>
<HEAD>


 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

   
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

 
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</HEAD>

<BODY>
-->
<?php


require_once('private/conn.php');
$id=$_SESSION["id"];
//$id = 'surbhi1';
$result3 = $db->get_row('SELECT * FROM minister_info where Minister_ID= \''.$id.'\'');
$result2 = $db->get_row('SELECT * FROM designation where Minister_ID= \''.$id.'\'');
$result1 = $db->get_row('SELECT * FROM ministryoffice WHERE office_id IN (SELECT Office_ID from designation WHERE Minister_ID = \''.$id.'\')');


error_reporting(0);
if(isset($result3))
{ 
$name=$result3->Name;
$picture=$result3->Picture;
$ministry=$result1->office_name;
$design=$result2->designation_name;
$emailId=$result3->Email_ID;
$contact=$result3->Contact;
$ministerId=$result3->Minister_ID;
error_reporting(1);
?>



<h1 style="padding-left:400px"><u>YOUR PROFILE INFORMATION</u></h1><br><br><br>


<div class="panel-body">
      <div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
  <tbody>
<tr>
      <td width="30%" style="text-align:center;font-size:24px"><strong><?php echo $name ?></strong></td>
      <td colspan="2" style="text-align:center;font-size:24px"><strong><?php echo $ministry ?></strong> </td>
    </tr>
 <tr>
      <td rowspan="5" style="text-align:center"><?php

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
$db->query("UPDATE minister_info SET Picture = '".$imgData."' WHERE Minister_ID = '".$id."'");
$_SESSION["userPicture"]=$imgData;
header( "location:userProfile.php" );
}}

 echo '<img width="194" height="243" class="profileImg"  alt="No Image Found" src="data:image/jpeg;base64,'.base64_encode($picture).'"/>';

   ?>

<div class="form-group" name="upload">
<form method="post" action="" enctype="multipart/form-data">
<button type='button' name="getImage" onclick="jsfunction()">Select image</button>
<input name = "userImage" id = "userImage" type="file" style="display:none" accept="image">
<input name = "Upload Now" id="UploadNow" type="submit" style="display:none" value="Upload Image" >
</form>
</div>
<script type="text/javascript"> 
function jsfunction()
{
document.getElementById('userImage').style.display= "block"; 
document.getElementById('UploadNow').style.display= "block"; 
}
</script>


</td>
      <td height="36" valign="top" style="font-size:24px"><div align="left">Party:</div></td>
    <td height="36" valign="top" style="font-size:24px"><?php echo $result3->Party; ?></td>
    </tr>
     <tr>
    <td height="36" valign="top" style="font-size:24px"><div align="left">Post:</div></td>
    <td height="36" valign="top" style="font-size:24px"><?php echo $design ?></td>
  </tr>
  <tr>
    <td height="36" valign="top" style="font-size:24px"><div align="left">Email_ID:</div></td>
    <td height="36" valign="top" style="font-size:24px"><?php echo $emailId ?></td>
  </tr>
  <tr>
    <td height="36" valign="top" style="font-size:24px"><div align="left">Contact:</div></td>
    <td height="36" valign="top" style="font-size:24px"><?php echo $contact ?></td>
  </tr>
  <tr>
    <td height="36" valign="top" style="font-size:24px"><div align="left">Minister_ID: </div></td>
    <td height="36" valign="top" style="font-size:24px"><?php echo $ministerId ?></td>
  </tr>

<tr>
  <td></td>
  <td style="font-size:24px">Place of Birth :</td>
  <td style="font-size:24px"><?php echo $result3->PlaceOfBirth;?></td>
</tr>
<tr>
  <td></td>
  <td style="font-size:24px">Date of Birth:</td>
  <td style="font-size:24px"><?php echo $result3->DateOfBirth;?></td>
</tr>
  </tbody>
</table>
</div>
</div>

<?php } ?>
<p align="center"><a href="index.php"></a></p>

<br/>
<!--
</BODY>
</HTML>
-->
