<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../phpqrcode/qrlib.php');
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$pool=$_REQUEST['namepool'];
	$ranges=$_REQUEST['ranges'];
	$nextpool=$_REQUEST['nextpool'];	
	$id=$_SESSION['id'];
	if($pool != ""){
		$ARRAY = $API->comm("/ip/pool/add", array(
									  "name"     => $pool,
									  "ranges" => $ranges,	
									  "next-pool"  => $nextpool,	
							));
		//$file=$username.".png";
		//QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		//mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."','".$status."')");
		echo "<script>alert('ระบบได้ทำการเพิ่ม Pool เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pool' />";
		exit();
	}
?>