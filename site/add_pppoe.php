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
        <section class="content">

            <div class="row">
                <div class= "col-md-6 col-md-offset-3">
		                     <div class="box box-solid box-primary">                              
		                        <div class="box-header">
                                     <h3 class="box-title"><i class="fa fa-wifi"></i> สร้างผู้ใช้งานสำหรับ PPPoE</h4>
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
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-undo"></i>&nbsp;เริ่มใหม่&nbsp;</button>
                                    </div> 
                                    </form>
		                        </div>		                        
                        </div>
						</div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->
        
            </div>
			</section>
            <!-- /#wrapper -->
</body>
</html>
