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
 <div class="content-wrapper"> 
             <section class="content-header">
              <h1>
                โปรแกรมบริหารจัดการอินเตอร์เน็ต โรงเรียน
                <small>Desing By Manas Panjai</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <li class="active">Hotspot</li>
                <li class="active">Add Profile</li>
              </ol>
            </section>
      <section class="content">

            <div class="row">
                <div class="col-md-12">
                           <div class="panel panel-default">                             
                                 <div class="box-header">
                                     <h3 class="box-title"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp; เพิ่มกลุ่มผู้ใช้งานอินเตอร์เน็ต โรงเรียน </h3>    
                                </div>
                  <div class="panel-body">
		                           <form id="add_user" action="con_addprofile.php" method="post">
								   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>ชื่อกลุ่มผู้ใช้งาน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="กำหนดชื่อกลุ่มผู้ใช้งาน" class="form-control" required>
                                        </div>
										<hr>

                                <!--        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Session Timeout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="session" placeholder="เวลาในการออนไลน์กับระบบ (ชั่วโมง:นาที:วินาที)" value="" class="form-control" required>
                                        </div>  -->

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>กำหนดเวลาตัดการเชื่อมต่อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="idle" placeholder="เวลาในการเชื่อมต่อระบบ (ชั่วโมง:นาที:วินาที)" class="form-control" value="none" required>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Keepalive Timeout</strong></span>
                                            <input type="text" name="keep" placeholder="เวลาในการคงอยู่ในระบบ (ชั่วโมง:นาที:วินาที)" class="form-control" value="01:00:00" required>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status Autorefresh</strong></span>
                                            <input type="text" name="auto" placeholder="เวลาการอัพเดตสถานะ (ชั่วโมง:นาที:วินาที)" class="form-control" value="00:01:00" required>
                                        </div>										
										<hr>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>กำหนดระยะเวลาการใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="uptime" placeholder="ระยะเวลาการให้บริการ (ตัวอย่าง : 1d [หนึ่งวัน] หรือ 1h [หนึ่งชั่วโมง])" class="form-control" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>แชร์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="use" placeholder="จำนวนผู้ใช้งานอินเตอร์เน็ต" class="form-control" value="1" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>กำหนดความเร็ว&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="ความเร็วที่ให้บริการ Upload/Download (ตัวอย่าง : 1m/5m)" class="form-control">
                                        </div>										
                                                                      
                                      
                          <!--            <div class="form-group input-group">
                                            <span class="input-group-addon">Address List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select class="form-control" name="address" size="1" id="address">
                                            	<?php
													$List = $API->comm("/ip/firewall/address-list/print");
													$num =count($List);		
														echo '<option value=""></option>';
													for($i=0; $i<$num; $i++){														
														echo '<option value="'.$List[$i]['list'].'">'.$List[$i]['list'].'</option>';
													}
												?>
                                            </select>
                                        </div>                  -->

									<div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  &nbsp;&nbsp;&nbsp;                                     
                                        <button id="btnCancel" class="btn btn-danger" type="cancel" Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button></a>
                                    </div>
										
                                    </form>
		                        </div>		                        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /#page-wrapper -->
          </div>
            <!-- /#wrapper -->
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>
</body>
</html>
