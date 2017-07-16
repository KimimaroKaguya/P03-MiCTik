<?php
		    include_once('../phpqrcode/qrlib.php');
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
            include_once("../include/class.mysqldb.php");

			$ARRAY1 = $API->comm("/ppp/profile/print");
            $mikrotik_ip = $ip;  
            $mikrotik_username = $user;  
            $mikrotik_password =$pass;                                                                                                                      
            $ARRAY2 = $API->comm("/ppp/profile/print");																																												
			//$ARRAY = $API->comm("/ip/hotspot/user/print");	

	if($_REQUEST['check']!=""){     
        for($i=0;$i < count($_REQUEST['check']);$i++){
          
          $user=$_REQUEST['check'][$i];
          
          mysql_query("DELETE FROM mt_gen_pppoe WHERE user =  '".$user."'");
          $ARRAY = $API->comm("/ppp/secret/remove", array(
                      "numbers" => $user,
                    )); 
              
        //  mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
        //  $ARRAY = $API->comm("/ppp/secret/remove", array(
        //              "numbers" => $user,
        //            )); 

        //  mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
        //  $ARRAY = $API->comm("/tool/user-manager/user/remove", array(
        //              "numbers" => $user,
        //            )); 

          $img = $user.".png";
          unlink("../qrcodepppoe/".$img);          
        }
        echo "<script>alert('ทำการลบผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list' />";
        exit();         
        }                                               
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
  </script>
