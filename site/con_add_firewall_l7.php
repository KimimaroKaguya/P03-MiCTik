<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../phpqrcode/qrlib.php');
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$name=$_REQUEST['name'];
	$code=$_REQUEST['code'];
	$comment=$_REQUEST['status'];
	$id=$_SESSION['id'];
	if($name != ""){
		$ARRAY = $API->comm("/ip/firewall/layer7-protocol/add", array(
									  "name"     => $name,
									  "regexp" => $code,
									  "comment" => $comment,	

							));
		//$file=$username.".png";
		//QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		//mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."','".$status."')");
		echo "<script>alert('ระบบได้ทำการเพิ่ม L7 เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=firewall_info' />";
		exit();
	}
?>