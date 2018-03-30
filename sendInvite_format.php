<!DOCTYPE html>
<?php
	require_once('private/conn.php');
?>

<?php
        $select='SELECT `Name` from `minister_info` where `Minister_ID` in (select `host_id` from `create_event` where `event_id`=1001) ;';
	$host=$db->get_row($select);
	/*echo $host->Name;
	if($host->num_rows>0)
	{
	  $row=$host->fetch_assoc();	
	  echo "<p>",$row["Name"],"</p>";
	}*/
	$title=$db->get_row("select title from create_event where event_id=1001");
	//echo $title->title;
	
	$desc=$db->get_row("select description from create_event where event_id=1001");
	//echo $desc->description;
?>

    
    <!-- /#wrapper -->
    <?php
	      require_once('/opt/lampp/htdocs/msp/private/phpmailer/PHPMailerAutoload.php');
	 
	    $mail = new PHPMailer();
	    $mail->CharSet =  "utf-8";
	    $mail->IsSMTP();
	    // enable SMTP authentication
	    $mail->SMTPAuth = true;                  
	    // GMAIL username
	    $mail->Username = "l4batch20@gmail.com";
	    // GMAIL password
	    $mail->Password = "l4@batch";
	    $mail->SMTPSecure = "ssl";  
	    // sets GMAIL as the SMTP server
	    $mail->Host = "smtp.gmail.com";
	    // set the SMTP port for the GMAIL server
	    $mail->Port = "465";
	    $mail->From='l4batch20@gmail.com';
	    $mail->FromName='Kajal';
	    $mail->AddAddress('komalbharadiya@gmail.com');
	    $mail->Subject  =  'Invitation';
	    $mail->IsHTML(true);
	    
	    $mail->Body    = '<html> <head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
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
					Hello Kajal,'.  $host->Name.' has invited you for:
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
				
				
        		</div>
		</div>
		
	
    </div></body></html>';
	    
	    echo 'End';
	    if($mail->Send())
	    {
	      echo " Check Your Email";
	    }
	    else
	    {
	      echo "Mail Error - >".$mail->ErrorInfo;
	    }
	?>

