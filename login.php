<?php
    require_once('private/conn.php');
    session_start();
    if(isset($_SESSION["id"]))
    {
    	header("location:index.php");
    }

?>
<?php
 global $v_pwd;
 global $id;
if(isset($_POST['loginMode']))
{
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//$eid = test_input($_POST["eid"]);
        $eid = $_POST["eid"];
	$pwd = md5($_POST["pwd"]);
	$verify = 'SELECT `Password`, `Minister_ID`,`Name`,`Picture` FROM `minister_info` WHERE `Minister_ID` = \''.$eid.'\';';
	$verify1 = 'SELECT `Password_pa`, `Pa_ID`,`Pa_Name`,`Minister_ID` FROM `PA` WHERE `Pa_ID` = \''.$eid.'\';';
	$v_output = $db->get_row($verify);
        $output1=$db->get_row($verify1);
	//$v_pass = $v_output->fetch_assoc();
        if($v_output!=NULL)
        {
           
            
	$v_pwd = $v_output->Password;//$v_pass["Password"];
	$id = $v_output->Minister_ID;//$v_pass["Minister_ID"];
        }
	$default = '827CCB0EEA8A706C4C34A16891F84E7B';
	$date = Date("Y-m-d");
	#echo $eid;
	/*$fetch = 'SELECT * FROM `Forgot_Password` WHERE `Hostelite_ID`= '.$id.' AND `Date` = \''.$date.'\'';
	$res_fetch = $connect->query($fetch);
	if($res_fetch->num_rows != 0)
	{
		$row = $res_fetch->fetch_assoc();
		echo $pwd;
		if(strcasecmp($pwd,$row['Password']) == 0)
		{
			$delete = 'DELETE FROM `Forgot_Password` WHERE `Hostelite_ID` = '.$id.';';
			$connect->query($delete);
			echo "<script>window.document.location.href='reset.php';</script>";
		}
	}*/
			
	if(strcasecmp($pwd,$v_pwd) == 0)
	{
		//session_start();
		$_SESSION["id"] = $id;
                  $_SESSION["userName"]=$v_output->Name;
                 $_SESSION["userPicture"]=$v_output->Picture;
                 $_SESSION["userType"]="MINISTER";
		//echo $id;
		//if(strcasecmp($pwd, $default) == 0)
			//echo "<script>window.document.location.href='reset.php';</script>";
		echo "<script>window.document.location.href = 'index.php';</script>";
                 //       header("location:index.php");
	}
	else if(strcasecmp($pwd,$output1->Password_pa) == 0)
	{
            $_SESSION["id"] = $output1->Minister_ID;
                  $_SESSION["userName"]=$output1->Pa_Name;
                  $_SESSION["Pa_ID"]=$output1->Pa_ID;
                  $_SESSION["userType"]="PA";
                  echo "<script>window.document.location.href = 'index.php';</script>";
        }
        else
        {
?>
	<script>
		window.alert("Incorrect Username or Password.");
		window.document.location.href = 'login.php';
	</script>
<?php
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MSP|Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="msp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="msp/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="msp/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="msp/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="msp/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="msp/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="msp/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="msp/dist/js/sb-admin-2.js"></script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form  role="form" method="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="eid" type="eid" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pwd" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" checked value="Remember Me">Remember Me
                                    </label>
                                    <a href="forgotPwd.html" style="float: right">Forgot Password</a>
                                </div>
                               
                                <input type="submit" name="loginMode" class="btn btn-lg btn-success btn-block" value="Login">
                                <hr>
                                <br>
                                <a href='signup.php'>Don't have an account? SignUp!</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
