<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$user=$_GET['name'];
	$ARRAY = $API->comm("/ppp/secret/remove", array(
                      "numbers" => $user,
                    )); 
	//mysqli_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
	mysql_query("DELETE FROM mt_gen_pppoe WHERE user =  '".$user."'");	
	echo "<script>alert('Delete Successful.')</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list'/>";
	exit;

?>