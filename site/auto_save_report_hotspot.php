
<?php
 $page = $_SERVER['PHP_SELF'];
 $sec = "60";
 header("Refresh: $sec; url=$page");

$today= 12:50;
if($today=date("H:i")){//เวลาของวันนี้
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

			$ARRAY = $API->comm("/ip/hotspot/user/print");	

			$name = $_REQUEST['name'];
			$profile = $_REQUEST['profile'];
			$down = $_REQUEST['bytes-in'];
			$up = $_REQUEST['bytes-out'];	

		mysql_query("INSERT INTO mt_report_hotspot VALUE('".$name."','".$profiles."','".$down."','".$up."',NOW()')");
		//echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
		//echo "<meta http-equiv='refresh' content='0;url=index.php?opt=userall' />";
		exit();


}else{


}