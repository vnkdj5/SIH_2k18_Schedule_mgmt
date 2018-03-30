<?php
#require_once "private/phpmailer/PHPMailerAutoload.php";
require_once 'private/phpmailer/class.phpmailer.php';
require_once 'private/conn.php'; 
function SendCode($email,$event_id){
global $db;
 

try {
 
      //$event = $_POST['event_id'];
        //$select='SELECT `Name` from `minister_info` where `Minister_ID`=\''.$_SESSION['id'].'\';';
    $select='SELECT `Name` from `minister_info` where `Minister_ID` in (select `host_id` from `create_event` where `event_id`=\''.$event_id.'\');';
   # echo $select;
    $host=$db->get_row($select);
    echo $host->Name;
    $title=$db->get_row('select `title` from `create_event` where `event_id`=\''.$event_id.'\';');
    
    $desc=$db->get_row('select `description` from `create_event` where `event_id`=\''.$event_id.'\';');
	$arrlength=count($email);
	
	echo "\nCount ";
	echo count($email);
	for($x = 0; $x < $arrlength; $x++) {
	$mail = new PHPMailer(true);
    		//echo $email[$x];
	$name=$email[$x];
	echo '\n';
	echo 'Email-id ';
	echo $name;		
		$actual=$db->get_row('SELECT `Name` from `minister_info`  where `Email_ID`=\''.$name.'\';');
	
    echo '\nACtual NAme : '.$actual->Name;
    echo '\n';
    $message='<html> <head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content="">
    
    <style>
        .myBorder{
          border: 4px solid green;
            padding: 25px;
            margin: 25px;
        }
    </style>
    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link rel = "stylesheet" type = "text/css" href = "/home/sonia/Desktop/SIH/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/clockpicker.css" />
    
    <link rel = "stylesheet" type = "text/css" href = "/home/sonia/Desktop/SIH/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/standalone.css" />
    
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body><div id="wrapper" >
            <div id="page-wrapper" class="col-lg-6">
            
                <div class="myBorder">
                <div align="center">
                    Hello '.  $actual->Name.'!'.  $host->Name.' had invited you for:
                </div>
                <div align="center">'.
                     $title->title. 
                '</div>
                <div align="left">
                    Description:
                </div>
                <div align="center">
                    '.  $desc->description . '
                </div>
                <a href="#">Click here to go dashboard"</a>
                
                </div>
        </div>
        
    
    </div></body></html>';
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'l4batch20@gmail.com';                 // SMTP username
    $mail->Password = 'l4@batch';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                  // TCP port to connect to
    //Recipients
	
    $mail->setFrom('l4batch@gmail.com','SIH');
    
	//$arrlength=count($email);
	//for($x = 0; $x < $arrlength; $x++) {
    	//	echo $email[$x];
	//$name=$email[$x];
   // echo $name;
   	echo 'Receipt name: '.$name;
	$mail->addAddress($name);     // Add a recipient
    
    //Content
    $mail->isHTML(true);                                 // Set email format to HTML
    $mail->Subject = 'Invitation';
    $mail->Body = $message;
    $mail->AltBody = '';
    $mail->send();
    //echo 'Message has been sent';
			
//}
}
    
} 
catch (Exception $e) {
    //echo 'Message could not be sent'.$e.';
    #    echo $e;
    echo 'Mailer Error: ' . $mail->ErrorInfo;	
    return 'error';
}
	echo "Invitation sent";
}
?>

