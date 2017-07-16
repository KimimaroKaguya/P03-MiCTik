
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
</head>
<body>

!-- Page Content -->
<div class="content-wrapper">   
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-wifi"></i> Hotspot HOST</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                               <?php
  function popup( $text, $popup )
  {
  ?>
  <a href="javascript:void(0);" onmouseover="return overlib('<?php echo($popup); ?>
  ');" onmouseout="return nd();"><?php echo($text); ?></a>
  <?php
  }
  ?>
   
  <script type="text/javascript" src="overlib/overlib.js"><!-- overLIB (c) Erik Bosrup -->
  </script>

<?php

require('routeros_api.class.php');

$API = new routeros_api();

$API->debug = false;

if ($API->connect('172.15.0.1', 'api', '03167')) {

$ARRAY = $API->comm("/ip/hotspot/host/print");


echo "<table width=100% border=1>";

echo "<tr><td align=left size=3>Id</td><td size=3>mac-address</td><td size=3>address</td><td size=3>to-address</td><td>server</td><td>uptime</td><td>keepalive-timeout</td><td>found-by</td><td>DHCP</td><td>authorized</td><td>bypassed</td><td>comment</td></tr>";

echo "<tr><td align=left>";


for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#04B404 size=3>" . $regtable['.id'] . "</font><br>";
    }
    
echo "</td><td>";


for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#04B404 size=3>" . $regtable['mac-address'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#04B404 size=3>" . $regtable['address'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];

         echo "<font color=#04B404 size=3>" . $regtable['to-address'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#000099 size=3>" . $regtable['server'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#003300 size=3>" . $regtable['uptime'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#003300 size=3>" . $regtable['keepalive-timeout'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#880000 size=3>" . $regtable['found-by'] . "</font><br>";
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
    if ($regtable['DHCP']=="true")
         {
         echo "<font color=#04B404 size=3>" . $regtable['DHCP'] . "</font><br>";
         }else{
         echo "<font color=#FF0000 size=3>". $regtable['DHCP'] ."</font><br>";
         }
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
    if ($regtable['authorized']=="true")
         {
         echo "<font color=#04B404 size=3>" . $regtable['authorized'] . "</font><br>";
         }else{
         echo "<font color=#FF0000 size=3>". $regtable['authorized'] ."</font><br>";
         }
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
    if ($regtable['bypassed']=="true")
         {
         echo "<font color=#04B404 size=3>" . $regtable['bypassed'] . "</font><br>";
         }else{
         echo "<font color=#FF0000 size=3>". $regtable['bypassed'] ."</font><br>";
         }
    }
    
echo "</td><td>";

for ($i=0; $i<250; $i++)

  {
$regtable = $ARRAY[$i];
  
  echo "<font color=#04B404 size=3>" . $regtable['comment'] . "</font><br>";
    }
    
echo "</td><td>";

echo "</table>";
//echo "<br />Debug:";
echo "<br />";
//print_r($ARRAY);

   $API->disconnect();

}

?>
                            </div>     
                        <!-- /#page-wrapper -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>



</body>
</html>