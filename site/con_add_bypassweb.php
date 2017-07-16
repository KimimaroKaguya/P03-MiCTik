<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../phpqrcode/qrlib.php');
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$hostname=$_REQUEST['hostname'];
	//$dstaddress=$_REQUEST['dstaddress'];
	$action=$_REQUEST['action'];
	$status=$_REQUEST['status'];	
	if($action != ""){
		$ARRAY = $API->comm("/ip/hotspot/walled-garden/ip/add", array(
									  "dst-host" => $hostname,
									  //"dst-address" => $dstaddress,	
									  "action"  => $action,	
									  "comment"  => $status,	
							));
		//$file=$username.".png";
		//QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		//mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."','".$status."')");
		echo "<script>alert('ระบบได้ทำการเพิ่ม Bypass Website เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=hotspot_bypass_web' />";
		exit();
	}
?>