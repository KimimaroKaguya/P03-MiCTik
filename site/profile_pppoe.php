<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																
			$ARRAY = $API->comm("/ppp/profile/print");
            $ARRAY1 = $API->comm("/ip/pool/print");			
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<!-- Page Content -->
<div class="content-wrapper">  
<section class="content-header">
              <h1>
                Kthai Team
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">PPPoe</li>
                <li class="active">View Profile</li>
              </ol>
            </section>  
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-wifi"></i> โปรไฟล์ PPPoE</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                                  <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add_profile_secret" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-user-plus"></i>&nbsp;Add Profile&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        </tr>
                                    <br>
                                    <br>
                                        <tr>     
                                            <th>ที่.</th>                                                                           
                                            <th>ชื่อแพคเกจ</th>
                                            <th>ไอพีเซิฟเวอร์</th>
                                            <th>กรุ๊ปไอพี</th>
                                            <th>ความเร็วที่ให้บริการ</th>
                                            <th> ลบ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
                                                <?php
                                                    $num =count($ARRAY);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td>".$no."</td>";                                                                                                                                                            
                                                        echo "<td>".$ARRAY[$i]['name']."</td>";
                                                        echo "<td>".$ARRAY[$i]['local-address']."</td>";
                                                        echo "<td>".$ARRAY[$i]['remote-address']."</td>";
                                                        echo "<td>";
                                                            if($ARRAY[$i]['rate-limit']==""){
                                                                echo "Unlimited";
                                                            }else{
                                                                echo $ARRAY[$i]['rate-limit'];
                                                            }                                                               
                                                        echo "</td>";
                                                    //  echo "<td>".$ARRAY[$i]['session-timeout']."</td>";
                                                    //  echo "<td>".$ARRAY[$i]['idle-timeout']."</td>";
                                                    //  echo "<td>".$ARRAY[$i]['shared-users']."</td>";
                                                        echo "<td>
                                                        
                                                            <a href='profile_pppoe_del.php?name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
                                                        //    <a href='index.php?opt=edit_profile_pppoe&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></button></a>
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

<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_profile_secret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Profile Secret </h4>
              </div>
              <div class="modal-body">
                <form id="add_user" action="con_addprofile_pppoe.php" method="post">
                                   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="กำหนดชื่อแพคเกจ" class="form-control" required>
                                        </div>

                                       <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Remost Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="local" placeholder="กรุณากรอกไอพีเครื่องเซิฟเวอร์ (ตัวอย่างเช่น 10.0.0.1)" class="form-control" required>
                                        </div>                
                                      
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Pool Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="remote" size="1" id="remote">
                                                <?php
                                                    $List = $API->comm("/ip/pool/print");
                                                    $num =count($List);     
                                                        echo '<option value="">กรุณาเลือกช่วงไอพีที่ต้องการ</option>';
                                                    for($i=0; $i<$num; $i++){                                                       
                                                        echo '<option value="'.$List[$i]['name'].'">'.$List[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>   

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Rate Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="ความเร็วที่ให้บริการ Upload/Download (ตัวอย่าง : 1m/5m)" class="form-control" required>
                                        </div>
                                                                   
                                    <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  &nbsp;&nbsp;&nbsp;                                     
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>  &nbsp;&nbsp;&nbsp;</a>
                                    </div>
                                        
                  </form>
               </div>
             </div>
            </div>
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
