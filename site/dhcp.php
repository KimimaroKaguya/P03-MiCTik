<?php
        
            include_once('../config/routeros_api.class.php');           
            include_once('conn.php');   

            $ARRAY = $API->comm("/ip/dhcp-server/print");
            $ARRAY1 = $API->comm("/ip/dhcp-server/network/print");
            $ARRAY2 = $API->comm("/ip/dhcp-server/lease/print"); 
            $ARRAY3 = $API->comm("/ip/dhcp-server/option/print");
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
                โปรแกรมบริหารจัดการอินเตอร์เน็ต
                <small>Desing By Kthai Team</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">IP</li>
                <li class="active">DHCP</li>
              </ol>
            </section>
        <section class="content">
            <div class="row">
            <div class="col-lg-12">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#dhcp" aria-controls="home" role="tab" data-toggle="tab">DHCP Server</a></li>
    <li role="presentation"><a href="#network" aria-controls="profile" role="tab" data-toggle="tab">Network</a></li>
    <li role="presentation"><a href="#leases" aria-controls="messages" role="tab" data-toggle="tab">Leases</a></li>
    <li role="presentation"><a href="#option" aria-controls="settings" role="tab" data-toggle="tab">Option</a></li>
    <li class="dropdown" >
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li data-toggle="modal" data-target="#add_dhcp"><a href="#">Add DHCP Server</a></li>
      <li data-toggle="modal" data-target="#add_network"><a href="#">Add Network</a></li>
      <li data-toggle="modal" data-target="#add_lease"><a href="#">Add Leases</a></li>
      <li data-toggle="modal" data-target="#add_option"><a href="#">Add Option</a></li> 
    </ul>
  </li>
  </ul>
<!--*********************************************************************************************************-->
  <!-- Tab panes -->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="dhcp">
    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                                    <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; DHCP Server </h4></div>
                                </div>  -->
            <div class="box-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                                                            
                                            <th><center>Name</center></th>
                                            <th><center>Interface</center></th>
                                            <th><center>Relay</center></th>
                                            <th><center>Leaes Time</center></th>
                                            <th><center>Address Pool</center></th>
                                            <th><center>Add ARP</center></th>
                                            <th><center>Edit</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td><center>".$ARRAY[$i]['name']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['interface']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['relay']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['lease-time']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['address-pool']."</center></td>";
                                                        echo "<td><center>".$ARRAY[$i]['add-arp']."</center></td>";
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
  <!--*********************************************************************************************************-->
  <div role="tabpanel" class="tab-pane fade" id="network">
      <div class="panel panel-default">
                        <!--<div class="panel-heading">
                                    <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; DHCP Network </h4></div>
                                </div>  -->
            <div class="box-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                                                            
                                            <th><center>Address</center></th>
                                            <th><center>Gateway</center></th>
                                            <th><center>DNS Server</center></th>
                                            <th><center>Domain</center></th>
                                            <th><center>Wins Server</center></th>
                                            <th><center>Network</center></th>
                                            <th><center>Edit</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY1);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td><center>".$ARRAY1[$i]['address']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['gateway']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['dns-server']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['domain']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['wins-server']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['next-server']."</center></td>";
                                                        echo "<td><center>

                                                            <a href='address_del.php?name=".$ARRAY1[$i]['address']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
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
  <!--*********************************************************************************************************-->
  <div role="tabpanel" class="tab-pane fade" id="leases">
      <div class="panel panel-default">
                        <!--<div class="panel-heading">
                                    <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; DHCP Leases </h4></div>
                                </div>  -->
            <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                                                            
                                            <th><center>Address</center></th>
                                            <th><center>Mac-addres</center></th>
                                            <th><center>Client-id</center></th>
                                            <th><center>Server</center></th>
                                            <th><center>Active address</center></th>
                                            <th><center>Active mac address</center></th>
                                            <th><center>Active Hostname</center></th>
                                            <th><center>Expires after</center></th>
                                            <th><center>Status</center></th>
                                            <th><center>Edit</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY2);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td><center>".$ARRAY2[$i]['address']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['mac-address']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['client-id']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['server']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['active-address']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['active-mac-address']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['host-name']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['expires-after']."</center></td>";
                                                        echo "<td><center>".$ARRAY2[$i]['status']."</center></td>";
                                                        echo "<td><center>

                                                            <a href='con_del_lease.php?name=".$ARRAY2[$i]['active-address']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
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
  <!--*********************************************************************************************************-->
  <div role="tabpanel" class="tab-pane fade" id="option">
      <div class="panel panel-default">
                        <!--<div class="panel-heading">
                                    <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; DHCP Network </h4></div>
                                </div>  -->
            <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                                                            
                                            <th><center>Name</center></th>
                                            <th><center>Code</center></th>
                                            <th><center>Value</center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY3);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td><center>".$ARRAY3[$i]['name']."</center></td>";
                                                        echo "<td><center>".$ARRAY3[$i]['code']."</center></td>";
                                                        echo "<td><center>".$ARRAY3[$i]['value']."</center></td>";
                                                        
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

  <!--****************************************************************************************************-->
            <div class="collapse" id="collapseExample1">
                
                 <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; DHCP Network </h4></div>
                                </div>
            <div class="box-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                                                            
                                            <th><center>Address</center></th>
                                            <th><center>Gateway</center></th>
                                            <th><center>DNS Server</center></th>
                                            <th><center>Domain</center></th>
                                            <th><center>Wins Server</center></th>
                                            <th><center>Network</center></th>
                                            <th><center>Edit</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY1);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td><center>".$ARRAY1[$i]['address']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['gateway']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['dns-server']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['domain']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['wins-server']."</center></td>";
                                                        echo "<td><center>".$ARRAY1[$i]['next-server']."</center></td>";
                                                        echo "<td><center>

                                                            <a href='address_del.php?name=".$ARRAY1[$i]['address']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
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
        </section>
