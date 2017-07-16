<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

			$ARRAY = $API->comm("/interface/print");			
									   								
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
</head>
<body>
    <div class="content-wrapper">
    <section class="content-header">
              <h1>
                Kthai Team
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Interface</li>
                
              </ol>
            </section>  
        <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-signal" aria-hidden="true"></i>  การเชื่อมต่ออินเตอร์เน็ตของเราเตอร์</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                        	<th>No.</th>                                                                     	
                                            <th>ชื่อ</th>
                                            <th>comment</th>                                            
                                            <th>ประเภท</th>
                                            <th>สถานะ</th>
                                        <!-- <th>แก้ไข / ลบ</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                
												<?php
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td>".$ARRAY[$i]['.id']."</td>";	
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>".$ARRAY[$i]['comment']."</td>";
													    echo "<td>".$ARRAY[$i]['type']."</td>";
														echo "<td>";
                                                            if($ARRAY[$i]['running']=="true"){
                                                            echo 
															"<span class=\"label label-success\">CONNECT</span>";
                                                            }else{
                                                            echo "<span class=\"label label-danger\">DISCONNECT</span>";
                                                            }
                                                            echo "</td>";
													echo "</tr>";
													}
												?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /#page-wrapper -->
    </div>
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

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>
</body>
</html>
