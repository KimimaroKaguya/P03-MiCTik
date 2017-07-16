<?php
      include_once('../phpqrcode/qrlib.php');
      include_once('../config/routeros_api.class.php');     
      //include_once('conn.php'); 
      include_once("../include/class.mysqldb.php");
  
    
    if($_REQUEST['check']!=""){     
        for($i=0;$i < count($_REQUEST['check']);$i++){
          
          $user=$_REQUEST['check'][$i];
          
          mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
          $ARRAY = $API->comm("/ip/hotspot/user/remove", array(
                      "numbers" => $user,
                    )); 
              
        //  mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
        //  $ARRAY = $API->comm("/ppp/secret/remove", array(
        //              "numbers" => $user,
        //            )); 

        //  mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
        //  $ARRAY = $API->comm("/tool/user-manager/user/remove", array(
        //              "numbers" => $user,
        //            )); 

          $img = $user.".png";
          unlink("../qrcode/".$img);          
        }
        echo "<script>alert('ทำการลบผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?opt=userall' />";
        exit();     
        }

   ini_set('display_errors', 1);
    $serverName = "localhost";       //ที่อยู่ฐานข้อมูล
    $userName = "root";                  // ชื่อ username เข้าฐานข้อมูล
    $userPassword = "mikrotikthailand";    // รหัสผ่านเข้าฐานข้อมูล  
    $dbName = "api_mikrotik";          // ชื่อ database ที่เราตั้งชื่อไว้
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>โปรแกรมธนาคารความดี</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<LINK REL="SHORTCUT ICON" HREF="../dist/img/nongbuaicon.ico">       <!--+++++++  คำสั่งเรียกใช้ ภาพ ของ icon แสดงบน title bar ++++++++-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
</script>



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


   <header class="main-header">
    <!-- Logo -->
                      <a href="index.php" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                                  <span class="logo-mini"><b>N</b>B</span>
                        <!-- logo for regular state and mobile devices -->
                                  <span class="logo-lg"><b>NONGBUA </b> School</span>
                      </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
       <span class="sr-only">หัวข้อรายการ</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  
                  <small> </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-8 text-center">
                    <a href="#">สถานะผู้เข้าใช้งานล่าสุด :</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../index.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>


<!-- เปิดส่วน แถบข้อมูลด้านซ้ายบนเว็บ แสดงสถานะ ผู้เข้าใช้งาน -->
   <!-- Left side column. contains the logo and sidebar -->
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
      <!-- เปิดส่วนค้นหาข้อมูล  search form -->
            <form action="search_user1.php" method="get" class="sidebar-form">
                          <div class="input-group">
                                  <input type="text" name="user_id" class="form-control" placeholder="ค้นหาด้วย รหัสนักเรียน">
                                            <span class="input-group-btn">

                                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                            </span>
                          </div>
            </form>
      <!-- /.search form -->
      <!-- /.search form -->
   <!-- ปิดส่วน แถบข้อมูลด้านซ้ายบนเว็บ แสดงสถานะ ผู้เข้าใช้งาน -->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>


      <!--ส่วนเปิดของ เมนูบาร์ -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
            <li class="header">รายการข้อมูล</li>
                  <li class="active treeview">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>หน้าแรก</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                              </a>
                    </li>
            </ul>

       </section>    <!-- /.sidebar -->
  </aside>
  <!-- ปิดส่วนของ เมนูบาร์ -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ค้นหาข้อมูลผู้ใช้งานอินเตอร์เน็ต
        <small>Design By Manas Panjai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#">ข้อมูล</a></li>
        <li class="active">ข้อมูลนักเรียน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
              <!-- ส่วนเปิด แสดงแถบสีสถานะข้อมูล 4 สี -->
                      <div class="row">

                             <!-- ./col -->
                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                  <div class="inner">
                                    <h3><? print"$teacher_sum_score";?>&nbsp;&nbsp;<sup style="font-size: 20px">คน</sup></h3>

                                    <p>จำนวนคุณครู</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">ดูข้อมูลครู <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                  <div class="inner">
                                    <h3><? print"$student_sum_score";?>&nbsp;&nbsp;<sup style="font-size: 20px">คน</sup></h3>

                                    <p>จำนวนนักเรียน</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">ดูข้อมูลนักเรียน&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                              <!-- ./col -->
                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                  <div class="inner">
                                    <h3><? print"$guest_sum_score";?>&nbsp;&nbsp;<sup style="font-size: 20px">คน</sup></h3>

                                    <p>จำนวนแขก</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">ดูข้อมูลแขก&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                           
                              <!-- ./col -->
                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                  <div class="inner">
                                    <h3><? print"$bit_sum_score";?>&nbsp;&nbsp;<sup style="font-size: 20px">คน</sup></h3>

                                    <p>จำนวนผู้โหลดบิต</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                  </div>
                                  <a href="#" class="small-box-footer">ดูข้อมูลผู้โหลดบิต <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                            </div>
