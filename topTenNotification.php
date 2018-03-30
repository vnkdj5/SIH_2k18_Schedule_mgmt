<?php
	require_once('private/conn.php');
?>
<?php
	$result_array=$db->get_results("select title from create_event order by creation_date desc LIMIT 5");
	
	$message1="";
	foreach($result_array as $row_obj) {
 	 $message= "You got invited for the event:- ". $row_obj->title;
	 $message1 .= $message;
	 $message1 .= "<br>";
	}
	
	 
	echo $message1;
?>

<html>
	<head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="">
		    <meta name="author" content="">

		    <title>SB Admin 2 - Bootstrap Admin Theme</title>

		    <!-- Bootstrap Core CSS -->
		    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		    <!-- MetisMenu CSS -->
		    <link rel = "stylesheet" type = "text/css" href = "/home/sonia/Desktop/SIH/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/clockpicker.css" />
		    
		    <link rel = "stylesheet" type = "text/css" href = "/home/sonia/Desktop/SIH/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/standalone.css" />
		    
		    <script src="js/clockpicker.js"></script>

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


	</head>
	<body>
		<div id="wrapper">
			<div id="page-wrapper">
				<div class="col-lg-10">
				</div>
				<div class="col-lg-2">
					<div style="bottom: 0; right : 0;">
						<?php echo $message1; ?>
					</div>
				</div>

			</div>
		</div>
		
	</body>
</html>
