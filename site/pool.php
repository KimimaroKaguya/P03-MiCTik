<?php
        
            include_once('../config/routeros_api.class.php');           
            include_once('conn.php');   

            $ARRAY = $API->comm("/ip/pool/print"); 
            $ARRAY1 = $API->comm("/ip/pool/used/print");          
                                                                    
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
                                  <li class="active"><a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Pool <span class="sr-only">(current)</span></a></li>
                                  <li><a data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Used Addresses</a></li>

                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li data-toggle="modal" data-target="#add_pool1"><a href="#">Add Pool</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="#"> link1</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="#">link2</a></li>
                                    </ul>
                                  </li>
                                </ul>

                              </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                      </nav>
              
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->           
                <div class="collapse" id="collapseExample">
                    
                     <div class="panel panel-default">
                            <div class="panel-heading">
                                        <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; Pool</h4></div>
                                    </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>     
                                                <th><center>No.</center></th>                                                                            
                                                <th>Name</th>
                                                <th>Address Ranges</th>
                                                <th><center>Next Pool</center></th>
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
                                                            echo "<td>".$ARRAY[$i]['name']."</td>";
                                                            echo "<td>".$ARRAY[$i]['ranges']."</td>";
                                                            echo "<td><center>".$ARRAY[$i]['next-pool']."</center></td>";
                                                            echo "<td><center>

                                                                <a href='con_del_pool.php?name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></center></td>";
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
                                        <div><h4><i class="fa fa-list"></i>&nbsp;&nbsp; Used Address</h4></div>
                                    </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>     
                                            <th><center>No.</center></th>                                  
                                            <th>Pool</th>
                                            <th>Address</th>
                                            <th><center>Owner</center></th>
                                            <th>Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                                <?php
                                                    $num =count($ARRAY1);                                                    
                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    echo "<tr>";
                                                    echo "<td><center>".$no."</center></td>";                    
                                                    echo "<td>".$ARRAY1[$i]['pool']."</td>";
                                                    echo "<td>".$ARRAY1[$i]['address']."</td>";
                                                    echo "<td><center>".$ARRAY1[$i]['owner']."</center></td>";
                                                    echo "<td>".$ARRAY1[$i]['info']."</td>";
                                                        
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
        <div class="modal fade" id="add_pool1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Pool </h4>
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
            <b>Desing By</b> Kthai Team
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">Kthai Team</a>.</strong> All rights
  </footer>
</body>
</html>
