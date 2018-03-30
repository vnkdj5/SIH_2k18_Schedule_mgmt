<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		header("location:login.php");
	}
	include_once("private/conn.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart City | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({format: 'yyyy-mm-dd'});
  } );
  </script>
<?php
	include("template/css.php");
?>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<?php
	include("template/top.php");
?>
<?php
	include("template/left.php");
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <!-- Content Header (Page header) -->
<?php
	include("template/controller.php");
?>
      <!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
	<?php
include("template/js.php");
?>

  </body>
</html>
