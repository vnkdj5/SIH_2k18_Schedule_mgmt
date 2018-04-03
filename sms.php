<?php

include('way2sms-api.php');
require_once('connect.php');
$curDate = date('Y-m-d', time());
$querry = "SELECT m.Contact, m.Name,c.title from minister_info as m , create_event as c ,guests as g WHERE c.date='$curDate' AND g.event_id=c.event_id AND g.guest_id=m.Minister_ID";
$results =$connect->query($querry);
//echo $querry;
#echo $query;
while ($value=$results->fetch_assoc()) {
    $msg = "Remainder: ".$value["Name"]." have event " . $value["title"]. " scheduled Today.";
    sendSMS($value["Contact"], $msg);
    #echo " MOBLE::   ".$value->Contact;
    sleep(1);
}
# echo $curDate;
#sendSMS('9890811301', 'YOOOO DJ');
#  echo "SMS Sent"
#$client->logout();
?>
