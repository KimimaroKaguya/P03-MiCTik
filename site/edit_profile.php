<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
						
                        $Profile = $API->comm("/ip/hotspot/user/profile/print", array(
                                    "from" => $profile,
                                )); 																																	$profile=$_GET[name];		
                  												
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div class="content-wrapper">
            <section class="content-header">
              <h1>
                โปรแกรมบริหารจัดการอินเตอร์เน็ต โรงเรียน
                <small>Desing By Manas Panjai</small>
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
                            <form id="edit_profile" action="con_editprofile" method="post">
                                       <div class="form-group input-group">
                                            <span class="input-group-addon">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="name" placeholder="Profiles Name" class="form-control" value="<?php echo $Profile['0']['name'];?>" required>
                                            <input type="hidden" name="profile" value="<?php echo $_GET['name'];?>">
                                        </div>
                                        <hr>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Session Timeout&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="session" placeholder="Session Timeout (h:m:s)" value="<?php echo $Profile['0']['session-timeout'];?>" class="form-control">
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Idle Timeout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="idle" placeholder="Idle Timeout (h:m:s)" class="form-control"  value="<?php echo $Profile['0']['idle-timeout'];?>" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Keepalive Timeout</span>
                                            <input type="text" name="keep" placeholder="Keepalive Timeout (h:m:s)" class="form-control"  value="<?php echo $Profile['0']['keepalive-timeout'];?>" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Status Autorefresh</span>
                                            <input type="text" name="auto" placeholder="Status Autorefresh (h:m:s)" class="form-control"  value="<?php echo $Profile['0']['status-autorefresh'];?>" required>
                                        </div>
                                        <hr>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Shared Users&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="use" placeholder="Shared Users" class="form-control"  value="<?php echo $Profile['0']['shared-users'];?>" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Rate Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="limit" placeholder="Upload / Download" class="form-control"  value="<?php echo $Profile['0']['rate-limit'];?>">
                                        </div>                                      
                                                                      
<!--                                      
                                      <div class="form-group input-group">
                                            <span class="input-group-addon">Address List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select class="form-control" name="address" size="1" id="address">
                                                <?php
                                                    
                                                    
                                                    if($Profile['0']['address-list']==""){
                                                        $List = $API->comm("/ip/firewall/address-list/print");
                                                        echo '<option value="'.$Profile['0']['address-list'].'">'.$Profile['0']['address-list'].'</option>';
                                                        $num =count($List);                                                         
                                                        for($i=0; $i<$num; $i++){                                                       
                                                            echo '<option value="'.$List[$i]['list'].'">'.$List[$i]['list'].'</option>';
                                                        }
                                                    }else{
                                                        $List = $API->comm("/ip/firewall/address-list/print");
                                                        $num =count($List); 
                                                        echo '<option value="'.$Profile['0']['address-list'].'">'.$Profile['0']['address-list'].'</option>';
                                                        for($i=0; $i<$num; $i++){
                                                            if($List[$i]['list']!=$Profile['0']['address-list']){
                                                                echo '<option value="'.$List[$i]['list'].'">'.$List[$i]['list'].'</option>';
                                                            }
                                                        }
                                                        echo '<option value=""></option>';
                                                    }
                                                ?>    -->
                                
                                    <div class="form-group input-group">                                      
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
                                        <button id="btnCancel" class="btn btn-danger" type="reset"  Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button>
                                    </div> 


                                </form>
                        </div>   

                                    
                        </div>
                    </div>
                </div>
            </section>
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
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>
</body>
</html>