<!-- ส่วนปิด แสดงแถบสีสถานะข้อมูล 4 สี -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ข้อมูลผู้ใช้งานอินเตอร์เน็ต</h3>
                          </div>
                                        <center>
                                        <?php
                                        $user = $_GET['user_id'];

                                        ?>
                                                        
                                        </center>
                       <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                
                                    <thead>

                                         <!-- ส่วนเปิด หัวข้อแสดงตาราง -->
                                        <tr>
                                            
                                            <th width="10%">&nbsp;&nbsp;ทั้งหมด&nbsp;&nbsp;<input type="checkbox" id="selecctall"/></th>
                                            <th>No.</th>  
                                            <th>ชื่อ</th>   
                                            <th>รหัสผ่าน</th>
                                                                            
                                            <th>กลุ่มผู้ใช้งาน</th>
                                            <th>Comment</th>
                                            <th>เวลาเพิ่มผู้ใช้งาน</th>
                                                                                       
                                            <th>แก้ไข / พิมพ์</th>
                                        </tr>
                                         <!-- ส่วนปิด หัวข้อแสดงตาราง -->
                                    </thead>
                        <tbody>
                        <?php
                                $hostname = "localhost";
                                $username = "root";
                                $password = "mikrotikthailand";
                                $dbName = "api_mikrotik";
                                $connect = mysqli_connect($hostname,$username,$password,$dbName);
                          $user = $_GET['user_id'];
                          $sql = "SELECT * FROM  mt_gen  WHERE  user  LIKE  '%$user%'   ORDER BY   `user`  ASC"; 
                          //$query=mysql_query("SELECT * FROM mt_gen WHERE  user  LIKE  '%$user%'   ORDER BY   `user`  ASC");
                          $query=mysqli_query($connect, $sql);
                          $i=0;
                          while($result=mysqli_fetch_array($query)){
                            $i++;
                          echo "<tr>";
                            echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$result['user']."></center></td>";
                            echo "<td>".$i."</td>";  
                            echo "<td>".$result['user']."</td>"; 
                            echo "<td>".$result['pass']."</td>";             
                            echo "<td>".$result['profile']."</td>";
                            echo "<td>".$result['status']."</td>";
                            echo "<td>".$result['date']."</td>";
                                           
                          //  ส่วนเปิด ตรงปุ่มแก้ไข พิมพ์ ลบ
                                                        echo "<td>
                                                            <a href='index.php?opt=edit_user&id=".$result['user']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-edit\"></i></button></a>
                                                            <a href='print.php?user&id=".$result['user']."' target='_blank'><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-print\"></i></button></a>
                                                            <a href='user_del.php?name=".$result['user']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a>
                                                            

                                                            </td>";
                           //  ส่วนปิด ตรงปุ่มแก้ไข พิมพ์ ลบ                                  
                          // echo "<a href='index.php?opt=user&id=".$result['date']."' title='view'><img src='../img/search.png' width=20px></a>";
                          // echo "&nbsp;<a href='print.php?id=".$result['date']."' title='Print' target='_blank'><img src='../img/print.png' width=20px></a></td>";                           
                          echo "</tr>";

                          }
                        ?>                                       
                                    </tbody>
                                </table>
                            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                          
