<?php
    ini_set('display_errors', 1);
    //error_reporting(~0);
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "9i8u7y6t";
    $dbName = "nb_school";
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    $sql = "SELECT * FROM  tb_data_std "; 
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)) {
          $std_total_score = $row['id_std'];
          $std_sum_score = $std_sum_score + $std_total_score ;


                                                                                        };

  $sql = "SELECT * FROM  tb_data_teacher "; 
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)) {
          $tec_total_score = $row['id_tec'];
          $tec_sum_score = $tec_sum_score + $tec_total_score ;


                                                                                        };

    $sql = "SELECT * FROM  tb_data_positive_std "; 
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)) {
          $pst_total_score = $row['id_pst'];
          $pst_sum_score = $pst_sum_score + $pst_total_score ;


                                                                                        };

    $sql = "SELECT * FROM  tb_data_negative_std "; 
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)) {
          $ngt_total_score = $row['id_ngt'];
          $ngt_sum_score = $ngt_sum_score + $ngt_total_score ;


                                                                                        };
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Nongbua School | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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

          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">ผู้ดูแลระบบ</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Nongbua School - Web Developer
                  <small>By Student</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
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
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ผู้ดูแลระบบ</p>
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

      <!--ส่วนเปิดของ เมนูบาร์ -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">รายการข้อมูล</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>หน้าแรก</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <!--
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        -->

<!--ส่วนเปิดของ เมนู ความดีนักเรียน -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ความดีนักเรียน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_positive_total.php"><i class="fa fa-circle-o"></i> ดูสถิติความดีของนักเรียน</a></li>
            <li><a href="view_negative_total.php"><i class="fa fa-circle-o"></i> ดูสถิตินักเรียนกลุ่มเสี่ยง</a></li>
            <li><a href="add_data_positive_std.php"><i class="fa fa-circle-o"></i> ฝากความดี</a></li>
            <li><a href="add_data_negative_std.php"><i class="fa fa-circle-o"></i> ถอนความดี</a></li>
            <li><a href="view_condition_score.php"><i class="fa fa-circle-o"></i> เกณฑ์การให้คะแนน</a></li>
            <li><a href="edit_condition_score.php"><i class="fa fa-circle-o"></i> แก้ไขเกณฑ์การให้คะแนน</a></li>

          </ul>
        </li>
<!--ส่วนปิดของ เมนู ความดีนักเรียน -->

<!--ส่วนเปิดของ เมนู ข้อมูลนักเรียน -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>ข้อมูลนักเรียน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_datatotal_std.php"><i class="fa fa-circle-o"></i> ดูข้อมูลนักเรียนทั้งหมด</a></li>
             <li><a href="add_data_std.php"><i class="fa fa-circle-o"></i> เพิ่มข้อมูลนักเรียน</a></li>
            <li><a href="edit_data_std"><i class="fa fa-circle-o"></i> แก้ไขข้อมูลนักเรียน</a></li>
            <li><a href="import_data_stu_csv.php"><i class="fa fa-circle-o"></i> เพิ่มข้อมูลแบบ Import CSV</a></li>
          </ul>
        </li>
<!--ส่วนปิดของ เมนู ข้อมูลนักเรียน -->

<!--ส่วนเปิดของ เมนู ข้อมูลคุณครู -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>ข้อมูลคุณครู</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_datatotal_teacher.php"><i class="fa fa-circle-o"></i> ดูข้อมูลคุณครู</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> แก้ไขข้อมูลคุณครู</a></li>
            <li><a href="add_data_teacher.php"><i class="fa fa-circle-o"></i> เพิ่มข้อมูลคุณครู</a></li>
            <li><a href="import_data_teacer_csv.php"><i class="fa fa-circle-o"></i> เพิ่มข้อมูลแบบ Import CSV</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> ข้อมูลครูที่ปรึกษา</a></li>
          </ul>
        </li>
<!--ส่วนปิดของ เมนู ข้อมูลคุณครู -->

<!--ส่วนเปิดของ เมนู สรุปผลรายงานผล -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>สรุปผลรายงานผล</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
<!--ส่วนปิดของ เมนู สรุปผลรายงานผล -->

