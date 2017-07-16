<?php
				
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ppp/active/print");						
									   								
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
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
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">PPPoe</li>
                <li class="active">View Secret Online</li>
              </ol>
            </section>   
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-wifi"></i> ผู้กำลังใช้งานสำหรับ PPPoE</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th>No.</th>
                                            <th>ชื่อผู้ใช้งาน</th>
                                            <th>รูปแบบการให้บริการ</th>
                                            <th>เลขหมายไอพีที่ใช้งาน</th>
                                            <th>เลขหมายเครื่องที่ใช้งาน</th>
                                            <th>เวลาที่ใช้งาน</th>
                                            <th>เชิญออก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
                                                <?php
                                                    $num =count($ARRAY);                                                    
                                                    for($i=0; $i<$num; $i++){
                                                    $no=$i+1;
                                                    $bytes =  $ARRAY[$i]['bytes-out']/1048576;
                                                    echo "<tr>";
                                                        echo "<td>".$no."</td>";
                                                        echo "<td>".$ARRAY[$i]['name']."</td>";
                                                        echo "<td>".$ARRAY[$i]['service']."</td>";
                                                        echo "<td>".$ARRAY[$i]['address']."</td>";
                                                        echo "<td>".$ARRAY[$i]['caller-id']."</td>";
                                                        echo "<td>".$ARRAY[$i]['uptime']."</td>";
                                                        echo "<td><a href='pppoeonline_del.php?user=".$i."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-power-off\"></i></button></a>";

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
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
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
