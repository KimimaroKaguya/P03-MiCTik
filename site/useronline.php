<?php

    include_once('../config/routeros_api.class.php');
    include_once('conn.php');

        $ARRAY3 = $API->comm("/ip/hotspot/user/print");
        $ARRAY2 = $API->comm("/system/scheduler/print");
        $ARRAY = $API->comm("/ip/hotspot/active/print");                                                                                    
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<!-- Page Content -->
<div class="content-wrapper"> 
            <section class="content-header">
              <h1>
                Kthai Team
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <li class="active">Hotspot</li>
                <li class="active">User Online</li>
              </ol>
            </section>  
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp; ผู้ใช้งานที่ออนไลน์</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Profile</th>
                                            <th>Username</th>
                                            <th>Ip address</th>
                                            <th>Mac address</th>
                                            <th>start-date</th>
                                            <th>Profile</th>
                                            <th>Up time</th>
                                            <th>Data use</th>
                                            <th>Login-by</th>                                                                                        
                                            <th>Kick</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php
                                                //print_r($ARRAY);
                                                //print_r($ARRAY2);
                                                //print_r($ARRAY3);
                                                //exit();

                                                    $num =count($ARRAY);
                                                    $num2 =count($ARRAY2);
                                                    $num3 =count($ARRAY3);

                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    $bytes =  $ARRAY[$i]['bytes-out']/1048576;

                                                        echo "<tr>";
                                                            echo "<td>".$no."</td>";
                                                            echo "<td>".$ARRAY[$i]['server']."</td>";                                                                                                                                                 
                                                            echo "<td>".$ARRAY[$i]['user']."</td>";                                                     
                                                            echo "<td>".$ARRAY[$i]['address']."</td>";
                                                            echo "<td>".$ARRAY[$i]['mac-address']."</td>"; 
                                                            echo "<td>";
                                                        for($ii=0; $ii<$num2; $ii++){
                                                                if($ARRAY2[$ii]['name']==$ARRAY[$i]['user']){
                                                                    echo $ARRAY2[$ii]['start-date'].' '.$ARRAY2[$ii]['start-time'];

                                                                }else{
                                                                    
                                                                    //echo "N/A";
                                                                    
                                                                }

                                                        }       echo "</td>";

                                                            echo "<td>";
                                                        for($ii=0; $ii<$num3; $ii++){
                                                                if($ARRAY3[$ii]['name']==$ARRAY[$i]['user']){
                                                                    echo $ARRAY3[$ii]['profile'];

                                                                }else{
                                                                    
                                                                    //echo "N/A";
                                                                    
                                                                }
                                                                
                                                        }       echo "</td>";
                                                                echo "<td>".$ARRAY[$i]['uptime']."</td>";
                                                                echo "<td>".round($bytes,1)." MB</td>";
                                                                echo "<td>".$ARRAY[$i]['login-by']."</td>";                                                     
                                                            //  echo "<td><a href='useronline_del.php?user=".$i."'><img src='../img/kik.png' width=20px title=Freekick></a></td>";
                                                                echo "<td><a href='useronline_del.php?user=".$i."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-power-off\"></i></button></a>";
                                                        echo "</tr>";
                                                    
                                                    }
                                                ?>
                                                                                                                                                                              
                                    </tbody>
                                </table>
                            </div>
                        </div>     
                        <!-- /#page-wrapper -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">www.k-thai.net</a>.</strong> All rights
  </footer>
        <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
   <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/demo.js"></script>  
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