<!--ส่วนเปิดของ เมนู ปฏิทินกิจกรรม -->
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>ปฏิทินกิจกรรม</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
<!--ส่วนปิดของ เมนู ปฏิทินกิจกรรม -->

<!--ส่วนปิดของ เมนู คู่มือการใช้โปรแกรม -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>คู่มือการใช้โปรแกรม</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        
<!--ส่วนปิดของ เมนู คู่มือการใช้โปรแกรม -->    

<!--ส่วนปิดของ เมนู ผู้ดูแลระบบ --> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>ผู้ดูแลระบบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
<!--ส่วนปิดของ เมนู ผู้ดูแลระบบ --> 


    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- ส่วนเปิดแสดงข้อมูลทั่วไป ตรงกลาง  -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        โปรแกรมธนาคารความดีโรงเรียนหนองบัว
        <small>ข้อมูลทั่วไป</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">ข้อมูลทั่วไป</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

      <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><? print"$std_sum_score";?>&nbsp&nbsp<sup style="font-size: 20px">คน</sup></h3>

              <p>จำนวนนักเรียน</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">ดูข้อมูลนักเรียน <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><? print"$tec_sum_score";?>&nbsp&nbsp<sup style="font-size: 20px">คน</sup></h3>

              <p>จำนวนคุณครู</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">ดูข้อมูลคุณครู <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><? print"$pst_sum_score";?>&nbsp&nbsp<sup style="font-size: 20px">คน</sup></h3>

              <p>จำนวนผู้ฝากความดี</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">ดูข้อมูลผู้ฝากความดี<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><? print"$ngt_sum_score";?>&nbsp&nbsp<sup style="font-size: 20px">คน</sup></h3>

              <p>จำนวนผู้ถูกตัดคะแนน</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">ดูข้อมูลผู้ถูกปรับ <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- ปิดส่วนแสดงสถานะข้อมูล แถบ 4 สี-->



      <!-- ส่วนเปิดของ Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          
<!-- ส่วนปิดแสดงรายชื่อผู้ทำความดี a box -->

<!-- ส่วนเปิด แสดง ตารางผู้ฝากความดี a box -->
          <!-- /.box -->
<div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ผู้ทำความดีล่าสุด</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No.</th>
                  <th width="10%">ชื่อ - นามสกุล</th>
                  <th width="15%">รายการ</th>
                  <th width="2%">คะแนน</th>
                  <th width="4%">วันที่</th>
                  </tr>
                </thead>
                <tbody>
                                                              <?php
                                                                                  ini_set('display_errors', 1);
                                                                                  error_reporting(~0);
                                                                                  $hostname = "localhost";
                                                                                  $username = "root";
                                                                                  $password = "9i8u7y6t";
                                                                                  $dbName = "nb_school";
                                                                                  $conn = mysqli_connect($hostname,$username,$password,$dbName);
                                                                             $sql = "SELECT * FROM  tb_data_positive_std INNER JOIN  tb_data_std ON  tb_data_positive_std . std_id=tb_data_std . std_id   ORDER BY   `pst_id`  DESC";   // ASC เรียงจากน้อยไปมาก  DESC เรียงจากมากไปน้อย
                                                                              $query = mysqli_query($conn, $sql);
                                                                              $num=0;
                                                                              while ( $row = mysqli_fetch_array( $query ) )
                                                                                                                { 
                                                                                             $num=$num+1;
                                                                                              $std_id = $row['std_id'];
                                                                                              $std_prefix = $row['std_prefix'];
                                                                                              $std_name = $row['std_name'];
                                                                                              $std_lastname = $row['std_lastname'];
                                                                                              $pst_data = $row['pst_data'];
                                                                                              $pst_score =  $row['pst_score'];
                                                                                              $pst_date = $row['pst_date'];
                                                                 ?>
                                                                                                          <tr>
                                                                                                                <td> <center><? print"$num";?></center></td>
                                                                                                                <td> <? print"$std_prefix";?> <? print"$std_name";?>&nbsp&nbsp&nbsp&nbsp&nbsp<? print"$std_lastname";?></td>
                                                                                                                <td><? print"$pst_data";?></td>
                                                                                                                <td><center><? print"$pst_score";?></center></td>
                                                                                                                <td><? print"$pst_date";?></td>

                                                                                                          </tr>
                                                                                              <? }  ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     </div>
