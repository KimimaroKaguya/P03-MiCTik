<?php	
	if(!empty($_REQUEST['old'])){
		$id=$_SESSION['EmpID'];
		$old=md5($_REQUEST['old']);
		$new=md5($_REQUEST['new']);
		$con=md5($_REQUEST['con']);		
		$sql=mysql_query("SELECT em_pass FROM em WHERE em_pass='".$old."'");
		$num=mysql_num_rows($sql);		
		if($num==0){
			echo "<script language='javascript'>alert('Bad Old Password.')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else if($new!=$con){
			echo "<script language='javascript'>alert('Password Not Match')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else{
			mysql_query("UPDATE em SET em_pass='".$new."' WHERE em_id='".$id."'");
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
 <!-- Page Content -->

 		<div class="content-wrapper">
           <section class="content-header">
      <h1>
        Mikrotik API v.3
        <small>By Kthai Team</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
        <li class="active">Dashboard</li>
        <li class="active">Change Password</li>
      </ol>
    </section>
	
	<section class="content">
           
		<div class="row">
                <div class="col-lg-12">
                    <div class="box box-solid box-default">  
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		                           <form id="change_pass" action="" method="post">                                   		
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Old Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="old" placeholder="Old Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="new" placeholder="New Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Confirm Password</span>
                                            <input type="password" name="con" placeholder="Confirm Password" class="form-control" required>
                                        </div>                                          
                                        
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  &nbsp;&nbsp;&nbsp;                                     
                                        <button id="btnCancel" class="btn btn-danger" type="cancel" Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button></a>
                                    </div> 
                                    </form>
		                        </div>	

        <!-- /#page-wrapper -->
</div>
    </section>
	</div>


</body>
</html>
