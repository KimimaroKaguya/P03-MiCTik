<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ppp/profile/print");
			
									   								
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
                Kthai Team
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">PPPoe</li>
                <li class="active">Add Secret</li>
              </ol>
            </section>
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">                              
                                <div class="panel-heading">
                                    <div><h4><i class="fa fa-user-plus"></i> &nbsp;&nbsp;สร้างผู้ใช้งานสำหรับ PPPoE</h4></div>
                                </div>
                                <div class="panel-body">
                                   <form id="add_pppoe" action="con_addpppoe.php" method="post">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>ชื่อผู้ใช้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>รหัสผ่าน&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>แพคเกจ&nbsp;&nbsp;&nbsp;</strong></span>
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
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>






</body>
</html>
