<?php	
$conn = new mysqldb();			
	if(!empty($_REQUEST['name'])){
    /*******************************************************************
    20160729 <Humming>: 
    /*******************************************************************/
		//$query=mysql_query("SELECT mt_id FROM mt_config WHERE name<>'".$_REQUEST['name']."'");
        $sql="SELECT mt_id FROM mt_config WHERE name <> '".$_REQUEST['name']."'";
        $query = $conn->query($sql);   
		// //$rows=mysql_num_rows($query);
        $rows = $conn->num_rows($sql);
        // echo $rows;
        if ($rows > 0){
        echo "<script language='javascript'>alert('Can not add site.')</script>";
        }else{					
		$sql ="INSERT INTO mt_config (mt_id,mt_user,mt_pass,mt_ip,mt_name,mt_location,mt_mail,mt_tel,mt_gps) 
        VALUES('','".$_REQUEST['user']."','".$_REQUEST['pass']."','".$_REQUEST['ip']."','".$_REQUEST['name']."',
        '".$_REQUEST['location']."','".$_REQUEST['mail']."','".$_REQUEST['tel']."','".$_REQUEST['gps']."')";	
		// $sql=mysql_query($sql_q);
        // echo $sql;
         $query = $conn->query($sql);
		echo "<script language='javascript'>alert('Save Done')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
        exit(0);
        }
    }
    /*******************************************************************/
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
                <small> </small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
                <li class="active">Add Site</li>
              </ol>
            </section>
        <section class="content">
       
            <div class="row">
                    <div class="col-md-12">
		                  <div class="box box-solid box-success">                             
		                        <div class="box-header">
		                           <h3 class="box-title"><i class="fa fa-user"></i>
                                   &nbsp;&nbsp;<?php echo $_SESSION['APIUser'] ;?> เพิ่มสถานที่บริหารจัดการอินเตอร์เน็ต</h3>
		                        </div>
		                       <div class="box-body">
		                           <form id="add_site" action="" method="post">                                   		
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">IP Address</span>
                                            <input type="text" name="ip" placeholder="IP Address" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Username&nbsp;</span>
                                            <input type="text" name="user" placeholder="Username" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Password&nbsp;&nbsp;</span>
                                            <input type="password" name="pass" placeholder="Password" class="form-control">
                                        </div>                                          
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="page-header">รายละเอียดสถานที่จัดการบริหารอินเตอร์เน็ต Site</h4>
                                            </div>
                                            <!-- /.col-lg-12 -->
                                        </div>
            
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">ชื่อสถานะที่ Site &nbsp;</span>
                                            <input type="text" name="name" placeholder="Site Name" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">ที่อยู่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="location" placeholder="Address Site" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">อี-เมล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="mail" placeholder="E-Mail Address" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">เบอร์โทร&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="tel" placeholder="Contact Number" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">GPS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="gps" placeholder="GPS Coordinates" class="form-control" required>
                                        </div>
                                       <br /> 
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก&nbsp;</button>
                                        &nbsp;&nbsp;&nbsp;
                                        <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;ยกเลิก&nbsp;</button>
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
