<?php
if(isset($_GET['folder']) && isset($_GET['file']))
{
if(isset($_GET['folder']) && isset($_GET['file']))
{
//print_r($_GET);
$folder= $_GET['folder'];
$file= $_GET['file'];
   $query='./component/'.$folder.'/query.php';
//echo 'f887ile'.$query;
if(is_file($query))
{
//echo 'file'.$query;
include($query);
}
else
{
?>
<div class='alert alert-danger'>
Query controller not created in <?php echo $folder;?>
</div>
<?php
}
}
//print_r($_GET);
$folder= $_GET['folder'];
$file= $_GET['file'];
$fol='./component/'.$folder;
$bredcrumb='./component/'.$folder.'/bredcrumb.php';
if(!is_file($bredcrumb))
{
?>
<div class='alert alert-warning'>
 <b><i class='fa fa-bullhorn'></i> Check folder in <?php echo $fol;?>.</b>
</div>
<?php
}
$function='./component/'.$folder.'/function.php';
//echo 'f887ile'.$query;
if(is_file($function))
{
//echo 'file'.$query;
include($function);
}
else
{
?>
<div class='alert alert-danger'>
function's file not created in <?php echo $folder;?>
</div>
<?php
}$bredcrumb='./component/'.$folder.'/bredcrumb.php';
//echo 'f887ile'.$query;
if(is_file($bredcrumb))
{
//echo 'file'.$query;
include($bredcrumb);
}
else
{
?>
<div class='alert alert-danger'>
Bredcrumb not created in <?php echo $folder;?>
</div>
<?php
}
$process='./component/'.$folder.'/process/'.$file.'.php';
//echo 'f887ile'.$query;
if(is_file($process))
{
//echo 'file'.$query;
  
    include($process);
}
else
{
?>
<div class='alert alert-danger'>
<?php echo $file;?>.php file not created in <?php echo $folder;?>/process
</div>
<?php
}

}
?>