</div>     <!-- /.box -->
<!-- ส่วนปิดแสดงรายชื่อผู้ทำความดี a box -->

<!-- ส่วนเปิด แสดง ตารางผู้ถูกตัดคะแนน a box -->
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ผู้ถูกตัดคะแนนล่าสุด</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%">No.</th>
                  <th width="10%">ชื่อ - นามสกุล</th>
                  <th width="15%">รายการตัดคะแนน</th>
                  <th width="2%">คะแนน</th>
                  <th width="4%">วันที่</th>
                  </tr>
                </thead>
                <tbody>
                                                              <?php
                                                                                  ini_set('display_errors', 1);
                                                                                  error_reporting(~0);
                                                                                  $hostname = "localhost";
                                                                                  $username = "root";
                                                                                  $password = "9i8u7y6t";
                                                                                  $dbName = "nb_school";
                                                                                  $conn = mysqli_connect($hostname,$username,$password,$dbName);
                                                                             $sql = "SELECT * FROM  tb_data_negative_std INNER JOIN  tb_data_std ON  tb_data_negative_std . std_id=tb_data_std . std_id   ORDER BY   `ngt_id`  DESC";   // ASC เรียงจากน้อยไปมาก  DESC เรียงจากมากไปน้อย
                                                                              $query = mysqli_query($conn, $sql);
                                                                              $num=0;
                                                                              while ( $row = mysqli_fetch_array( $query ) )
                                                                                                                { 
                                                                                             $num=$num+1;
                                                                                              $std_id = $row['std_id'];
                                                                                              $std_prefix = $row['std_prefix'];
                                                                                              $std_name = $row['std_name'];
                                                                                              $std_lastname = $row['std_lastname'];
                                                                                              $ngt_data = $row['ngt_data'];
                                                                                              $ngt_score =  $row['ngt_score'];
                                                                                              $ngt_date = $row['ngt_date'];
                                                                 ?>
                                                                                                          <tr>
                                                                                                                <td> <center><? print"$num";?></center></td>
                                                                                                                <td> <? print"$std_prefix";?> <? print"$std_name";?>&nbsp&nbsp&nbsp&nbsp&nbsp<? print"$std_lastname";?></td>
                                                                                                                <td><? print"$ngt_data";?></td>
                                                                                                                <td><center><? print"$ngt_score";?></center></td>
                                                                                                                <td><? print"$ngt_date";?></td>

                                                                                                          </tr>
                                                                                              <? }  ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- ส่วนปิดแสดงรายชื่อผู้ทำความดี a box -->



<!-- ส่วนเปิด  แสดงกราฟ Line Chart -->
      <div class="nav-tabs-custom"> 
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>

          </div>
<!-- ส่วนปิด  แสดงกราฟ Line Chart -->


        </section>

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->



        <section class="col-lg-5 connectedSortable">

<!-- ส่วนเปิด กราฟสถิติความดี box -->

          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                สถิติความดี
              </h3>
            </div>
            <!-- ส่วนเปิดตารางกราฟ-->
            <div class="box-body">
              <div id="line-chart" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- ส่วนปิดตารางกราฟ-->
            <!-- /.box-body-->

          </div>
<!-- ส่วนปิด กราฟสถิติความดี box -->

          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                สถิติความดี
              </h3>
            </div>
            <!-- ส่วนเปิดตารางกราฟ-->
            <div class="box-body">
              <div id="" style="height: 250px; width: 100%;"></div>

            </div>
            <!-- ส่วนปิดตารางกราฟ-->
            <!-- /.box-body-->

          </div>

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Desing by Student</b> 
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="www.nongbua.ac.th" target="blank">โรงเรียนหนองบัว</a>.</strong> จังหวัดนครสวรรค์
  </footer>


<!-- ส่วนควบคุม การตั้งค่าเว็บ -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
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
<!-- ./wrapper -->
<footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>




<!-- jQuery 2.2.3 -->

<!--เชื่อตาราง แสดงรายชื่อผู้ฝากความดี DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>




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
