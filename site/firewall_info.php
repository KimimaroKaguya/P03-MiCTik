<?php
        
            include_once('../config/routeros_api.class.php');           
            include_once('conn.php');   

            $ARRAY = $API->comm("/ip/firewall/layer7-protocol/print");          
            $ARRAY1 = $API->comm("/ip/firewall/filter/print");                                                         
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
               Kthai Team Firewall
                <small>Desing By Kthai Team</small>
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
                                  <li class="active"><a data-toggle="collapse" href="#fire_rules" aria-expanded="false" aria-controls="collapseExample">Fire Rules  <span class="sr-only">(current)</span></a></li>
                                  <li><a data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">NAT</a></li>
                                  <li><a data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Mangle</a></li>
                                  <li><a data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Address List</a></li>
                                  <li><a data-toggle="collapse" href="#firewall_L7" aria-expanded="false" aria-controls="collapseExample">L7 Protocols</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li data-toggle="modal" data-target="#add_l7"><a href="#">Add L7 Protocols</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="#">Add Address List</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="#">link2</a></li>
                                    </ul>
                                  </li>
                                </ul>

                              </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                      </nav>
              
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->           
                <div class="collapse" id="fire_rules">
                    
                     <div class="panel panel-default">
                            <div class="panel-heading">
                                        <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; Fire Rules</h4></div>
                                    </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>     
                                                <th><center>No.</center></th>                                                                            
                                                <th>Action</th>
                                                <th>Chain</th>
                                                <th><center>Src. Address</center></th>
                                                <th><center>Dst. Address</center></th>
                                                <th><center>Protocol</center></th>
                                                <th><center>Src. Port</center></th>
                                                <th><center>Dst. Port</center></th>
                                                <th><center>In Interface</center></th>
                                                <th><center>Out Interface</center></th>
                                                <th><center>Bytes</center></th>
                                                <th><center>Packets</center></th>
                                                <th><center>Delete</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    
                                                    <?php
                                                        $num =count($ARRAY1);                                                    
                                                        for($i=0; $i<$num; $i++){   
                                                        $no=$i+1;
                                                        echo "<tr>";
                                                            echo "<td><center>".$no."</center></td>";                    
                                                            echo "<td>".$ARRAY1[$i]['action ']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['chain ']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['src-address']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['dst-address']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['protocol']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['src-port']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['dst-port']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['in-interface']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['out-interface']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['bytes']."</td>";
                                                            echo "<td>".$ARRAY1[$i]['packets']."</td>";
                                                            
                                                            echo "<td><center>

                                                                <a href='con_del_pool.php?name=".$ARRAY1[$i]['name']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></center></td>";
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
                <div class="collapse" id="firewall_L7">
                    
                     <div class="panel panel-default">
                            <div class="panel-heading">
                                        <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; L7 Protocols</h4></div>
                                    </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                  
                                            <th>Name</th>
                                            <th>Regexp</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                        echo "<td><center>".$no."</center></td>";                    
                                                        echo "<td>".$ARRAY[$i]['name']."</td>";
                                                        echo "<td>".$ARRAY[$i]['regexp']."</td>";
                                                        echo "<td>".$ARRAY[$i]['comment']."</td>";
                                                        echo "<td><center>
                                                                    <a href='con_del_l7.php?name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></center></td>";
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

        </div>
    </section>
    <!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_l7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add L7 Protocols </h4>
              </div>
              <div class="modal-body">
                <form id="add_l7" action="con_add_firewall_l7.php" method="post">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                                    <input type="text" name="name" placeholder="กรุณาตั้งชื่อ L7" class="form-control" required>
                                            </div>
                                            Regexp
                                            <div class="form-group input-group">
                                     
                                                    <textarea name="code" cols="87" rows="10">
                                                    
                                                    </textarea>
                                            </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Comment&nbsp;&nbsp;&nbsp;</strong></span>
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
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>
</body>
</html>