</head>
<body>
        <form name="user" action="" method="post">
         <!-- Page Content -->
        <div class="content-wrapper">   
        <section class="content-header">
                      <h1>
                        โปรแกรมบริหารจัดการอินเตอร์เน็ต
                        <small>Desing By Kthai Team</small>
                      </h1>
                      <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">PPPoe</li>
                        <li class="active">View Secret</li>
                      </ol>
                    </section> 
                <section class="content">       
         <!-- Page Content -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                            <div><h4><i class="fa fa-wifi"></i> สร้างผู้ใช้งานสำหรับ PPPoE</h4></div>
                                        </div>
                                <!-- /.panel-heading -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                             <!-- ส่วนเปิด ปุ่ม เพิ่ม ลบ User -->
                                                <tr>
                                                  <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add_secret" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-user-plus"></i>&nbsp;Add Secret&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <button id="btnSave" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i>&nbsp;Delete&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#import_secret" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานจำนวนมาก"><i class="fa fa-user-plus"></i>&nbsp;Import Secret&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </tr>
                                              <!-- ส่วนปิด ปุ่ม เพิ่ม ลบ User -->
                                              <br>
                                                <br>
                                                <tr> 
                                                    <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="selecctall"/></th>    
                                                    <th>No.</th>
                                                    <th>Name</th> 
                                                    <th>Password</th>                               
                                                    <th>Profile</th>
                                                    <th>Service</th>
                                                    <th>Date/Time</th>
                                                    <th>comment</th>                                          
                                                    <th>แก้ไข / พิมพ์</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                        <?php
                                                              $query=mysql_query("SELECT * FROM mt_gen_pppoe");
                                                              $i=0;
                                                              while($result=mysql_fetch_array($query)){
                                                                $i++;
                                                            echo "<tr>";
                                                                echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$result['user']."></center></td>";
                                                                echo "<td>".$i."</td>";
                                                                echo "<td>".$result['user']."</td>"; 
                                                                echo "<td>".$result['pass']."</td>";                                
                                                                echo "<td>".$result['profile']."</td>";
                                                                echo "<td>".$result['service']."</td>";
                                                                echo "<td>".$result['date']."</td>";
                                                                echo "<td>".$result['status']."</td>";
                                                                echo "<td>
                                                                    <a href='index.php?opt=edit_pppoe&id=".$result['user']."'><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-edit\"></i></button></a>
                                                                    <a href='print_pppoe.php?name=".$result['user']."' target='_blank'><button type=\"button\" class=\"btn btn-primary\"><i class=\"fa fa-print\"></i></button></a>
                                                                    <a href='pppoe_del.php?name=".$result['user']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
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
</form>

<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_secret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Secret </h4>
              </div>
              <div class="modal-body">
                <form id="add_secret" action="con_addpppoe.php" method="post">
                              <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="ตั้งชื่อเป็นภาษาอังกฤษเท่านั้น" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Password&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile">
                                                <?php
                                                    $num =count($ARRAY1);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="'.$ARRAY1[$i]['name'].$selected.'">'.$ARRAY1[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Service&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="service" size="1" id="profile">
                                              <option value="any">Any</option>
                                              <option value="pppoe">PPPoe</option>
                                              <option value="pptp">PPTP</option>
                                              <option value="l2tp">L2TP</option>
                                              <option value="async">ASYNC</option>
                                              <option value="ovpn">Ovpn</option>
                                              <option value="sstp">SSTP</option>
                                            </select>
                                        </div>  
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>                                                                              
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button> &nbsp;&nbsp;&nbsp;                                     
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>  &nbsp;&nbsp;&nbsp;
                                    </div>
                </form>
               </div>
             </div>
            </div>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
   
        <!-- Modal -->
        <div class="modal fade" id="import_secret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import Secret </h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" name="form1">

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Profile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select  class="form-control" name="profile" size="1" id="profile" >
                                                <?php
                                                
                                                    $num =count($ARRAY2);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="'.$ARRAY2[$i]['name'].$selected.'">'.$ARRAY2[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Service&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="service" size="1" id="profile">
                                              <option value="any">Any</option>
                                              <option value="pppoe">PPPoe</option>
                                              <option value="pptp">PPTP</option>
                                              <option value="l2tp">L2TP</option>
                                              <option value="async">ASYNC</option>
                                              <option value="ovpn">Ovpn</option>
                                              <option value="sstp">SSTP</option>
                                            </select>
                                        </div>
                                        <div>   <input name="fileCSV" type="file" id="fileCSV"> </div>
                                    <br>
 
                                    <div class="form-group input-group">                                        
                                        <button name="submit" type="submit"  value="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
                                        <button id="btnSave" class="btn btn-warning" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>&nbsp;&nbsp;&nbsp; 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> &nbsp;&nbsp;&nbsp; 
                                          <a href="../site/username.csv" target="_blank"><button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> ตัวอย่างไฟล์ CSV    </button> </a>
                                    </div>
                </form>
               </div>
             </div>
            </div>

<?


if(isset($_POST['submit']) && $_POST['submit']=='submit'){
    $pro=$_REQUEST['profile'];


move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
//copy($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
if (($objCSV)== ''){

echo "Error Upload & Import Done.";
exit;
}
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {


    $username=$objArr[0];    //user ดึงมาจาก .csv (col 1)
    $password=$objArr[1];    //password ดึงมาจาก .csv (col 2)
    $status=$objArr[2];    //password ดึงมาจาก .csv (col 3)
    $service=$_REQUEST['service'];    // เปลี่ยน hotspot server mikrotik เป็นของตัวเอง   ของผมมีอันเดียว hotspot1 fix ไว้เลย
    $profiles=$_REQUEST['profile'];         // เปลี่ยน  user profile เป็นของตัวเอง  ของผม  2m เป็นหลัก fix ไว้เลย
    $id=$_SESSION['id'];
    
    if($username != ""){
        $ARRAY = $API->comm("/ppp/secret/add", array(
                                      "name"     => $username,
                                      "password" => $password,
                                      "comment"  => $status,
                                      "service" => $service,
                                      "profile"  => $profiles,

                                      
                            ));

        $file=$username_add.".png";
        QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
        mysql_query("SET NAMES TIS-620");
        
        $add=mysql_query("INSERT INTO mt_gen_pppoe VALUE('".$username."','".$password."','".$profiles."','".$file."',NOW(),'".$id."','".$status."','".$service."')");    
        if ($API->connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){
echo "connect ok<br>";

echo $name;
//exit();
        $username="=name=".$username;
        $pass="=password=".$password;
        $comment="=comment=". $status;
        $service="=service=".$service;      
        $profile="=profile=".$profiles;
        
        $API->write('/ppp/secret/add',false);
        $API->write($username, false);
        $API->write($pass, false);
        $API->write($service, false);
        $API->write($comment, false);

        $API->write($profile);
        $items = $API->read();
    $API->disconnect();
   }  
    }
}
fclose($objCSV);
echo    "name=".$name;
echo "Upload & Import Done.";
        //echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list'/>";
        exit();
}
?>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>
  
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="../dist/js/demo.js"></script>  
  <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
