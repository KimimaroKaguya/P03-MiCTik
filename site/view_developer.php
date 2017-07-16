<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");		
			
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
		
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        คณะผู้พัฒนา API MIKROTIK 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#">ผู้จัดทำ</a></li>
        <li class="active">รายละเอียดผู้จัดทำ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/user1.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">ปาริฉัตร &nbsp;&nbsp;&nbsp;  ชมดี</h3>

              <p class="text-muted text-center">จัดทำและออกแบบ</p>
              <center><p>ตำแหน่ง Program Develop</p></center>
              <ul class="list-group list-group-unbordered">
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/user2.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">อั่งเปา</h3>

              <p class="text-muted text-center">ผู้ให้กำลังใจ</p>
              <center><p>คิดอะไรไม่ออกมองหาอั่งเปา</p></center>
              <ul class="list-group list-group-unbordered">


              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/user3.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">อิงค์สง่า ชมดี</h3>

              <p class="text-muted text-center">ผู้จัดทำและที่ปรึกษา</p>
              <center><p>กรรมการผุ้บริหาร บริษัท</p></center>
              <ul class="list-group list-group-unbordered">
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

        </div> <!-- /.row -->
        <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">ที่ปรึกษาโครงงาน</a></li>
              <li><a href="#timeline" data-toggle="tab">รู้จัก Kthai Team</a></li>
              <li><a href="#settings" data-toggle="tab">เกี่ยวกับ KthaiTechnology/</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../dist/img/user2-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">กร ชมดี</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">กรรมการบริษัท</span>
                  </div>
                  <p>

                  </p>
                  
                </div>
                <!-- /.post -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->

                  <p>
                     เว็บไซต์ http://www.k-thai.net/<hr>
        facebook https://www.facebook.com/KthaiTechnology/<hr>
        Line ID 2521770  <hr>
      
                  </p>
       
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                                  <p>
                    Api Mikrotik Kthai ทีมงานจัดทำให้ท่าน Download ไปใช้งานฟรี โดยไม่คิดค่าใช้จ่าย
					โดยแก้ Bug บางส่วน ให้ท่านนำไปแก้ไขเอง 
					อีกอย่าง ขอให้ท่านที่ Download ไปใช้ห้ามนำไปซื้อขายเด็ดขาด ถ้าท่านนำไปขาย
					ขอให้ท่านเป็นโสดตลอดชีวิต หาแฟนไม่ได้ ทั้งชาตินี้และชาติหน้า อิอิอิ
			
                  </p>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->

          </div>
          <!-- /.nav-tabs-custom -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Technology
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">www.k-thai.net</a>.</strong> All rights
  </footer>
</body>
</html>
