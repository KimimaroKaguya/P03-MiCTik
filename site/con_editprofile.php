<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$profile=$_REQUEST['profile'];
	$name=$_REQUEST['name'];
	$session=$_REQUEST['session'];
	$idle=$_REQUEST['idle'];	
	$use=$_REQUEST['use'];	
	$limit=$_REQUEST['limit'];	
	$keep=$_REQUEST['keep'];
	$auto=$_REQUEST['auto'];
//	$list=$_REQUEST['address'];
	if($profile != ""){
		mysql_query("UPDATE mt_profile SET pro_name='".$_REQUEST['name']."', pro_session='".$_REQUEST['session']."', pro_idle='".$_REQUEST['idle']."',pro_keepalive='".$_REQUEST['keep']."', pro_autorefresh='".$_REQUEST['auto']."',pro_users='".$_REQUEST['use']."',pro_limit='".$_REQUEST['limit']."' WHERE pro_name='".$profile."'");
	//	mysql_query("UPDATE mt_profile SET name='".$name."','".$local."','".$remote."','".$limit."'");
	//	mysql_query("UPDATE mt_profile SET ('".$name."','".$session."','".$idle."','".$keep."','".$auto."','".$uptime."','".$use."','".$limit."','".$list."')");
		

		$ARRAY = $API->comm("/ip/hotspot/user/profile/set", array(
								"name" => $name,
								"session-timeout" => $session,
								"idle-timeout" => $idle,
								"keepalive-timeout" => $keep,
								"status-autorefresh" => $auto,
								"shared-users" => $use,
								"rate-limit" => $limit,
							//	"address-list" => $list,
								"numbers" => $profile,
							));		
		echo "<script>alert('Save Done')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=profile' />";
		exit;
	}
?>