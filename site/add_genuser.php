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
                    Kthai Team
                    <small>Desing By Kthai Team</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                    <li class="active">Hotspot</li>
                    <li class="active">Add Gennarage User 0-9</li>
                  </ol>
            </section>
    <section class="content"> 
     <!-- Page Content -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">                           
                    <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp; เพิ่มผู้ใช้งานอินเตอร์เน็ต แบบกลุ่มตัวเลข 0-9 </h3>
                    </div>
		          <div class="panel-heading">
		            
		              <div class="panel-body">
		                <form id="add_user" action="con_genuser.php" method="post">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><strong>อักษรนำหน้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                <input name="prefix" type="text" class="form-control" maxlength="5" placeholder="กรอกเป็นภาษาอังกฤษเท่านั้น ตัวอย่าง : NB (สูงสุด 3 ตัวอักษร)">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><strong>จำนวนผู้ใช้งาน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                <input type="text" name="total" placeholder="กรุณากรอกจำนวนผู้ใช้งาน" class="form-control" required>
                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนชื่อผู้ใช้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="username" size="1" id="username">
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected="selected">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนรหัสผ่าน&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="password" size="1" id="password">
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected="selected">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>เลือกกลุ่มผู้ใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile">
                        <?php
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
													}
												?>
                                            </select>
                                        </div>                                        
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>   
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
      </div>
                <!-- /#page-wrapper -->
    </select>    
  </div>
  </section>
  </div>
            <!-- /#wrapper -->
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>
</body>
</html>