<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User </h4>
              </div>
              <div class="modal-body">
                <form id="add_user" action="con_adduser.php" method="post">
                              <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="กรุณากรอกชื่อผู้ใช้งานเป็นภาษาอังกฤษเท่านั้น" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Password&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Profile&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile" data-toggle="tooltip" data-placement="top" title="กรุณาเลือกกลุ่มผู้ใช้งานอินเตอร์เน็ต">
                                              <?php
                          $num =count($ARRAY1);
                          for($i=0; $i<$num; $i++){
                            $seleceted = ($i == 0) ? 'selected="selected"' : '';
                            echo '<option value="'.$ARRAY1[$i]['name'].$selected.'">'.$ARRAY1[$i]['name'].'</option>';
                          }
                        ?>
                                            </select>
                                     </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>  

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button>
                            <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>
                          </div>
              
                </form>
               </div>
             </div>
            </div>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
   
        <!-- Modal -->
        <div class="modal fade" id="import_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import User </h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" name="form1">

                    <div class="form-group input-group">
                                            <span class="input-group-addon">Profile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select  class="form-control" name="profile" size="1" id="profile" data-toggle="tooltip" data-placement="top" title="กรุณาเลือกกลุ่มผู้ใช้งานอินเตอร์เน็ต">
                                              <?php
                        
                          $num =count($ARRAY2);
                          for($i=0; $i<$num; $i++){
                            $seleceted = ($i == 0) ? 'selected="selected"' : '';
                            echo '<option value="'.$ARRAY2[$i]['name'].$selected.'">'.$ARRAY2[$i]['name'].'</option>';
                          }
                        ?>
                                            </select>



                                        </div>
    
                    <div> <input name="fileCSV" type="file" id="fileCSV"> </div>
                  <br>
 
                  <div class="form-group input-group">                                        
                    <button name="submit" type="submit"  value="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
                    <button id="btnSave" class="btn btn-warning" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>&nbsp;&nbsp;&nbsp; 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>  &nbsp;&nbsp;&nbsp; 

                    <a href="../site/username.csv" target="_blank"><button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> ตัวอย่างไฟล์ CSV    </button> </a>

                                    </div>
        </form>
               </div>
             </div>
            </div>
            <?


if(isset($_POST['submit']) && $_POST['submit']=='submit'){
  $pro=$_REQUEST['profile'];


move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
//copy($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
if (($objCSV)== ''){

echo "Error Upload & Import Done.";
exit;
}
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {


    $username_add=$objArr[0];    //user ดึงมาจาก .csv (col 1)
    $password_add=$objArr[1];    //password ดึงมาจาก .csv (col 2)
    $status=$objArr[2];    //password ดึงมาจาก .csv (col 3)
    $hotspot_server = 'all';    // เปลี่ยน hotspot server mikrotik เป็นของตัวเอง   ของผมมีอันเดียว hotspot1 fix ไว้เลย
    $hotspot_profile = $_REQUEST['profile'];         // เปลี่ยน  user profile เป็นของตัวเอง  ของผม  2m เป็นหลัก fix ไว้เลย
    $limit_uptime=$objArr[3].'30d 00:00:00';    // limit uptime  ตั้งให้ใช้ได้ กี่วัน ดึงมาจาก .csv (col 3)  (ex รูปแบบ 30d 00:00:00 คือใช้ได้  30วัน)
  $id=$_SESSION['id'];
  //$date=date('Y-m-d H:i');
    $name="$objArr[4]"; 
  
    if($username_add  != '' ){
      $API = new routeros_api();
      $API->debug = true;
      $ARRAY = $API->comm("/ip/hotspot/user/add", array(
                    $username=$username_add,
                    $password=$password_add,
                    $profile=$hotspot_profile,
                    $commemt=$status,  
                    
              ));
    



    $file=$username_add.".png";
    QRcode::png('http://'.$ip.'/login?username='.$username_add.'&password='.$password_add.'', '../qrcode/'.$file.'');
    mysql_query("SET NAMES TIS-620");
    
    $add=mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profile."','".$file."',NOW(),'".$id."','".$status."')"); 
    if ($API->connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){
echo "connect ok<br>";

echo $name;
//exit();
    $username="=name=".$username_add;

    $pass="=password=".$password_add;

    $server="=server=".$hotspot_server;

    $uptimes="=limit-uptime=".$limit_uptime;
        
    $profile="=profile=".$hotspot_profile;
    $comment="=comment=". $status;
    
      $API->write('/ip/hotspot/user/add',false);
      $API->write($username, false);
      $API->write($pass, false);
      $API->write($server, false);
    $API->write($uptimes, false);
    $API->write($comment, false);

    $API->write($profile);
    $items = $API->read();
    $API->disconnect();
   }  
  }
}

    echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?opt=userall'/>";
    exit();
}
?>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
  

  <!-- เปิดส่วน แสดงข้อความ ด้านล่างเว็บไซต์ เรียกว่า Footer -->
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - 2017 <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>
  <!-- ปิดส่วน แสดงข้อความ ด้านล่างเว็บไซต์ เรียกว่า Footer -->
  
  <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!-- เปิดส่วน แสดงการตั้งค่าเว็บไซต์ อยู่ตรงด้านข้างขวาของเว็บ Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <!--  <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>    ลิ้งแสดงไอคอนการตั้งค่าเว็บไซต์  -->

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->

      <!-- /.tab-pane -->
    </div>
  </aside>
    <!-- ปิดส่วน แสดงการตั้งค่าเว็บไซต์ อยู่ตรงด้านข้างขวาของเว็บ Control Sidebar -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
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
