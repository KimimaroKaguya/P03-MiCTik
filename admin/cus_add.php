<?php	
	$conn = new  mysqldb();	
	if(!empty($_REQUEST['name'])){
		if($_REQUEST['site']=='0'){
			echo "<script language='javascript'>alert('Please select site manage.')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else{
			$site = $_REQUEST['site'];			
			// mysql_query("INSERT INTO em VALUE('','".$_REQUEST['name']."','".$_REQUEST['user']."','".md5($_REQUEST['pass'])."',
			// '".$site."')");
			$sql ="INSERT INTO em VALUE('','".$_REQUEST['name']."','".$_REQUEST['user']."','".md5($_REQUEST['pass'])."','".$site."')";
			$query = $conn->query($sql);
			echo "<script language='javascript'>alert('Save Done')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?opt=cus_list\">";
			exit(0);
		}
	}							   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
 <div class="content-wrapper">
 		<section class="content-header">
		      <h1>
		        โปรแกรมบริหารจัดการอินเตอร์เน็ต
		        <small>By Kthai Technology </small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
		        <li class="active">Add Customer</li>
		      </ol>
    	</section>
        <section class="content">

            <div class="row">
                    <div class="col-md-12">
		                     <div class="box box-solid box-success">                               
		                        <div class="box-header">
		                            <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;&nbsp;เพิ่มผู้ดูและระบบ</h3>
		                        </div>
		                        <div class="box-body">
		                           <form id="add_site" action="" method="post">    										
                                       <div class="form-group input-group">
                                            <span class="input-group-addon">ชื่อนามสกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="name" placeholder="ระบุชื่อ-นามสกุล" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">กำหนดชื่อผู้ดูแลระบบ&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="user" placeholder="ระบุชื่อผู้ดูแลระบบ" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">กำหนดรหัสผ่าน&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="pass" placeholder="เช่น 1234567890" class="form-control">
                                        </div>  
										  
										<div class="form-group input-group">
                                            <span class="input-group-addon">เลือกไซต์งานที่ดูแล</span>
                                            <select class="form-control" name="site" size="1" id="address">
                                            	<?php
														
													// $sql="SELECT mt_name,mt_id FROM mt_config";
													// $query = $conn->query($sql);
													// $rrr = $conn->num_rows($sql);													
													// echo '<option value="'.$rrr.'"></option>';
													// while($data = $conn->fetch($query)){																										
													// 	echo '<option value="'.$data->mt_id.'">'.$data->mt_name.'</option>';
													// }
													$sql="SELECT mt_name,mt_id FROM mt_config";
													$query = $conn->query($sql);
													//$rrr = $conn->num_rows($sql);													
													// echo $rrr;
													// $data = $conn->fetch($sql);
													while($data = $query->fetch_object()){																										
														// echo $data->mt_id."||".$data->mt_name;
														echo '<option value="'.$data->mt_id.'">'.$data->mt_name.'</option>';
													} 
												?>
                                            </select>
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
				</section>
				</div>
                <!-- /#page-wrapper -->
        
</body>
</html>
