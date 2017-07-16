<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			//$ARRAY = $API->comm("/ip/hotspot/user/print");			
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="content-wrapper">   
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-wifi"></i> รายละเอียดผู้ใช้งานแยกตามแพคเกจ</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                            <th>ลำดับที่</th>  
                                            <th>ชื่อ</th>                                                                           
                                            <th>แพคเกจที่ใช้งาน</th>
                                            <th>วัน/เวลา ที่เพิ่มบัตร</th>
                                            <th>จำนวนบัตร</th>                                            
                                            <th>แก้ไข / พิมพ์</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php
                                                    $id=$_SESSION['id'];
                                                    $sql="SELECT * FROM mt_gen WHERE mt_id='".$id."' GROUP BY date";
                                                    $query=mysql_query($sql);   
                                                    $no==1;
                                                    While($result=mysql_fetch_array($query)){   
                                                    $no++;
                                                    echo "<tr>";
                                                        echo "<td>".$no."</td>";    
                                                        echo "<td>".$result['user']."</td>";                            
                                                        echo "<td>".$result['profile']."</td>";
                                                        echo "<td>".$result['date']."</td>";
                                                        echo "<td>";
                                                        $count=mysql_fetch_array(mysql_query("SELECT COUNT(user) as total FROM `mt_gen` WHERE date='".$result['date']."'"));
                                                        echo $count['total'];
                                                        echo "</td>";                                                       
                                                    //  echo "<td>";
                                                        echo "<td>
                                                            <a href='index.php?opt=user&id=".$result['date']."'><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-search\"></i></button></a>
                                                            <a href='print.php?id=".$result['date']."'><button type=\"button\" class=\"btn btn-primary\"><i class=\"fa fa-print\"></i></button></a></td>";
                                                    //  echo "<a href='index.php?opt=user&id=".$result['date']."' title='view'><img src='../img/search.png' width=20px></a>";
                                                    //  echo "&nbsp;<a href='print.php?id=".$result['date']."' title='Print' target='_blank'><img src='../img/print.png' width=20px></a></td>";                                                     
                                                    echo "</tr>";
                                                    }
                                                ?>                                       
                                    </tbody>
                                </table>
                            </div>                           
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
