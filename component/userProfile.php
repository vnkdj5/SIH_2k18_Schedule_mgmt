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
//$id = 'M3105';
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

if(isset($_POST["removeministry"]))
{
$db->query("DELETE FROM Accessibility where access_id='".$id."' and grant_id =  '".$_POST['removeministry']."'");
}
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
$_SESSION["userPicture"]=$db->get_var("Select Picture from minister_info WHERE Minister_ID = '".$id."'");
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


<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grant Access To
                        </div>
                        <div class="panel-body">
      

<?php




if(isset($_GET["ShowDescription"]))
{


$res = $db->get_row("SELECT Minister_ID FROM `designation` WHERE designation_name='".$_GET["people"]."' AND Office_ID IN (SELECT office_id FROM ministryoffice WHERE 
office_name = '".$_GET["ministry"]."')");
$var = $db->get_row("SELECT * FROM Accessibility where access_id = '".$id."' and grant_id = '".$res->Minister_ID."'");
if($var==NULL)
{$db->query("INSERT INTO Accessibility VALUES ('".$id."','".$res->Minister_ID."',1)");}
else
{$db->query("UPDATE Accessibility set description = 1 where access_id = '".$id."' and grant_id = '".$res->Minister_ID."'");}
}



else
{
if(isset($_GET["ministry"]))
{
$res = $db->get_row("SELECT Minister_ID FROM `designation` WHERE designation_name='".$_GET["people"]."' AND Office_ID IN (SELECT office_id FROM ministryoffice WHERE office_name = '".$_GET["ministry"]."')");

$var = $db->get_row("SELECT * FROM Accessibility where access_id = '".$id."' and grant_id = '".$res->Minister_ID."'");
if($var==NULL)
{$db->query("INSERT INTO Accessibility VALUES ('".$id."','".$res->Minister_ID."',0)");}
else
{$db->query("UPDATE Accessibility set description = 0 where access_id = '".$id."' and grant_id = '".$res->Minister_ID."'");}
}
}
?>
                      
<form action = "Profile.php" method= "GET">
 <label>Search Ministry:</label> 
    <select name="ministry" class="ministry">
    <option selected="selected">--Select wing--</option>
    <?php
        $stmt = $db->get_results("SELECT office_name FROM ministryoffice");
        
echo $stmt;
        foreach($stmt as $row)
        {
    ?>
    <option value="<?php echo $row->office_name; ?>"><?php echo $row->office_name; ?></option>
    <?php
        } 
    ?>
    </select>
    <label>People:</label> 
    <select name="people" class="people">
        <option selected="selected">--Select--</option>
    </select>
    <img src="ajax-loader.gif" id="loding1"></img>
<input type = "checkbox" value = "ShowDescription" name = "ShowDescription"/>Show Description
    <input type = "submit" value = "Go"/>

</form>
                        </div>
                        <div class="panel-footer">
                          Accessibility Given To


 <div class="table-responsive">
<?php
$res1 = $db->get_Results("Select * from minister_info inner join Accessibility on minister_info.Minister_ID =  Accessibility.grant_id where access_id = '".$id."'  ");
?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Granted_To</th>
                                            <th>Description_Permission</th>
                    
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

$i = 0;
foreach($res1 as $user)
{
echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$user->Name.'</td>
                                            <td>'.$user->description.'</td>
                                           
                                        </tr>';
$i = $i+1;
}?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->




 <form role="form" method="POST" class="form-inline" style="margin-bottom: 20px;">
			    <label>Remove Access For:</label> 
    <select name="removeministry" class="ministry">
    <option selected="selected">--Select--</option>
    <?php
        $stmt = $db->get_results("SELECT * FROM Accessibility WHERE access_id = '".$id."'");
        

        foreach($stmt as $row)
        {
$result3 = $db->get_row('SELECT * FROM minister_info where Minister_ID= \''.$row->grant_id.'\'');

$result2 = $db->get_row('SELECT * FROM ministryoffice where office_id= \''.$result3->Office_ID.'\'');
$result1 = $db->get_row('SELECT * FROM designation where office_id= \''.$result3->Office_ID.'\' AND Minister_ID= \''.$row->access_id.'\'');
$temp1 = $_POST["ministry"];
if($temp1!=NULL && $temp1== $result3->Minister_ID ."&". $row->description){
    ?>
    <option value="<?php echo $result3->Minister_ID ; ?>" selected><?php echo $result3->Name ."-".  $result2->office_name ."-". $result1->designation_name; ?></option>
    <?php
	
        } 
else{

?>
    <option value="<?php echo $result3->Minister_ID ; ?>" ><?php echo $result3->Name ."-".  $result2->office_name ."-". $result1->designation_name; ?></option>
    <?php
}
}
    ?>
    </select>
    <input type = "submit" value="remove"/>

</form>


                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->




 
</div>

</div>
</div>

<?php } ?>
<p align="center"><a href="index.php"></a></p>

<br/>

</BODY>
</HTML>

