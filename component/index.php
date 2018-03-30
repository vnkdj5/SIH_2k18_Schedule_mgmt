<?php
$conn = new mysqli("192.168.43.129", "root", "", "schedule_mgmt");
echo 'HIee';
if(isset($_GET[param]))
{

$title =$_POST['title'];
$description =$_POST['description'];
$date=$_POST['date'];
$starttime =$_POST['starttime'];
$endtime =$_POST['endtime'];
$category =$_POST['category'];
$venue="";
$sendto='';
$eventid=1004;
$hostid='kajal1';

$sql1= 'INSERT into  `create_event` values ('.$eventid.',\''.$hostid.'\',\''.$title.'\',\''.$description.'\',\''.$date.'\',\''.$starttime.'\',\''.$endtime.'\',\''.$category.'\',\''.$venue.'\');';
echo $sql1;
mysqli_query($conn,$sql1);

}

?>
