<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

			$ARRAY = $API->comm("/ip/hotspot/user/print");			
			$ARRAY1 = $API->comm("/ip/hotspot/user/print"); 
      $API->write("/system/resources/monitor",false);

$API->write("=cpu-used=".$cpu,false);

$API->write("=once=",true);


   ini_set('display_errors', 1);
    $serverName = "localhost";       //ที่อยู่ฐานข้อมูล
    $userName = "root";                  // ชื่อ username เข้าฐานข้อมูล
    $userPassword = "20062521";    // รหัสผ่านเข้าฐานข้อมูล  
    $dbName = "api3";          // ชื่อ database ที่เราตั้งชื่อไว้
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);     //  คำสั่ง เชื่อมฐานฐานข้อมูล

 //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//เปิดส่วน  คำสั่ง นับจำนวนนักเรียน ทั้งหมดที่มีอยู่ในตาราง
      $sql = "SELECT * FROM  mt_gen WHERE  profile  LIKE  '%teacher%'  "; // เลือกข้อมูลจากตาราง tb_data_std  นำค่ามาเก็บไว้ที่ ตัวแปรชื่อว่า  $sql
      $query = mysqli_query($conn,$sql);                              // การเชื่อมข้อมูลจากตารางที่เลือก เข้ากับฐานข้อมูล  แล้วนำค่ามาเก็บไว้ที่ $query
      $teacher_sum_score = mysqli_num_rows($query);              // การนับจำนวนแถวที่มีข้อมูลอยู่ในตาราง นำค่ามาเก็บไว้ที่ $std_sum_score  เพื่อนำค่าไปแสดง
//ปิดส่วน  คำสั่ง นับจำนวนนักเรียน ทั้งหมดที่มีอยู่ในตาราง

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//เปิดส่วน  คำสั่ง นับจำนวนนักเรียนชาย ทั้งหมดที่มีอยู่ในตาราง
     $sql = "SELECT * FROM  mt_gen WHERE  profile  LIKE  '%studen%'  ";
     $query = mysqli_query($conn, $sql);
     $student_sum_score = mysqli_num_rows($query);                    
//เปิดส่วน  คำสั่ง นับจำนวนนักเรียนชาย ทั้งหมดที่มีอยู่ในตาราง       
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//เปิดส่วน  คำสั่ง นับนักเรียนชาย ทั้งหมดที่มีอยู่ในตาราง
      $sql = "SELECT * FROM  mt_gen WHERE  profile  LIKE  '%guest%'  ";             // เลือกข้อมูลจากตาราง tb_data_std  นำค่ามาเก็บไว้ที่ ตัวแปรชื่อว่า  $sql
      $query = mysqli_query($conn,$sql);                              // การเชื่อมข้อมูลจากตารางที่เลือก เข้ากับฐานข้อมูล  แล้วนำค่ามาเก็บไว้ที่ $query
      $guest_sum_score = mysqli_num_rows($query);                // การนับจำนวนแถวที่มีข้อมูลอยู่ในตาราง นำค่ามาเก็บไว้ที่ $tec_sum_score  เพื่อนำค่าไปแสดง
//ปิดส่วน  คำสั่ง นับนักเรียนชาย ทั้งหมดที่มีอยู่ในตาราง
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      //เปิดส่วน   คำสั่ง นับจำนวนนักเรียนตามปีการศศึกษา  โดยไม่นำรหัสที่ซ้ำกัน มานับ
     $sql = "SELECT * FROM  mt_gen WHERE  profile  LIKE  '%bit%'  ";    // เลือกข้อมูล  จากฟิลว์ที่เราต้องการ โดยจะรวมข้อมูลที่ซ้ำกัน                                                                       
     $query = mysqli_query($conn,$sql);                                                                 // ทำการ Query ข้อมูลจากตารางที่มี่อยู่ทั้งหมด
     $bit_sum_score = mysqli_num_rows($query);                                                 //  แล้วทำนับ จำนวนแถบที่มีข้อมูลอยู่ โดย ฟิวล์จะมีข้อมูลไม่ซ้ำกัน
