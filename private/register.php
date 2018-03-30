<?php
	include_once("private/conn.php");
	if(isset($_POST['register']))
	{
		
		$pr1 = $_POST['name1'];
		$pr2 = $_POST['name2'];
		$pr3 = $_POST['name3'];
		$pr4 = $_POST['name4'];
		$college = $_POST['college'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$clash=0;
		$web=0;
		$cret=0;
		$crood=0;
		$mad=0;
		$rev=0;$ppr=0;
		$robo=0;
		$nth=0;
		$sd=0;
		error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/class.phpmailer.php";
$message = '<html><body>';
$message = '<div dir="ltr" style="text-align: left;" trbidi="on">
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
Dear <b>'.$pr1.'</b>,</div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<br /></div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<span style="white-space: pre-wrap;">	</span>You have registered for one of the largest Techfest of Pune<b> Credenz17</b>. We warmly welcome you for the event! It is believed - <b>"Ideas take root that things change!"</b>. Think,analyze and implement is the essence of winning in this event.We hope you give your best.</div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<span style="white-space: pre-wrap;">	</span>Event related details and other information will be sent to you timely.</div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<br /></div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<b>For any details contact:</b></div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
Kiran Mandhare 7387191080</div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
Amit Shinde 8208031708</div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<br /></div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
Regards,</div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<b>PICT IEEE Student Branch,</b></div>
<div style="background-color: white; color: #222222; font-family: arial, sans-serif; font-size: 12.8px;">
<b>Credenz 2017,</b><br />
<b>PICT,Pune-43</b></div>
</div>
';

$message .= "</body></html>";
$mail = new PHPMailer(true);
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'l4batch20@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'l4@batch';

// add a subject line
$mail->Subject = ' Registartion Successful. ';

// Sender email address and name
$mail->SetFrom('l4batch@gmail.com', 'Credenz Team');

// reciever address, person you want to send
$mail->AddAddress($email);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
$mail->AddAttachment('events.png');

try {
    // send mail
    $mail->Send();
    $msg = "Mail send successfully";
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}        

		if(isset($_POST['clash']))
		{
			$clash = 1;
		}
		if(isset($_POST['web']))
		{
			$web = 1;
		}
		if(isset($_POST['cret']))
		{
			$cret = 1;
		}
		if(isset($_POST['crood']))
		{
			$crood = 1;
		}
		if(isset($_POST['mad']))
		{
			$mad = 1;
		}
		if(isset($_POST['rev']))
		{
			$rev = 1;
		}
		if(isset($_POST['ppr']))
		{
			$ppr = 1;
		}
		if(isset($_POST['robo']))
		{
			$robo = 1;
		}
		if(isset($_POST['nth']))
		{
			$nth = 1;
		}
		if(isset($_POST['sd']))
		{
			$sd = 1;
		}
		$fees = $_POST['fees'];
		$insert = $db->query("INSERT INTO registrations VALUES('','$pr1','$pr2','$pr3','$pr4','$clash','$web','$cret','$crood','$mad','$ppr','$rev','$robo','$nth','$sd',sysdate(),'$phone','$college','$fees','$email')");
		echo "<script>window.alert(\"Registered Successfully.\");</script>";
	}
	
?>
<!DOCTYPE html>
<html>


<head>
	<title>Registration | Amplifying Ideas</title>
	<meta name="keywords" content="" />
	<link rel="icon" href="img/fevicon.png" type="image/png" >
<link rel="shortcut icon" href="img/fevicon.png" > 
	<meta charset="utf-8">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/inner.css">
	<link rel="stylesheet" type="text/css" href="css/mobile-menu.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link type="text/css" media="screen" rel="stylesheet" href="css/awwwards.css" />
	<script type="text/javascript" src="js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/libs/js-modernizr.min.js"></script>
	<script type="text/javascript" src="js/common.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-47781007-1', 'creative-mob.com');
	  ga('send', 'pageview');

	</script>
</head>
<body class="contact">
	<!-- MOBILE MENU -->
	<!-- START MOBILE MENU -->

<div class="overlay-menu overlay-hugeinc">
    <div class="overlay-close">Close</div>
    <nav>
        <ul>
            <li><a href="index.php"><div class="icon-wrap"><div class="icon home"></div></div>HOME</a></li>
			<li><a href="about.php"><div class="icon-wrap"><div class="icon contact"></div></div>ABOUT</a></li>
            <li><a class="small" href="events.php"><div class="icon-wrap"><div class="icon meet"></div></div>EVENTS</a></li>
            <li><a href="workshop.php"><div class="icon-wrap"><div class="icon what"></div></div>WORKSHOP</a></li>
            <li><a href="hackathon.php"><div class="icon-wrap"><div class="icon services"></div></div>HACKATHON</a></li>
            <li><a href="index.php#CONTACT"><div class="icon-wrap"><div class="icon contact"></div></div>CONTACT</a></li>
        </ul>
    </nav>
</div>
	
	<div class="maincontainer">
		
		<!-- MOBILE HEADER -->
		<header class="mobile">
	<div class="menu-mobile-trigger" id="trigger-overlay"></div>
</header>
<div class="tab-contact">
    <div class="central-balloon" id="central-balloon">
        <div class="dots">
            <div class="dot dot-0"></div>
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
        </div>
    </div>
</div>		
		
		
		
		<!-- UX / UI SECTION -->
		<!-- CONTACT FORM -->
		<section class=" bg-radial-black-left" style="padding-top: 100px;">
			<div class="inner" >
				<h1 class="small blue" style="text-align:center;">Registration</h1>
				
				<center>
				<div class="" style="width:50%;">
					<form id="contactForm" name="contactForm" class="clearafter" method="post">
						
						<div class="letter">
						
							<label for="name">Participant 1</label>
							<input autofocus required type="text" id="name1" name="name1"><div class="frm-ok name"></div><br>
							<label for="name">Participant 2</label>
							<input type="text" id="name2" name="name2"><div class="frm-ok name"></div><br>
							<label for="name">Participant 3</label>
							<input type="text" id="name3" name="name3"><div class="frm-ok name"></div><br>
							<label for="name">Participant 4</label>
							<input type="text" id="name4" name="name4"><div class="frm-ok name"></div><br>
							<label for="name">College</label>
							<input required type="text" id="college" name="college"><div class="frm-ok name"></div><br>
							
							<label for="email">Email</label>
							<input required type="email" id="email" name="email"><div class="frm-ok email"></div><br>
							<label for="phone">Mobile No.</label>
							<input required type="text" id="phone" name="phone"><div class="frm-ok phone"></div><br>
							
							<!-- By default "select event from which page you have redirected"  --->
							
						<label for="event">Events</label><br/>
							<label>C/C++ Clash</label> <input type="checkbox" class="cb" id="clash" name="clash" value="100"style="width:60%;float:right;height:22px"><br>
							<label>Web Weaver</label> <input type="checkbox" class="cb" id="web"style="width:60%;float:right;height:22px" name="web" value="150"><br/>
							<label>Cretronix</label> <input type="checkbox" class="cb" id="cret"   style="width:60%;float:right;height:22px" name="cret" value="150"><br/>
							<label>Croodle</label> <input type="checkbox" class="cb" style="width:60%;float:right;height:22px" id="crood" name="crood" value="0"><br/>
							<label>Mad Talks</label> <input type="checkbox" class="cb" id="mad" name="mad" value="150" style="width:60%;float:right;height:22px"><br/>
							 <label>Reverse Coding</label><input type="checkbox" class="cb" id="rev" name="rev" value="80" style="width:60%;float:right;height:22px;" ><br/>
							 <label>Paper Presentation</label><input type="checkbox" class="cb" id="ppr" name="ppr" value="200" style="width:60%;float:right;height:22px;"><br/>
							<label>RoboLIGA</label> <input type="checkbox" class="cb" id="robo" name="robo" value="200" style="width:60%;float:right;height:22px;"><br/>
							 <label>NTH</label><input type="checkbox" class="cb" id="nth" name="nth" value="0" style="width:60%;float:right;height:22px;"><br/>
							 <label>S/W Development</label><input type="checkbox" class="cb" id="sd" name="sd" value="200" style="width:60%;float:right;height:22px;">	
							 <br/><br/><br/>
							<label for="fees">Participation Fees:</label>
							
							<input type="text" id="totalcost"    name="fees"><div class="frm-ok message" ></div><br/><br/><br/>
						<!----AMIT FETCH THIS FEE FROM DB when event is selected --->
							 
																				
						<button class="blue with-blue-text" name="register">Register</button>
					</div>
							<script type="text/javascript" language="Javascript">
var sell = new Validator("contactForm");
sell.EnableOnPageErrorDisplay();
sell.EnableMsgsTogether();
sell.addValidation("name1","req","<span class='label label-danger'>Please Enter Participant Name.</span>");
sell.addValidation("name1","alpha","<span class='label label-danger'>Please Enter Valid name.Dont enter spaces or Special characters like & ,%,* etc</span>");

sell.addValidation("college","req","<span class='label label-danger'>Please Enter College Name.</span>");
//sell.addValidation("middle_name","req","<span class='label label-danger'>Please Enter Middle Name.</span>");
//sell.addValidation("middle_name","alpha","<span class='label label-danger'>Please Enter Valid Middle name.Dont enter spaces or Special characters like & ,%,* etc</span>");

//sell.addValidation("last_name","req","<span class='label label-danger'>Please Enter Last Name.</span>");
//sell.addValidation("last_name","alpha","<span class='label label-danger'>Please Enter Valid Last name.Dont enter spaces or Special characters like & ,%,* etc</span>");


sell.addValidation("phone","req","<span class='label label-danger'>Please Enter Valid Mobile Number.</span>");
sell.addValidation("phone","alnum","<span class='label label-danger'>Please Enter Valid Mobile Number.</span>");
sell.addValidation("phone","minlen=10","Please Enter 10 digit Mobile Number.");
sell.addValidation("phone","maxlen=10","Please Enter 10 digit Mobile Number.");

sell.addValidation("email","req","Please Enter Email ID.");
sell.addValidation("email","email","Please Enter valid Emailid.");

//sell.addValidation("cost_of_form","req","<span class='label label-danger'>Please add cost of form.</span>");
//sell.addValidation("cost_of_form","alnum","<span class='label label-danger'>Please add cost of form in the form of numbers.</span>");

// sell.addValidation("cost_of_form","req","<span class='label label-danger'>Please add cost of form</span>");

// sell.addValidation("cost_of_form","req","<span class='label label-danger'>Please add cost of form</span>");

</script>
					</form>
				</div>
				</center>
			</div>
		</section>
		
		
		<!-- FOOTER -->
		<footer>
	<div class="scene">
		<div class="lights"></div>
		<div class="buildings"></div>
		<div class="top"></div>
		<div class="ship"></div>
	</div>
	<div class="blackbar">
		<div class="inner">
			<div class="creativemob">
				<div class="icon"><img src="Logos/logo pisb.png" style="width:200px;height:90px;"/></div>
				
			</div>
			<ul class="connect-buttons">
				<li class="fb"><a href="https://www.facebook.com/pisb.credenz" target="_blank"></a></li>
				<li class="em"><a href="mailto:admin@credenz.com" target="_blank"></a></li>
				
			</ul>
			<div class="location">
				<div class="icon location"></div>
				<span><strong>Pune Institute Of Computer Technology<br>27,Pune-Satara Road<br> Dhankawadi,Pune-411043<br><!-- <a href="tel:619-800-3298">619-800-3298</a> --></strong></span>
			</div>
		</div>
	</div>
	<div class="copyright">&copy; 2017 PISB. All rights reserved..</div>
</footer>		
	</div>
	
	<!-- DESKTOP MENU -->
	<div class="menu-desktop open">
	<ul>
		<li class="about"><a href="index.php">HOME</a></li>
		<li class="about"><a href="about.php">ABOUT</a></li>
		<li class="showroom"><a href="events.php">EVENTS</a></li>
		<li class="services"><a href="workshop.php">WORKSHOPS</a></li>
		<li class="home"><a href="hackathon.php">HACKATHON</a></li>
		<li class="home"><a href="index.php#CONTACT">CONTACT</a></li>
	</ul>
	<div class="circle">
		<img src="img/common/menus/logo-cm%402x.png">
	</div>
	<div class="ribbon-left"></div>
	<div class="ribbon-right"></div>
</div>

<div class="overlay-window overlay-hugeinc">
	<div class="contact-window">
		<div class="close-window"><img src="img\inner\resources\close-btn.png" /></div>
		<div class="window-form">
			<h3>Any Suggestions?</h3>
			<p>Fill out the fields below and send us a message. Look forward to hearing from you!</p>
			<form method="POST">
				<input type="text" name="w_name" placeholder="Name" />
				<input type="email" name="w_email" placeholder="Email" />
				<textarea name="w_message" placeholder="Message"></textarea>
				<button class="button send-msg">SEND MESSAGE</button>
			</form>
		</div>
		<div class="window-bar">
			<div class="the-bar"></div>
		</div>
		<div class="call-us-today">
			<h3>Any Queries?</h3>
			<p>Perhaps a phone conversation is more your style? No worries!</p>
			<button class="button bigger call-us">Call Us Directly!</button>
			<h2>+91-9890811301</h2>
		</div>
	</div>
</div>	<script type="text/javascript" src="js/menus.js"></script>
	<script type="text/javascript" src="js/inner.js"></script>
	<script>
	$('.cb').on('change', function(){ // on change of state
   UpdateCost();
});
function UpdateCost() {
  var sum = 0;
  var gn, elem;
  $('.cb:checked').each(function(){
     sum += Number($(this).val()); 
  })
 
 $('#totalcost').val(sum.toFixed(2));
}
	</script>
</body>