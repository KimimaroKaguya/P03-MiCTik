<?php
        
            include_once('../config/routeros_api.class.php');           
            include_once('conn.php');   

            $ARRAY = $API->comm("/ip/address/print");
            $ARRAY1 = $API->comm("/interface/print");  
            //$ARRAY1 = $API->comm("/ip/pool/used/print");          
                                                                    
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
                API Mikrotik
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">IP</li>
                <li class="active">Address</li>
              </ol>
            </section>
        <section class="content">
            <div class="row">
           <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; ALL Address </h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                                                            
                                            <th><center>Address</center></th>
                                            <th><center>Network</center></th>
                                            <th><center>Interface</center></th>
                                            <th><center>comment</center></th>
                                            <th><center>Delete</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td><center>".$ARRAY[$i]['address']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['network']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['interface']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['comment']."</center></td>";
                                                        echo "<td><center>

                                                            <a href='address_del.php?name=".$ARRAY[$i]['address']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
                                                    //  <a href='index.php?opt=edit_profile&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></button></a>
                                                    echo "</center></tr>";
                                                    }
                                                ?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
<!--++++++++++++++++++++++++++++++++++ส่วนเปิด แสดง Resourec Mikrotik +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="col-lg-4">
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-server" aria-hidden="true"></i> Add Address-List</h3>
                        </div>
                        <!-- /.panel-heading -->
                 
                        <div class="panel-body">

                          <form id="add_address" action="con_add_address.php" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="address" placeholder="Ex: 172.16.0.0/23" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Network&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="network" placeholder="Ex:172.16.0.0" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Interface&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="interface" size="1" id="interface">
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
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  &nbsp;&nbsp;&nbsp;                                     
                                        <button id="btnCancel" class="btn btn-danger" type="cancel" Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button></a>
                                    </div> 
                                </form>
                          
                        </div>

                </div>
            </div>
        </div>

    </section>
    </div>
        <!-- /#page-wrapper -->
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
