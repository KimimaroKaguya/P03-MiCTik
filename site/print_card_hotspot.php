<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
      $ARRAY = $API->comm("/ip/hotspot/user/profile/print");
			$ARRAY = $API->comm("/ip/hotspot/user/print");			
		
    if($_REQUEST['check']!=""){     
        for($i=0;$i < count($_REQUEST['check']);$i++){
          
          $user=$_REQUEST['check'][$i];
          
          //mysql_query("SELECT FROM mt_gen WHERE user =  '".$user."'");
          //ส่วนเปิดคำสั่ง Delete User
          //$ARRAY = $API->comm("/ip/hotspot/user/remove", array(
                      //"numbers" => $user,
                    //)); 
              //ส่วนปิดคำสั่ง Delete User
        //  mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
        //  $ARRAY = $API->comm("/ppp/secret/remove", array(
        //              "numbers" => $user,
        //            )); 

        //  mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
        //  $ARRAY = $API->comm("/tool/user-manager/user/remove", array(
        //              "numbers" => $user,
        //            )); 

                 
        }
        echo "<script>alert('ทำการลบผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?opt=print_card_hotspot' />";
        exit();			
        }				   								
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
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
<form name="id" action="print.php" method="get">
<div class="content-wrapper">   
             <section class="content-header">
              <h1>
                โปรแกรมบริหารจัดการอินเตอร์เน็ต โรงเรียน
                <small>Desing By Manas Panjai</small>
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
                                    <div><h4><i class="fa fa-wifi"></i> ผู้ใช้งานในระบบ Hotspot ทั้งหมด</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                
                                    <thead>
                                     <!-- ส่วนเปิด ปุ่ม เพิ่ม ลบ User -->
                                        <tr>
                                          <button id="btnprint" class="btn btn-success" type="submit"><i class="fa fa-trash-o"></i>&nbsp;Print&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         
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
                                            <th>วัน/เวลา ที่เพิ่มบัตร</th>
                                                                                       
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
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
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
