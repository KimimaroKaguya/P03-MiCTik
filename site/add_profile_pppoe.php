<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ppp/profile/print");
            $ARRAY = $API->comm("/ip/pool/print");
									   								
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
                โปรแกรมบริหารจัดการอินเตอร์เน็ต
                <small>Desing By Manas Panjai</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">PPPoe</li>
                <li class="active">Add Profile</li>
              </ol>
            </section> 
      <section class="content">
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">                              
                                <div class="panel-heading">
                                    <div><h4><i class="fa fa-user-plus"></i> &nbsp;&nbsp;สร้างโปรไฟล์ PPPoE</h4></div>
                                </div>
                                <div class="panel-body">
                                   <form id="add_user" action="con_addprofile_pppoe.php" method="post">
                                   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="กำหนดชื่อแพคเกจ" class="form-control" required>
                                        </div>

                                       <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Remost Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="local" placeholder="กรุณากรอกไอพีเครื่องเซิฟเวอร์ (ตัวอย่างเช่น 10.0.0.1)" class="form-control" required>
                                        </div>                
                                      
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Pool Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="remote" size="1" id="remote">
                                                <?php
                                                    $List = $API->comm("/ip/pool/print");
                                                    $num =count($List);     
                                                        echo '<option value="">กรุณาเลือกช่วงไอพีที่ต้องการ</option>';
                                                    for($i=0; $i<$num; $i++){                                                       
                                                        echo '<option value="'.$List[$i]['name'].'">'.$List[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>   

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Rate Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="ความเร็วที่ให้บริการ Upload/Download (ตัวอย่าง : 1m/5m)" class="form-control" required>
                                        </div>
                                                                   
                                    <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  &nbsp;&nbsp;&nbsp;                                     
                                        <button id="btnCancel" class="btn btn-danger" type="cancel" Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button></a>
                                    </div>
                                        
                                    </form>
                                </div>                              
                        </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>






</body>
</html>
