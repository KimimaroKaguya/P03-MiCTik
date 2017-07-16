<?php
        
            include_once('../config/routeros_api.class.php');           
            include_once('conn.php');   
      
            $ARRAY = $API->comm("/ip/hotspot/walled-garden/ip/print");
            $ARRAY1 = $API->comm("/ip/hotspot/ip-binding/print");

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
                โปรแกรมบริหารจัดการอินเตอร์เน็ต
                <small>Desing By Manas Panjai</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                <li class="active">IP</li>
                <li class="active">Pool</li>
              </ol>
            </section>
        <section class="content">
            <div class="row">

<!--++++++++++++++++++++++++++++++++++ส่วนเปิด แสดง Resourec Mikrotik +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="col-lg-12">
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                              <!-- Brand and toggle get grouped for better mobile display -->

                              <!-- Collect the nav links, forms, and other content for toggling -->
                              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                  <li class="active"><a data-toggle="collapse" href="#bypass_all_web" aria-expanded="false" aria-controls="collapseExample">Bypass All Website <span class="sr-only">(current)</span></a></li>
                                  <li><a data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Bypass MAC Address</a></li>

                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li data-toggle="modal" data-target="#add_bypass_web"><a href="#">Add Bypass Website</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li data-toggle="modal" data-target="#add_bypass_mac"><a href="#">Add Bypass MAC</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="#">link2</a></li>
                                    </ul>
                                  </li>
                                </ul>

                              </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                      </nav>
              
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->           
                <div class="collapse" id="bypass_all_web">
                    
                     <div class="panel panel-default">
                            <div class="panel-heading">
                                        <div><h4><i class="fa fa-internet-explorer"></i>&nbsp;&nbsp; Bypass Website</h4></div>
                                    </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>     
                                                <th><center>No.</center></th>                                                                            
                                                <th>Action</th>
                                                <th>Website</th>
                                                <th><center>Src Address</center></th>
                                                <th>Comment</th>
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
                                                            echo "<td>".$ARRAY[$i]['action']."</td>";
                                                            echo "<td>".$ARRAY[$i]['dst-host']."</td>";
                                                            echo "<td><center>".$ARRAY[$i]['src-address']."</center></td>";
                                                            echo "<td>".$ARRAY[$i]['comment']."</td>";
                                                            echo "<td><center>

                                                                <a href='con_del_bypass_web.php?name=".$ARRAY[$i]['dst-host']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></center></td>";
                                                        //  <a href='index.php?opt=edit_profile&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></button></a>
                                                        echo "</tr>";
                                                        }
                                                    ?>
                                                                                                       
                                                                                   
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                    </div>
                   
                </div>        
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="collapse" id="collapseExample1">
                    
                     <div class="panel panel-default">
                            <div class="panel-heading">
                                        <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; Bypass MAC address</h4></div>
                                    </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                  
                                            <th>Mac Address</th>
                                            <th>Address</th>
                                            <th>To Address</th>
                                            <th>Type</th>
                                            <th>Server</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY1);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                    echo "<td><center>".$no."</center></td>";                    
                                                    echo "<td>".$ARRAY1[$i]['mac-address']."</td>";
                                                    echo "<td>".$ARRAY1[$i]['address']."</td>";
                                                    echo "<td>".$ARRAY1[$i]['to-address']."</td>";
                                                    echo "<td>".$ARRAY1[$i]['type']."</td>";
                                                    echo "<td>".$ARRAY1[$i]['server']."</td>";
                                                    echo "<td>".$ARRAY1[$i]['comment']."</td>";   
                                                     echo "<td><center>
                                                      <a href='con_del_bypass_mac.php?name=".$ARRAY[$i]['mac-address']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></center></td>"; 
                                                    }
                                                ?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div> 

                            </div>
                    </div>
                   
                </div>        
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

        </div>
    </section>
    <!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_bypass_web" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Bypass Website </h4>
              </div>
              <div class="modal-body">
                <form id="add_bypass" action="con_add_bypassweb.php" method="post">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><strong>Host name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                                    <input type="text" name="hostname" placeholder="Ex: nongbua.ac.th" class="form-control" required>
                                            </div>
                                           
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><strong>Action&nbsp;&nbsp;&nbsp;</strong></span>
                                                    <select class="form-control" name="action" size="1">
                                                      <option value="accept">Accept</option>
                                                      <option value="drop">Drop</option>
                                                      <option value="drop">Reject</option>
                                                    </select>
                                             </div>
                                             <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  
                            <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>
                          </div>
              
                </form>
               </div>
             </div>
            </div>
          </div>
<!--********************************************************************************************************-->
<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_bypass_mac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Bypass MAC </h4>
              </div>
              <div class="modal-body">
                <form id="add_bypass" action="con_add_bypassmac.php" method="post">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><strong>MAC Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                                    <input type="text" name="macname" placeholder="Ex: 00:00:00:00:00:00" class="form-control" required>
                                            </div>
                                           
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><strong>Type&nbsp;&nbsp;&nbsp;</strong></span>
                                                    <select class="form-control" name="type" size="1">
                                                      <option value="regular">Regular</option>
                                                      <option value="bypassed">Bypass</option>
                                                      <option value="blocked">Block</option>
                                                    </select>
                                             </div>
                                             <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button></a>  
                            <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>
                          </div>
              
                </form>
               </div>
             </div>
            </div>
          </div>
<!--********************************************************************************************************-->

    </div>
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
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>
</body>
</html>
