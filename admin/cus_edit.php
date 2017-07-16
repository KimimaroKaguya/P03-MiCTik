<?php	
	$conn = NEW mysqldb();	
	$id=$_GET['id'];
	if(!empty($_REQUEST['name'])){
		$name = $_REQUEST['name'];
		$user = $_REQUEST['user'];
		$pass = md5($_REQUEST['pass']);		
		$sql = "UPDATE em SET em_name = '".$name."', em_user='".$user."', em_pass='".$pass."' where em_id = '".$id."'";
		$query = $conn->query($sql);		
		echo "<script language='javascript'>alert('Save Done')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?opt=cus_list\">";
		exit(0);
	}									   								
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
                <small>Desing Kthai Technology</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <li class="active">Admin</li>
                <li class="active">Edit</li>
              </ol>
            </section>
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-users"></i> ผู้ใช้งานในระบบ Hotspot ทั้งหมด</h4></div>
                                </div>
                        <!-- /.panel-heading -->
		                        <div class="panel-body">
		                           <form id="edit_site" action="" method="post">   
										<?php																														
											$sql = "SELECT em_name,em_user,em_pass FROM em WHERE em_id='".$id."'";											
											$query = $conn->query($sql);
											$result = $conn->fetch($query);												
										?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="name" placeholder="Full Name" class="form-control" value="<?php echo $result->em_name;?>" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Username&nbsp;</span>
                                            <input type="text" name="user" placeholder="Username" class="form-control" value="<?php echo $result->em_user;?>" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Password&nbsp;&nbsp;</span>
                                            <input type="password" name="pass" placeholder="Password" class="form-control" value="<?php echo $result->em_pass;?>">
                                        </div>                                          
                                        
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;ยกเลิก&nbsp;</button></a>
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
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    
</body>
</html>
