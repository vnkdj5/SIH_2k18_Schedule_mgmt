<html>
    
    <head></head>
    <body>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$timestamp = strtotime('previous monday');
$days = array();
for ($i = 0; $i < 7; $i++) {
    //$days[] = strftime('%A', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
    //echo $days[$i];
    echo date('Y-m-d', $timestamp)."  ";
    //echo "hii";
}


?>
    </body>
</html>