<?php
	
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	
    echo"<body onload=\"window.print();\"> ";
    
	$user=$_GET['name'];
	$sql = mysql_query("SELECT * FROM mt_gen_pppoe WHERE user = '".$user."'");
		
		echo"<table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows = 0;
		while($result = mysql_fetch_array($sql))
		{
			$intRows++;
			echo "<td width=100px>";
			echo "<img src='../qrcodepppoe/".$result['file']."' />";
			echo "</td>";
			echo "<td width=200px>"; 
			
				echo "<center><img src='../img/mikrotik.png' width=100px /></center><hr>";
				echo "<center>Username : ".$result["user"]."</center>\n";
				echo "<center>Password : ".$result["pass"]."</center>";                				
			
	
			echo"</td>";
			if(($intRows)%2==0)
			{
				echo"</tr>";
			}

			if(($intRows)%14==0){
				echo"</tr></table><table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\" style=\"page-break-before: always\">";
			}
		}
		echo"</tr></table>";
		echo "<meta http-equiv='refresh' content='0;url=pppoe_list.php' />";
        exit();
?>		
