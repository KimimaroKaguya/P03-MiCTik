<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../phpqrcode/qrlib.php');
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$address=$_REQUEST['address'];
	$network=$_REQUEST['network'];
	$interface=$_REQUEST['interface'];	
	$id=$_SESSION['id'];
	if($address != ""){
		$ARRAY = $API->comm("/ip/address/add", array(
									  "address"  => $address,
									  "network" => $network,	
									  "interface"  => $interface,	
							));
		//$file=$username.".png";
		//QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		//mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."','".$status."')");
		echo "<script>alert('ระบบได้ทำการเพิ่ม Address-List เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=add_address_list' />";
		exit();
	}
?>