//ปิดส่วน    คำสั่ง นับจำนวนนักเรียนตามปีการศศึกษาโดยไม่นำรหัสที่ซ้ำกัน  มานับ

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
 <script src="../../js/jquery-1.11.0.js"></script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data User', 'ผู้ใช้ทั่วไป', 'ผู้ใช้งาน VIP', 'ผุ้ใช้งานชัวคราว', 'ขาจร'],


          [<? print"'";?><?php echo date("Y");?><? print"'";?>, <? print"$student_sum_score";?>, <? print"$teacher_sum_score";?>, <? print"$guest_sum_score";?>, <? print"$bit_sum_score";?>]
          //['2015', 1170, 460, 250, 460, 250, 460, 250],
          //['2016', 660, 1120, 300, 1120, 300, 1120, 300],
          //['2017', 1030, 540, 350, 540, 350, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'จำนวนผู้ใช้งาน แบ่งเป็นกลุ่ม',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</head>
<body>
		<div class="content-wrapper">
            <section class="content-header">
              <h1>
                โปรแกรมบริหารจัดการอินเตอร์เน็ต
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Report</li>
                
              </ol>
            </section> 
        <section class="content">
		
            <div class="row">
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
             <!-- เปิดส่วน กรอปตารางแสดงความเร็วอินเตอร์เน็ต  -->
                                      <div class="col-md-12">
                                              <div class="box box-success  box-solid">
                                                        <div class="box-header with-border">
                                                                  <i class="fa fa-bar-chart"></i>
                                                                  <h3 class="box-title">สถิติจำนวนผู้ใช้งานอินเตอร์เน็ต</h3>
                                                            <div class="box-tools pull-right">
                                                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> </button>
                                                            </div>
                                                        </div>
                                  <!-- เปิดส่วน ตารางกราฟ -->  
                                                <div class="box-body">
                                                    <div class="box-body">
                                                         
                                                          <div id="columnchart_material" style="width: 1150px; height: 500px;"></div>




                                                            <!-- Info Boxes Style 2 -->
                                                    </div>
                                                </div>                                         
                                              </div>                                       
                                   </div>
        <!-- ปิดส่วน แสดงแถบกราฟ -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
             <!-- เปิดส่วน กรอปตารางแสดงความเร็วอินเตอร์เน็ต  -->
                                     <div class="col-md-12">
                                              <div class="box box-success  box-solid">
                                                        <div class="box-header with-border">
                                                                  <i class="fa fa-bar-chart"></i>
                                                                  <h3 class="box-title">สถิติการใช้งานข้อมูลอินเตอร์เน็ต</h3>
                                                            <div class="box-tools pull-right">
                                                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> </button>
                                                            </div>
                                                        </div>
                                  <!-- เปิดส่วน ตารางกราฟ -->  
                                                <div class="box-body">
                                                  



                                                            <!-- Info Boxes Style 2 -->
                                                    </div>
                                                </div>                                         
                                                                                   
                                      </div>
        <!-- ปิดส่วน แสดงแถบกราฟ -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-user" aria-hidden="true"></i> รายงานการใช้งานอินเตอร์เน็ต</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                        	  <th> No.</th> 
										                        <th>ชื่อ</th>
                                            <th>กลุ่มผู้ใช้งาน</th>                                            
                                            <th>เวลาใช้งาน</th>
											                      <th>ข้อมูล Download</th>
											                      <th>ข้อมูล Upload</th>
                                        <!-- <th>แก้ไข / ลบ</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                
												<?php
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
													
														echo "<td>".$no."</td>";
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>".$ARRAY[$i]['profile']."</td>";
													    echo "<td>".$ARRAY[$i]['uptime']."</td>";
														echo "<td>";
															$bytes =$ARRAY[$i]['bytes-out'];
															$size =$bytes ."Bytes";
                                                            if($ARRAY[$i]['bytes-out']>=1073741824){
																$size=$bytes/1073741824;
																$size=round($size,2)."GB";
                                                            echo 
															"".$size."";
                                                            }else if($ARRAY[$i]['bytes-out']<=1073741824){
																$size=$bytes/1073741824;
																$size=round($size,1)."GB";
                                                            echo "".$size."";
                                                            }
                                                            echo "</td>";
															echo "<td>";
                              $bytes =$ARRAY[$i]['bytes-in'];
                              $size =$bytes ."Bytes";
                                                            if($ARRAY[$i]['bytes-in']>=1073741824){
                                $size=$bytes/1073741824;
                                $size=round($size,2)."GB";
                                                            echo 
                              "".$size."";
                                                            }else if($ARRAY[$i]['bytes-in']>=1048576){
                                $size=$bytes/1048576;
                                $size=round($size,1)."MB";
                                                            echo "".$size."";
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
	 </div><!-- /#page-wrapper -->
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
