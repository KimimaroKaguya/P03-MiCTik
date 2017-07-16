<?php	
	if(!empty($_REQUEST['name'])){
		mysql_query("UPDATE mt_config SET mt_name='".$_REQUEST['name']."', mt_user='".$_REQUEST['user']."', mt_pass='".$_REQUEST['pass']."', mt_ip='".$_REQUEST['ip']."' WHERE mt_id='".$_GET['id']."'");
		echo "<script language='javascript'>alert('Save Done')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
		exit(0);
	}									   								
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
        <small>By Kthai Technology </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
        <li class="active">Edit Site</li>
      </ol>
    </section>
		<section class="content">
            <div class="row">
               <div class="col-md-12">
		                    <div class="box box-solid box-success">                              
		                        <div class="box-header">
		                            <h3 class="box-title"><i class="fa fa-pencil"></i>&nbsp;&nbsp;แก้ไขสถานที่บริหารจัดการอินเตอร์เน็ต ของโรงเรียน</h3>
		                        </div>
		                        <div class="box-body">
                                	<?php
										$sql=mysql_query("SELECT * FROM mt_config WHERE mt_id='".$_GET['id']."'");
										$result=mysql_fetch_array($sql);
									?>
		                           <form id="edit_site" action="" method="post">
                                   		<div class="form-group input-group">
                                            <span class="input-group-addon">ชื่อสถานที่จัดการ&nbsp;</span>
                                            <input type="text" name="name" placeholder="Site Name" value="<?php echo $result['mt_name'];?>" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">ที่อยู่ </span>
                                            <input type="text" name="ip" placeholder="IP Address" value="<?php echo $result['mt_ip'];?>" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Username&nbsp;</span>
                                            <input type="text" name="user" placeholder="Username" value="<?php echo $result['mt_user'];?>" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Password&nbsp;&nbsp;</span>
                                            <input type="password" name="pass" placeholder="Password" value="<?php echo $result['mt_pass'];?>" class="form-control" required>
                                        </div>                                                                              
                                      
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;                                       
										<button id="btnSave" class="btn btn-danger" type="reset" Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;ยกเลิก&nbsp;</button></a>
                                    </div> 
                                    </form>
		                        </div>		                        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->
			</section>
		
            </div>
			
            <!-- /#wrapper -->
</body>
</html>
