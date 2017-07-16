<?php
	error_reporting(0);
	session_start();
	if($_SESSION['APIUser'] == ''){
		echo "<meta http-equiv='refresh' content='0;url=login.php' />";
		exit(0);
	}
	unset($_SESSION['id']);
	require('../config/routeros_api.class.php'); // คำสั่งเรียกใช้ Class ภายใน เราเตอร์ มาแสดง บนเว็บไซต์
	include("../include/class.mysqldb.php");     // คำสั่งตรอบสอบการเชื่อมต่อ Mysql
	include("../include/config.inc.php");	       // คำสั่งเชื่อมต่อ Mysql ใน Database
	
	if(!empty($_GET['did'])){ 
		mysql_query("DELETE FROM mt_config WHERE mt_id='".$_GET['did']."'");   
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";  
		exit(0);
	}	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Kthai Api Mikrotik ติดตั้ง Hotspot ราคาถูกแสนถูก 086-990-5488 www.k-thai.net Line : 2521770 </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
   <LINK REL="SHORTCUT ICON" HREF="../img/f5.ico"> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kthai</b>Technology</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- เปิดส่วนแสดงข้อมูลบนเว็บไซต์ -->
<body>

     <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($_SESSION['APIUser']); ?><?php echo ($_SESSION['EmpUser']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>หน้าหลัก</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

		    <li class="treeview">
          <a href="index.php?opt=add_site">
            <i class="glyphicon glyphicon-globe"></i>
            <span>เพิ่มสถานที่บริหารจัดการ </span>
           <span class="label label-primary pull-right"></span>
          </a>
        </li>

        <li>
              <a href="#"><i class="glyphicon glyphicon-user"></i></i> ผู้ดูแลระบบ </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?opt=cus_add"><i class="fa fa-circle-o"></i> เพิ่มผู้ดูแลระบบ</a></li>
                 <li><a href="index.php?opt=cus_list"><i class="fa fa-circle-o"></i> ดูจำนวนผู้ดูแลระบบ</a></li>
              </ul>
        </li>
        <li class="treeview">
              <a href="index.php?opt=change_pass">
                <i class="glyphicon glyphicon-pencil"></i>
                <span>เปลี่ยนรหัสผ่าน</span>
                <span class="label label-primary pull-right"></span>
              </a>

        </li>

        <li class="treeview">
          <a href="../login.php">
            <i class="glyphicon glyphicon-log-out"></i>
            <span>ออกจากระบบ</span>
           <span class="label label-primary pull-right"></span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
		 <?php if(!isset($_REQUEST['opt'])) { ?>
        <!-- Page Content -->
       <div class="content-wrapper">
           <section class="content-header">
      <h1>
        Kthai Technology
        <small>By Kthai Team </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	
	<section class="content">
           
		<div class="row">
                <div class="col-lg-12">
                    <div class="box box-solid box-default">  
                        <div class="panel-heading style4">
                              <span class="style5">ที่อยู่ Server Mikrotik</span>
							  
                          <div class="pull-right">
                            <a href="index.php"><img src="../img/refresh.png" width="20" title="Refresh"></a>                           
							</div>
							</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            	<form name="site" action="" method="post">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	  <th><center><span class="style3">ลำดับ</span></center></th> 
                                            <th><center><span class="style3">ชื่อสถานที่บริหารจัดการ</span></center></th> 
                                            <th><center><span class="style3">สถานที่</span></center></th>                                                                       	
                                            <th><center><span class="style3">ซีพียู</span></center></th>                                           
                                            <th><center><span class="style3">แรม</span></center></th>
                                            <th><center><span class="style3">ฮาร์ดดิส</span></center></th>                                            
                                            <th><center><span class="style3">สถานะ</span></center></th>
                                   			    <th><center><span class="style3">จัดการ</span></center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$sql=mysql_query("SELECT * FROM mt_config");
													$no=0;
													while($result=mysql_fetch_array($sql)){
													$no++;
													$API = new routeros_api();				
													$API->debug = false;
													if($API->connect($result['mt_ip'], $result['mt_user'], $result['mt_pass'])){																			
														$ARRAY = $API->comm("/system/resource/print");	
														$ram =	$ARRAY['0']['free-memory']/1048576;
														$hdd =	$ARRAY['0']['free-hdd-space']/1048576;												
													}																												
													echo "<tr>";
														echo "<td>".$no."</td>";																																							
														echo "<td>".$result['mt_name']."</td>";														
														echo "<td>".$result['mt_location']."</td>";
														echo "<td>";
														if($ARRAY['0']['cpu-load']==""){ 
															echo "-";
														}else{
															echo $ARRAY['0']['cpu-load']."%";															 							
														}
														echo "</td>";
														echo "<td>".round($ram,1)." MB</td>";
														echo "<td>".round($hdd,1)." MB</td>";
														echo "<td>";
															if($API->connect($result['mt_ip'], $result['mt_user'], $result['mt_pass'])){
																echo "<button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-check\"></i> CONNECT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>";
																$conn="connect";	
															}else{
																echo "<button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-times\"></i> DISCONNECT</button>";
																$conn="disconnect";
															}																	
														echo "</td>";	
																											
														echo "<td><a href='../site/site_conn.php?id=".$result['mt_id']."&conn=".$conn."'><button type=\"button\" class=\"btn btn-success\" title=\"เข้าบริหารจัดการ\"><i class=\"fa fa-paper-plane-o\"></i></button></a>
														<a href='index.php?opt=edit_site&id=".$result['mt_id']."'><button type=\"button\" class=\"btn btn-info\" title=\"แก้ไข\"><i class=\"fa fa-edit\"></i></button></a>
														<a href='javascript:void(0)' onClick=\"JavaScript:if(confirm('คุณต้องการลบหรือไม่!!!')==true)
                {window.location='index.php?did=".$result['mt_id']."'}\"><button type=\"button\" class=\"btn btn-danger\" title=\"ลบ\"><i class=\"fa fa-trash-o\"></i></button></a>";												
													echo "</td>";
													echo "</tr>";
													}
												?>
                                                                                                                                                                              
                                    </tbody>
                                </table>
                               </form>
                            </div>
                           
        </div>
		
        <!-- /#page-wrapper -->
</div>
    </section>
	</div>
	</div>

<!-- /#wrapper -->
		 <?php
				 } else { 
            		include($_REQUEST['opt'] . ".php"); 
                 } 
          ?>

		 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
       
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
 <LINK REL="SHORTCUT ICON" HREF="../img/nongbua.ico"> 
   
    <script src="../dist/js/demo.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>  

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team 
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">KThai Technology</a>.</strong> All rights
  </footer>

</body>

</html>

