<div class="row">
    <div class="col-lg-8">
        <h1 class="page-header">All Events</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
        <?php 
            
            //error_reporting(E_ERROR | E_PARSE);
            if(session_status() == PHP_SESSION_NONE){
                session_start();
                include_once '../private/conn.php';
            }
           
            $id = $_SESSION['id'];
            $d=mktime(11, 14, 54, 03, 15, 2018);
            $date = date('Y-m-d',$d);
            $db->get_results("create view temporary as (SELECT * FROM create_event WHERE host_id='".$id."' and date='".$date."') union (SELECT * FROM create_event WHERE event_id in (SELECT event_id FROM guests WHERE guest_id='".$id."') and date='".$date."')");
            
            for ($i=0;$i<24;$i=$i+1){
                $t=date('H:i:s',mktime($i, 00, 00, 00, 00, 0000));
                $td=date('H:i:s',mktime(($i+1)%24, 00, 00, 00, 00, 0000));
                
                $events = $db->get_row("select host_id,count(*) as count from temporary where start_time >='".$t."' and start_time<='".$td."' order by host_id");
            
            //foreach ($events as $event){
        ?>

<div class="row">
<div class="col-lg-8">
        <div class="col-sm-12 col-lg-12">
             <font size="4">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading"> 
                           
                        </div>
                        
                        
                </div>
             </font>
            </div>
</div>
</div>
            <?php }//}
        $db->query('drop view temporary');?>