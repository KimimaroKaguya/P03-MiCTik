<?php
		
	if(!empty($_GET['id'])){
		$id=$_GET['id'];
		mysql_query("DELETE FROM em WHERE em_id='".$id."'");
		echo "<script language='javascript'>alert('Delete Successful.')</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?opt=cus_list\">";
		exit(0);
	}
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"></style>
<body>

<div class="content-wrapper">
           <section class="content-header">
      <h1>
        โปรแกรมบริหารจัดการอินเตอร์เน็ต
        <small>By Kthai Technology</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>หน้าแรก</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	
	<section class="content">
           
		<div class="row">
                <div class="col-lg-12">
                    <div class="box box-solid box-default">  
                        <div class="box-header">
		                            <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;&nbsp;ผู้ดูและระบบ</h3>
		                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th>ที่</th>                                                                         	
                                            <th>ผู้ดูแลระบบ</th>
                                            <th>ชื่อเข้าสู่ระบบ</th>
                                            <th>ไซต์งานที่ดูแล</th>                                            
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													
													$sql="SELECT mt_name,em_id,em_name,em_user FROM em INNER JOIN mt_config ON em.mt_id=mt_config.mt_id";
													$query=mysql_query($sql);	
													$no==1;
													While($result=mysql_fetch_array($query)){	
													$no++;
													echo "<tr>";
														echo "<td>".$no."</td>";								
														echo "<td>".$result['em_name']."</td>";
														echo "<td>".$result['em_user']."</td>";
														echo "<td>".$result['mt_name']."</td>";				
														echo "<td>";
														echo "<a href='index.php?opt=cus_edit&id=".$result['em_id']."' title='แก้ไข'><button type=\"button\" class=\"btn btn-info\" title=\"แก้ไข\"><i class=\"fa fa-edit\"></i></button></a>";
														echo "&nbsp;<a href='index.php?opt=cus_list&id=".$result['em_id']."' title='ลบ'><button type=\"button\" class=\"btn btn-danger\" title=\"ลบ\"><i class=\"fa fa-trash-o\"></i></button></a></td>";														
													echo "</tr>";
													}
												?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div>                           
        				</div>

        <!-- /#page-wrapper -->
		</div>
    </section>
</div>

	
    
</body>
</html>
