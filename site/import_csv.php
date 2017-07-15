<meta http-equiv=Content-Type content="text/html; charset=tis-620">
<?php
		include_once('../phpqrcode/qrlib.php');
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;  																													
$ARRAY = $API->comm("/ip/hotspot/user/profile/print");	
		
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
               <div class= "col-md-8 col-md-offset-3">
                  
<p><b>Import User From CSV</b></p>
				<form action="" method="post" enctype="multipart/form-data" name="form1">

										<div class="form-group input-group">
                                            <span class="input-group-addon">เลือกกลุ่ม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
										<div>

									<input name="fileCSV" type="file" id="fileCSV">
									<br>
 
									<div class="form-group input-group">                                        
                                        <button name="submit" type="submit"  value="submit" class="btn btn-success" "><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
										<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>&nbsp;&nbsp;&nbsp; 
										  <a href="../site/username.csv" target="_blank"><button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> ตัวอย่างไฟล์ CSV
          </button> </a>
                                    </div>
				</form>

</div>

</body>
</html>


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


    $username_add=$objArr[0];    //user ดึงมาจาก .csv (col 1)
    $password_add=$objArr[1];    //password ดึงมาจาก .csv (col 2)
    $hotspot_server = 'all';    // เปลี่ยน hotspot server mikrotik เป็นของตัวเอง   ของผมมีอันเดียว hotspot1 fix ไว้เลย
    $hotspot_profile = $_REQUEST['profile'];         // เปลี่ยน  user profile เป็นของตัวเอง  ของผม  2m เป็นหลัก fix ไว้เลย
    $limit_uptime=$objArr[2].'30d 00:00:00';    // limit uptime  ตั้งให้ใช้ได้ กี่วัน ดึงมาจาก .csv (col 3)  (ex รูปแบบ 30d 00:00:00 คือใช้ได้  30วัน)
	$id=$_SESSION['id'];
	$date=date('Y-m-d H:i');
    $name="$objArr[3]";	
	
    if($username_add  != '' ){
			$API = new routeros_api();
			$API->debug = true;

		$file=$username_add.".png";
		QRcode::png('http://'.$ip.'/login?username='.$username_add.'&password='.$password_add.'', '../qrcode/'.$file.'');
		mysql_query("SET NAMES TIS620");
		
		$mysql_add=mysql_query("INSERT INTO mt_gen VALUE('".$username_add."','".$password_add."','".$_REQUEST['profile']."','".$file."','".$date."','".$id."','".$name."')");
		if ($API->connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){
echo "connect ok<br>";

echo $name;
//exit();
		$username="=name=".$username_add;

		$pass="=password=".$password_add;

		$server="=server=".$hotspot_server;

		$uptimes="=limit-uptime=".$limit_uptime;
				
		$profile="=profile=".$hotspot_profile;
		$comment="=comment=". $name;
		
	   	$API->write('/ip/hotspot/user/add',false);
	   	$API->write($username, false);
	   	$API->write($pass, false);
	   	$API->write($server, false);
		$API->write($uptimes, false);
		$API->write($comment, false);

		$API->write($profile);
		$items = $API->read();
   	$API->disconnect();
   }  
	}
}

		echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=user_list'/>";
		exit();
}
?>
