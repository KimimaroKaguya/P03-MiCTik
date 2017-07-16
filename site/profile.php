<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");			
			$ARRAY1 = $API->comm("/ip/pool/print"); 						   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
</head>
<body>
    <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Kthai Team
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <li class="active">Hotspot</li>
                <li class="active">Profile</li>
              </ol>
            </section>
        <section class="content">

           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-apple"></i> Profile </h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <!-- ส่วนเปิด ปุ่ม เพิ่ม ลบ User -->
                                        <tr>
                                          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add_profile" data-toggle="tooltip" data-placement="top" title="เพิ่มกลุ่มผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-user-plus"></i>&nbsp;Add Profile&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          
                                        </tr>
                                      <!-- ส่วนปิด ปุ่ม เพิ่ม ลบ User -->
                                        <br>
                                        <br>
                                        <tr>     
                                        	<th>No.</th>                                                                         	
                                            <th>Profile</th>
                                            <th>Up/Down</th>                                            
                                            <th>Shared</th>
                                            <th>Mac Cookie</th>
                                            <th>Address-Pool</th>
                                            <th>Address-List</th>
                                            <th>Edit</th>
                                        <!-- <th>แก้ไข / ลบ</th> -->
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
														echo "<td>";
															if($ARRAY[$i]['rate-limit']==""){
																echo "Unlimited";
															}else{
																echo $ARRAY[$i]['rate-limit'];
															}																
														echo "</td>";
													//	echo "<td>".$ARRAY[$i]['session-timeout']."</td>";
													//	echo "<td>".$ARRAY[$i]['idle-timeout']."</td>";
														echo "<td>".$ARRAY[$i]['shared-users']."</td>";
                            echo "<td>".$ARRAY[$i]['mac-cookie-timeout']."</td>";
                            echo "<td>".$ARRAY[$i]['address-pool']."</td>";
                            echo "<td>".$ARRAY[$i]['address-list']."</td>";
														echo "<td>
                                      
                                      <a href='profile_del.php?name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
													//	<a href='index.php?opt=edit_profile&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></button></a>
													echo "</tr>";
													}
												?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Profile </h4>
              </div>
              <div class="modal-body">
                <form id="add_user" action="con_addprofile.php" method="post">
                   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="กำหนดชื่อกลุ่มผู้ใช้งาน" class="form-control" data-toggle="tooltip" data-placement="top" title="กรุณาตั้งชื่อเป็นภาษาอังกฤษเท่านั้น">
                                        </div>
                    <hr>

                                        <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Address Pool&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="pool" size="1" data-toggle="tooltip" data-placement="top" title="กำหนด IP Adress ให้กับกลุ่มผู้ใช้งาน">
                                              <?php
                                                            $num =count($ARRAY1);
                                                            for($i=0; $i<$num; $i++){
                                                                $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                                echo '<option value="none"></option>';
                                                                echo '<option value="'.$ARRAY1[$i]['name'].$selected.'">'.$ARRAY1[$i]['name'].'</option>';
                                                            }
                                                        ?>
                                            </select>
                                     </div>


                                <!--        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Session Timeout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="session" placeholder="เวลาในการออนไลน์กับระบบ (ชั่วโมง:นาที:วินาที)" value="" class="form-control" required>
                                        </div>  -->

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Idle Timeout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="idle" placeholder="เวลาในการเชื่อมต่อระบบ (ชั่วโมง:นาที:วินาที)" class="form-control" value="none" data-toggle="tooltip" data-placement="top" title="กำหนดระยะเวลาตัดการเชื่อมต่อ">
                                        </div>

                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Keepalive Timeout</strong></span>
                                            <input type="text" name="keep" placeholder="เวลาในการคงอยู่ในระบบ (ชั่วโมง:นาที:วินาที)" class="form-control" value="00:10:00" data-toggle="tooltip" data-placement="top" title="กำหนดตัดการเชื่อมต่อเมื่อไม่ได้ใช้งาน">
                                        </div>

                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status Autorefresh</strong></span>
                                            <input type="text" name="auto" placeholder="เวลาการอัพเดตสถานะ (ชั่วโมง:นาที:วินาที)" class="form-control" value="00:01:00" data-toggle="tooltip" data-placement="top" title="กำหนดเวลารีเฟชสถานะผู้ใช้งานอินเตอร์เน็ต">
                                        </div>                    
                    <hr>
                    
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Shared&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="use" placeholder="จำนวนอุปกร์ใช้งานอินเตอร์เน็ต" class="form-control" value="1" data-toggle="tooltip" data-placement="top" title="กำหนดจำนวนอุปกรณ์ให้ Login ใช้งานได้">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Mac Cookie Timeout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="maccookie" placeholder="Ex: 3d12h30m " class="form-control" value="3d 00:00:00" data-toggle="tooltip" data-placement="top" title="กำหนดระยะเวลาให้ User ใช้งาน">
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>กำหนดความเร็ว&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="Upload/Download (Ex: 1m/5m)" class="form-control">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Address List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="addresslist" placeholder="Ex: Student" class="form-control" data-toggle="tooltip" data-placement="top" title="กำหนดชื่อ Address ของผู้ใช้งาน">
                                        </div>                    
                                                                      
                                      
                          <!--            <div class="form-group input-group">
                                            <span class="input-group-addon">Address List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select class="form-control" name="address" size="1" id="address">
                                              <?php
                          $List = $API->comm("/ip/firewall/address-list/print");
                          $num =count($List);   
                            echo '<option value=""></option>';
                          for($i=0; $i<$num; $i++){                           
                            echo '<option value="'.$List[$i]['list'].'">'.$List[$i]['list'].'</option>';
                          }
                        ?>
                                            </select>
                                        </div>                  -->

                  <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  &nbsp;&nbsp;&nbsp;                                     
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>  &nbsp;&nbsp;&nbsp; </a>
                                    </div>
                    
                                    </form>
               </div>
             </div>
            </div>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 



    </div>
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
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>
</body>
</html>
