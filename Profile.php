<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location:login.php");
	}
	include_once("private/conn.php");          
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MSP| Schedule management</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--><script  type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    
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
                    url: "get_people.php",
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
</head>
<body>

    <div id="wrapper">
<?php
	include("template/top.php");
?>
  <div id="page-wrapper">
            
              
            <!-- Content Header (Page header) -->
<?php
	include("component/userProfile.php");
       # include ("component/process/home.php");
?>
              </div>
  </div>
    </div>
    
    <?php
	include("template/bottomScripts.php");
?>
    <script>
function loadDoc(filename) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("page-content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "component/"+filename, true);
  xhttp.send();
}
</script>
    
    
</body>
</html>