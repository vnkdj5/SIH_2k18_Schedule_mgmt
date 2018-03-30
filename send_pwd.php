<?php
    require_once('private/conn.php');
?>

<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
  $email=$_POST['email'];
  $pass='select `Password` from `minister_info` where `Email_id`=\''.$email.'\';';
  
  $charset="ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuioplkjhgfdsazxcvbnm1023654789";
  $gpassword=substr(str_shuffle($charset),0,5);
  
  //echo $gpassword;
  
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
    $mail->AddAddress($email);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Your new password is : '.$gpassword.'';
    
    echo 'End';
    if($mail->Send())
    {
      echo " Check Your Email";
       $gpassword=md5($gpassword);
  
        $db->query('update `minister_info` set `Password`=\''.$gpassword.'\' where `Email_id`=\''.$email.'\';');
        echo "<script>alert('check your mail');window.document.location.href = 'login.php';</script>";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
    
    
  	
}
?>

