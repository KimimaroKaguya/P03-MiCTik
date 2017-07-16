<title>Resources of Mikrotik</title><style type="text/css">
<!--
a:link {
	color: #060;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style><?php

require('routeros_api.class.php');

$API = new routeros_api();

$API->debug = false;

if ($API->connect('172.16.0.1', 'api', '03167')) {

$ARRAY = $API->comm("/system/resource/print");


   $first = $ARRAY['0'];
$memperc = ($first['free-memory']/$first['total-memory']);
$hddperc = ($first['free-hdd-space']/$first['total-hdd-space']);
$mem = ($memperc*100);
$hdd = ($hddperc*100);
echo "Mikrotik RouterOs 6.30.4 Resources";
echo "<br />";
echo "<table width=550 border=0 align=center>";

echo "<tr><td>Platform, board name and Ros version is:</td><td>" . $first['platform'] . " - " . $first['board-name'] . " - "  . $first['version'] . " - " . $first['architecture-name'] . "</td></tr><br />";
echo "<tr><td>Cpu and available cores:</td><td>" . $first['cpu'] . " at " . $first['cpu-frequency'] . " Mhz with " . $first['cpu-count'] . " core(s) "  . "</td></tr><br />";
echo "<tr><td>Uptime is:</td><td>" . $first['uptime'] . " (hh/mm/ss)" . "</td></tr><br />";
echo "<tr><td>Cpu Load is:</td><td>" . $first['cpu-load'] . " %" . "</td></tr><br />";
echo "<tr><td>Total,free memory and memory % is:</td><td>" . $first['total-memory'] . "Kb - " . $first['free-memory'] . "Kb - " . number_format($mem,3) . "% </td></tr><br />";
echo "<tr><td>Total,free disk and disk % is:</td><td>" . $first['total-hdd-space'] . "Kb - " . $first['free-hdd-space'] . "Kb - " . number_format($hdd,3) . "% </td></tr><br />";
echo "<tr><td>Sectors (write,since reboot,bad blocks):</td><td>" . $first['write-sect-total'] . " - " . $first['write-sect-since-reboot'] . " - " . $first['bad-blocks'] . "% </td></tr><br />";

echo "</table>";

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />Debug:";
echo "<br />";
   print_r($ARRAY);

   $API->disconnect();

}

?>
