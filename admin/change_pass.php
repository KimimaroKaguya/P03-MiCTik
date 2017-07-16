<?php	
	if(!empty($_REQUEST['old'])){
		$id=$_SESSION['APIID'];
		$old=md5($_REQUEST['old']);
		$new=md5($_REQUEST['new']);
		$con=md5($_REQUEST['con']);		
		$sql=mysql_query("SELECT am_pass FROM am WHERE am_pass='".$old."'");
		$num=mysql_num_rows($sql);		
		if($num==0){
			echo "<script language='javascript'>alert('Bad Old Password.')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else if($new!=$con){
			echo "<script language='javascript'>alert('Password Not Match')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else{
			mysql_query("UPDATE am SET am_pass='".$new."' WHERE am_id='".$id."'");
			echo "<script language='javascript'>alert('Save Done')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
			exit(0);
		}
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
		        โปรแกรมบริหารจัดการอินเตอร์เน็ต
		        <small>By Kthai Technology </small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
		        <li class="active">Chang Password</li>
		      </ol>
    	</section>
        <section class="content">

            <div class="row">
                <div class="col-md-12">
		                     <div class="box box-solid box-success">                             
		                        <div class="box-header">
		                            <h3 class="box-title"><i class="fa fa-pencil"></i>เปลี่ยนรหัสผ่าน ของ <?php echo ($_SESSION['APIUser']); ?><?php echo ($_SESSION['EmpUser']); ?></h3>
		                        </div>
		                         <div class="box-body">
		                           <form id="change_pass" action="" method="post">                                   		
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">รหัสผ่านเก่า&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="old" placeholder="Old Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">รหัสผ่านใหม่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="new" placeholder="New Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">ยืนยันรหัสผ่าน</span>
                                            <input type="password" name="con" placeholder="Confirm Password" class="form-control" required>
                                        </div>                                          
                                        
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;ยกเลิก&nbsp;</button></a>
                                    </div> 
                                    </form>
		                        </div>		                        
                        </div>
                        
                    </div>
           </section>
            </div>
			
			<script src="../dist/js/demo.js"></script>
			<script src="../dist/js/app.min.js"></script>
</body>
</html>
