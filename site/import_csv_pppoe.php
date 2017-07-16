<meta http-equiv=Content-Type content="text/html; charset=tis-620">
<?php
			include_once('../phpqrcode/qrlib.php');
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
			include_once("../include/class.mysqldb.php");

$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;  																													
$ARRAY = $API->comm("/ppp/profile/print");
	
		
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
                <small>Desing By Manas Panjai</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">PPPoe</li>
                <li class="active">Import CSV</li>
              </ol>
            </section> 
      <section class="content">

            <div class="row">
                <div class="col-md-12">
		                   <div class="panel panel-default">                           
		                         <div class="box-header">
		                             <h3 class="box-title"><i class="fa fa-user-plus"></i>&nbsp;&nbsp; เพิ่มผู้ใช้งาน PPPoe แบบ Import CSV</h3>    
		                        </div>
                  <div class="panel-body">
<p><b>กรุณาเลือกกลุ่มผู้ใช้งานอินเตอร์เน็ตก่อน</b></p>
				<form action="" method="post" enctype="multipart/form-data" name="form1">

										<div class="form-group input-group">
                                            <span class="input-group-addon">เลือกกลุ่มผู้ใช้งาน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select  class="form-control" name="profile" size="1" id="profile" >
                                            	<?php
												
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
													}
												?>
                                            </select>



                                        </div>
				
										<div>	<input name="fileCSV" type="file" id="fileCSV"> </div>
									<br>
 
									<div class="form-group input-group">                                        
                                        <button name="submit" type="submit"  value="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
										<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>&nbsp;&nbsp;&nbsp; 
										  <a href="../site/username.csv" target="_blank"><button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> ตัวอย่างไฟล์ CSV    </button> </a>
                                    </div>
				</form>

</div>

</div>
</div>
</div>
</section>
</div>


<?


if(isset($_POST['submit']) && $_POST['submit']=='submit'){
	$pro=$_REQUEST['profile'];


move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
//copy($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
if (($objCSV)== ''){

echo "Error Upload & Import Done.";
exit;
}
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {


    $username=$objArr[0];    //user ดึงมาจาก .csv (col 1)
    $password=$objArr[1];    //password ดึงมาจาก .csv (col 2)
    $status=$objArr[2];    //password ดึงมาจาก .csv (col 3)
    $service = 'pppoe';    // เปลี่ยน hotspot server mikrotik เป็นของตัวเอง   ของผมมีอันเดียว hotspot1 fix ไว้เลย
    $profiles=$_REQUEST['profile'];         // เปลี่ยน  user profile เป็นของตัวเอง  ของผม  2m เป็นหลัก fix ไว้เลย
    $id=$_SESSION['id'];
	$date=date('Y-m-d H:i:s');
	
    if($username != ""){
		$ARRAY = $API->comm("/ppp/secret/add", array(
									  "name"     => $username,
									  "password" => $password,
									  "service"	=> $service,
									  "profile"  => $profiles ,		
									  
							));

		$file=$username.".png";
		QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcodepppoe/'.$file.'');
		mysql_query("SET NAMES TIS-620");
		
		$add=mysql_query("INSERT INTO mt_gen_pppoe VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."','".$status."')");	
		if ($API->connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){
echo "connect ok<br>";

echo $name;
//exit();
		$username="=name=".$username;

		$pass="=password=".$password;
		$service="=service=".$service;		
		$profile="=profile=".$profiles;
		$comment="=comment=". $name;
		
	   	$API->write('/ppp/secret/add',false);
	   	$API->write($username, false);
	   	$API->write($pass, false);
	   	$API->write($service, false);
		$API->write($comment, false);

		$API->write($profile);
		$items = $API->read();
   	$API->disconnect();
   }  
	}
}
fclose($objCSV);
echo    "name=".$name;
echo "Upload & Import Done.";
		//echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list'/>";
		exit();
}
?>

  <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>
</body>
</html>