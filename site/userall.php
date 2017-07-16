<?php
      include_once('../phpqrcode/qrlib.php');
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
      include_once("../include/class.mysqldb.php");


      $mikrotik_ip = $ip;  
      $mikrotik_username = $user;  
      $mikrotik_password =$pass;
      $ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$ARRAY = $API->comm("/ip/hotspot/user/print");
      $ARRAY1 = $API->comm("/ip/hotspot/user/profile/print"); 
 			$ARRAY2 = $API->comm("/ip/hotspot/user/profile/print");

		
    if($_REQUEST['check']!=""){     
        for($i=0;$i < count($_REQUEST['check']);$i++){
          
          $user=$_REQUEST['check'][$i];
          
          mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
          $ARRAY = $API->comm("/ip/hotspot/user/remove", array(
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
          unlink("../qrcode/".$img);          
        }
        echo "<script>alert('ทำการลบผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?opt=userall' />";
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

<!-- Page Content -->
<form name="user" action="" method="post">
<div class="content-wrapper">   
             <section class="content-header">
              <h1>
                Kthai Team
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <li class="active">Hotspot</li>
                <li class="active">View ALL User</li>
              </ol>
            </section>
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-users"></i> ผู้ใช้งานในระบบ Hotspot ทั้งหมด</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                
                                    <thead>
                                     <!-- ส่วนเปิด ปุ่ม เพิ่ม ลบ User -->
                                        <tr>
                                          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add_user" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-user-plus"></i>&nbsp;Add User&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <button id="btnSave" class="btn btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="ลบผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-trash-o"></i>&nbsp;Delete&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#import_user" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานจำนวนมาก"><i class="fa fa-user-plus"></i>&nbsp;Import User&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <!--       <input type="submit" name="export" class="btn btn-success" value="Export User" data-toggle="tooltip" data-placement="top" title="สำรองข้อมูลผู้ใช้งานจากระบบ" />  -->
                                        </tr>
                                      <!-- ส่วนปิด ปุ่ม เพิ่ม ลบ User -->
                                        <br>
                                        <br>

                                         <!-- ส่วนเปิด หัวข้อแสดงตาราง -->
                                        <tr>
                                            
                                            <th width="10%">&nbsp;&nbsp;ทั้งหมด&nbsp;&nbsp;<input type="checkbox" id="selecctall"/></th>
                                            <th>No.</th>  
                                            <th>ชื่อ</th>   
                                            <th>รหัสผ่าน</th>
                                                                            
                                            <th>กลุ่มผู้ใช้งาน</th>
                                            <th>Comment</th>
                                            <th>เวลาเพิ่มผู้ใช้งาน</th>
                                                                                       
                                            <th>แก้ไข / พิมพ์</th>
                                        </tr>
                                         <!-- ส่วนปิด หัวข้อแสดงตาราง -->
                                    </thead>
                        <tbody>
                        <?php
                          $query=mysql_query("SELECT * FROM mt_gen");
                          $i=0;
                          while($result=mysql_fetch_array($query)){
                            $i++;
                          echo "<tr>";
                            echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$result['user']."></center></td>";
                            echo "<td>".$i."</td>";  
                            echo "<td>".$result['user']."</td>"; 
                            echo "<td>".$result['pass']."</td>";             
                            echo "<td>".$result['profile']."</td>";
                            echo "<td>".$result['status']."</td>";
                            echo "<td>".$result['date']."</td>";
                                           
                          //  ส่วนเปิด ตรงปุ่มแก้ไข พิมพ์ ลบ
                                                        echo "<td>
                                                            <a href='index.php?opt=edit_user&id=".$result['user']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-edit\"></i></button></a>
                                                            <a href='print.php?user&id=".$result['user']."' target='_blank'><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-print\"></i></button></a>
                                                            <a href='user_del.php?name=".$result['user']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a>
                                                            

                                                            </td>";
                           //  ส่วนปิด ตรงปุ่มแก้ไข พิมพ์ ลบ                                  
                          // echo "<a href='index.php?opt=user&id=".$result['date']."' title='view'><img src='../img/search.png' width=20px></a>";
                          // echo "&nbsp;<a href='print.php?id=".$result['date']."' title='Print' target='_blank'><img src='../img/print.png' width=20px></a></td>";                           
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
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User </h4>
              </div>
              <div class="modal-body">
                <form id="add_user" action="con_adduser.php" method="post">
                              <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="กรุณากรอกชื่อผู้ใช้งานเป็นภาษาอังกฤษเท่านั้น" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Password&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Profile&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile" data-toggle="tooltip" data-placement="top" title="กรุณาเลือกกลุ่มผู้ใช้งานอินเตอร์เน็ต">
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
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>  

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button>
                            <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>
                          </div>
              
                </form>
               </div>
             </div>
            </div>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
   
        <!-- Modal -->
        <div class="modal fade" id="import_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import User </h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" name="form1">

                    <div class="form-group input-group">
                                            <span class="input-group-addon">Profile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select  class="form-control" name="profile" size="1" id="profile" data-toggle="tooltip" data-placement="top" title="กรุณาเลือกกลุ่มผู้ใช้งานอินเตอร์เน็ต">
                                              <?php
                        
                          $num =count($ARRAY2);
                          for($i=0; $i<$num; $i++){
                            $seleceted = ($i == 0) ? 'selected="selected"' : '';
                            echo '<option value="'.$ARRAY2[$i]['name'].$selected.'">'.$ARRAY2[$i]['name'].'</option>';
                          }
                        ?>
                                            </select>



                                        </div>
    
                    <div> <input name="fileCSV" type="file" id="fileCSV"> </div>
                  <br>
 
                  <div class="form-group input-group">                                        
                    <button name="submit" type="submit"  value="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
                    <button id="btnSave" class="btn btn-warning" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>&nbsp;&nbsp;&nbsp; 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>  &nbsp;&nbsp;&nbsp; 

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


    $username_add=$objArr[0];    //user ดึงมาจาก .csv (col 1)
    $password_add=$objArr[1];    //password ดึงมาจาก .csv (col 2)
    $status=$objArr[2];    //password ดึงมาจาก .csv (col 3)
    $hotspot_server = 'all';    // เปลี่ยน hotspot server mikrotik เป็นของตัวเอง   ของผมมีอันเดียว hotspot1 fix ไว้เลย
    $hotspot_profile = $_REQUEST['profile'];         // เปลี่ยน  user profile เป็นของตัวเอง  ของผม  2m เป็นหลัก fix ไว้เลย
    $limit_uptime=$objArr[3].'30d 00:00:00';    // limit uptime  ตั้งให้ใช้ได้ กี่วัน ดึงมาจาก .csv (col 3)  (ex รูปแบบ 30d 00:00:00 คือใช้ได้  30วัน)
  $id=$_SESSION['id'];
  //$date=date('Y-m-d H:i');
    $name="$objArr[4]"; 
  
    if($username_add  != '' ){
      $API = new routeros_api();
      $API->debug = true;
      $ARRAY = $API->comm("/ip/hotspot/user/add", array(
                    $username=$username_add,
                    $password=$password_add,
                    $profile=$hotspot_profile,
                    $commemt=$status,  
                    
              ));
    



    $file=$username_add.".png";
    QRcode::png('http://'.$ip.'/login?username='.$username_add.'&password='.$password_add.'', '../qrcode/'.$file.'');
    mysql_query("SET NAMES TIS-620");
    
    $add=mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profile."','".$file."',NOW(),'".$id."','".$status."')"); 
    if ($API->connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){
echo "connect ok<br>";

echo $name;
//exit();
    $username="=name=".$username_add;

    $pass="=password=".$password_add;

    $server="=server=".$hotspot_server;

    $uptimes="=limit-uptime=".$limit_uptime;
        
    $profile="=profile=".$hotspot_profile;
    $comment="=comment=". $status;
    
      $API->write('/ip/hotspot/user/add',false);
      $API->write($username, false);
      $API->write($pass, false);
      $API->write($server, false);
    $API->write($uptimes, false);
    $API->write($comment, false);

    $API->write($profile);
    $items = $API->read();
    $API->disconnect();
   }  
  }
}

    echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?opt=userall'/>";
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
