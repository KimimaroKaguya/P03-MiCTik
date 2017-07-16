<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

			$ARRAY = $API->comm("/interface/print");			
			$resource = $API->comm("/system/resource/print");
      $health = $API->comm("/system/health/print");
      include("../include/config.inc.php"); 			
      $count_up = count($up);
      $up = $API->comm("/ip/hotspot/user/profile/print");
      $free_ram =  $resource['0']['free-memory']/1048576;
      $total_ram =  $resource['0']['total-memory']/1048576;
      $free_hdd =  $resource['0']['free-hdd-space']/1048576;
      $total_hdd =  $resource['0']['total-hdd-space']/1048576;	 

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
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">System</li>
                <li class="active">Resources</li>
              </ol>
            </section> 
        <section class="content">
<!--++++++++++++++++++++++++++++++++++ส่วนเปิด แสดง Health Mikrotik +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-plug" aria-hidden="true"></i> รายละเอียด Health Mikrotik</h3>
                        </div>
                        <!-- /.panel-heading -->
                 
                  <div class="panel-body">
                      <div class="row">
                            <div class="col-xs-6">Fan Mode</div>
                            <div class="col-xs-6">
                              <div class="text-temp"><?=$health[0]["fan-mode"]?></div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Use Fan</div>
                            <div class="col-xs-6">
                              <div class="text-temp"><?=$health[0]["use-fan"]?></div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Active Fan</div>
                            <div class="col-xs-6">
                              <div class="text-temp"><?=$health[0]["active-fan"]?></div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Voltage. </div>
                            <div class="col-xs-6">
                              <div class="text-temp"> <?=$health[0]["voltage"]?>V </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Temperature</div>
                            <div class="col-xs-6">
                              <div class="text-temp"><?=$health[0]["temperature"]?>° </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">CPU Temperature</div>
                            <div class="col-xs-6">
                              <div class="text-temp"><?=$health[0]["cpu-temperature"]?>° </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Current. </div>
                            <div class="col-xs-6">
                              <div class="text-temp"> <?=$health[0]["current"]?>mA </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Power Consumption</div>
                            <div class="col-xs-6">
                              <div class="text-temp"> <?=$health[0]["power-consumption"]?>W</div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Fan Speed</div>
                            <div class="col-xs-6">
                              <div class="text-temp"> <?=$health[0]["fan-speed"]?>RPM </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-xs-6">Fan2 Speed</div>
                            <div class="col-xs-6">
                              <div class="text-temp"> <?=$health[0]["fan2-speed"]?>RPM </div>
                            </div>
                      </div>
                  </div>

                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++ส่วนเปิด แสดง Resourec Mikrotik +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="col-lg-6">
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-server" aria-hidden="true"></i> รายละเอียด Resources Mikrotik</h3>
                        </div>
                        <!-- /.panel-heading -->
                 
                        <div class="panel-body">

                          <div class="row">
                                  <div class="col-xs-6">Uptime ระยะเวลาใช้งาน  </div>
                                  <div class="col-xs-6">
                                       <div class="text-temp"><?=$resource[0]['uptime']?> </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">ชื่ออุปกรณ์ </div>
                                  <div class="col-xs-6">
                                       <div class="text-temp"><?=$resource[0]['platform']?> </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">รุ่น</div>
                                  <div class="col-xs-6">
                                       <div class="text-temp"><?=$resource[0]['board-name']?> </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Version  </div>
                                  <div class="col-xs-6">
                                       <div class="text-temp"><?=$resource[0]['version']?> </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">รุ่น CPU  </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"> <?=$resource[0]['cpu']?> </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">CPU Count </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"> <?=$resource[0]['cpu-count']?> Core </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">CPU Frequency </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"> <?=$resource[0]['cpu-frequency']?> MHz </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">CPU Load </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"> <?=$resource[0]['cpu-load']?> % </div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Free Memory </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"><?php echo " ".round($free_ram,1)."MB"; ?></div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Total Memory </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"><?php echo " ".round($total_ram,1)."MB"; ?></div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Free HDD Space </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"><?php echo " ".round($free_hdd,1)."MB"; ?></div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Total HDD Size </div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"><?php echo " ".round($total_hdd,1)."MB"; ?></div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Architecture Name</div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"><?=$resource[0]['architecture-name']?></div>
                                  </div>
                          </div>
                          <div class="row">
                                  <div class="col-xs-6">Build Time</div>
                                  <div class="col-xs-6">
                                      <div class="text-temp"><?=$resource[0]['build-time']?></div>
                                  </div>
                          </div>
                          
                        </div>

                </div>
            </div>
          </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        </section>
        <!-- /#page-wrapper -->
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
