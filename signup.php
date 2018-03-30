
<?php
    include_once('private/conn.php');
?>
<html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIGN UP FROM</title>
	<!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
$(document).ready(function()
{
    $("#loding1").hide();
    $("#loding2").hide();
    $(".ministry").change(function()
    {
        $("#loding1").show();
        var id=$(this).val();
        var dataString = 'id='+ id;
        $(".people").find('option').remove();
        
            $.ajax
                ({
                    type: "POST",
                    url: "get_peoplesignup.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#loding1").hide();
                        $(".people").html(html);
                    } 
                });
            });
	
 }); 
</script>
<script>
function fun()
{
var a=document.getElementById('num');
var phoneno = /^\d{10}$/;
  if((a.value.match(phoneno)))
        {
		document.getElementById("mobile_error").innerHTML="";
      return true;
        }
      else
        {
		document.getElementById("mobile_error").innerHTML="Please Enter a valid mobile number.";
        //alert("Please enter valid mobile number.");
        return false;
        }
}
</script>
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
                        <form role="form" method="POST" onsubmit="fun()" action="signup.php">
                            <fieldset>
			<div name="error" id="error">
				
			</div>
                            <div class="form-group">
                                    <input class="form-control" placeholder="Full Name" name="name" type="text" autofocus required>
                                </div>
				<div class="form-group">
                                <label for="minstry">Select Ministry:</label>
      				<select class="form-control ministry" name="ministry" id="ministry"  required >
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
			     
                                    
                                </div>
                              <div class="form-group">
                                <label for="designation">Designation:</label>
      				<select  name="designation" id="designation"  class="people form-control" required>
        			
			      </select>
			      </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus  required>
                                </div>
                                 <div class="form-group">
                                
				<div class="form-group">
                                    <input class="form-control" id="num" onchange="fun()" placeholder="Mobile number" name="num" type="Number" value="" 				pattern="/(7|8|9)\d{9}/" minlength=10 maxlength=10 required>
				      				<div id="mobile_error" style="color:red;"></div>
                                </div>


                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus  					required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" 				required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">&nbsp;&nbsp;I accept all terms and conditions.
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign up" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>	

<?php
$conn = new mysqli("localhost", "root", "", "schedule_mgmt");

if($_SERVER['REQUEST_METHOD']=='POST')
{

$name =$_POST['num'];
$ministry =$_POST['ministry'];
$designation=$_POST['designation'];
$username =$_POST['username'];
$password =$_POST['password'];
$email =$_POST['email'];
$num=$_POST['num'];

$checksql = 'SELECT * from `minister_info` where Minister_ID=\''.$username.'\';';
$result = mysqli_query($conn,$checksql);
$check = mysqli_fetch_assoc($result);
echo $check;
if(isset($check)){
	//echo 'Already a user';
	?>
	<script> alert('Already a user')</script>
<?php
}
else
{
//remove did
$sql1= 'INSERT into `minister_info` (`Minister_ID`,`Designation_ID` ,`Name`, `Contact`, `Password`, `Email_ID`) values (\''.$username.'\',1,\''.$name.'\','.$num.',\''.md5($password).'\',\''.$email.'\');';
//echo $sql1;
mysqli_query($conn,$sql1);

$check= 'SELECT office_id from `ministryoffice` where office_name=\''.$ministry.'\';';
$result=mysqli_query($conn,$check);
$row = $result->fetch_assoc();
//echo $row['office_id'];
$sql2= 'INSERT into `designation` values (\''.$username.'\',\''.$ministry.'\','.$row['office_id'].');';
//echo $sql2;
mysqli_query($conn,$sql2);

}

}
?>
</html>

