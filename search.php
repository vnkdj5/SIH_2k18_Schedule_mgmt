
<?php
    include_once('private/conn.php');
?>
<html>
<head>
<title></title>
<script type="text/javascript" src="jquery.min.js"></script>

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
<div>
<div id="main-container">
    <label>Search Ministry:</label> 
    <select name="ministry" class="ministry">
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
    <label>People:</label> 
    <select name="people" class="people">
        <option selected="selected">--Select--</option>
    </select>
    <img src="ajax-loader.gif" id="loding1"></img>
    <input type = "submit" value = "Go"/>

    </div>

 <div class="row">
  <div class="col-lg-4"  style="border: 2px solid red">.col-sm-4</div>
  <div class="col-lg-8"  style="border: 2px solid red">.col-sm-8</div>
  
</div> 
</div>
</body>
</html>
