<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;	
	
	$lease = $_GET['name'];
		
	if($num=='0'){
		echo "<script>alert('Default profile can not be removed.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=add_dhcp_leases' />";
		exit;
	}else{		
		$ARRAY = $API->comm("/ip/dhcp-server/lease/remove", array(
								 "active-address" => "$lease",
							));	
		//mysql_query("DELETE FROM mt_profile WHERE pro_name = '".$profile."' ");
		echo "<script>alert('ทำการ Remove เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=add_dhcp_leases' />";
		exit;
	}
?>