<!--********************************************************************************************************-->
<!-- Modal -->
<div class="modal fade" id="add_dhcp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add DHCP Server</h4>
      </div>
      <div class="modal-body">
        <form id="add_pool" action="con_add_pool.php" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="namepool" placeholder="กรุณากรอกชื่อ Pool" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Addresses&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="ranges" placeholder="172.16.0.2-172.16.0.254" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Next Pool&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="nextpool" size="1" id="nextpool">
                                                <?php
                                                    $num =count($ARRAY);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="none"></option>';
                                                        echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                     </div>

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
<!--********************************************************************************************************-->
<!-- Modal -->
<div class="modal fade" id="add_network" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Network </h4>
      </div>
      <div class="modal-body">
        <form id="add_pool" action="con_add_pool.php" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="namepool" placeholder="กรุณากรอกชื่อ Pool" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Addresses&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="ranges" placeholder="172.16.0.2-172.16.0.254" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Next Pool&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="nextpool" size="1" id="nextpool">
                                                <?php
                                                    $num =count($ARRAY);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="none"></option>';
                                                        echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                     </div>


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
<!--********************************************************************************************************-->
<!-- Modal -->
<div class="modal fade" id="add_lease" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Leases </h4>
      </div>
      <div class="modal-body">
        <form id="add_pool" action="con_add_pool.php" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="namepool" placeholder="กรุณากรอกชื่อ Pool" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Addresses&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="ranges" placeholder="172.16.0.2-172.16.0.254" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Next Pool&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="nextpool" size="1" id="nextpool">
                                                <?php
                                                    $num =count($ARRAY);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="none"></option>';
                                                        echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                     </div>


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
<!--********************************************************************************************************-->
<!-- Modal -->
<div class="modal fade" id="add_option" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Option </h4>
      </div>
      <div class="modal-body">
        <form id="add_pool" action="con_add_pool.php" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="namepool" placeholder="กรุณากรอกชื่อ Pool" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Addresses&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="ranges" placeholder="172.16.0.2-172.16.0.254" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Next Pool&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="nextpool" size="1" id="nextpool">
                                                <?php
                                                    $num =count($ARRAY);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="none"></option>';
                                                        echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                     </div>


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
<!--********************************************************************************************************-->


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
