
<?php    
    include_once('../config/routeros_api.class.php');
    include_once('conn.php');     
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
</head>
<body>

!-- Page Content -->
<div class="content-wrapper">   
        <section class="content">       
 <!-- Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                    <div><h4><i class="fa fa-wifi"></i> Log</h4></div>
                                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
<?php
        try {
            $util = new RouterOS\Util($client = new RouterOS\Client('$ip', '$user', '$pass'));
        ?><table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Topics</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($util->setMenu('/log')->getAll() as $entry) { ?>
                <tr>
                    <td><?php echo $entry('time'); ?></td>
                    <td>
                    <?php foreach (explode(',', $entry('topics')) as $topic) { ?>
                        <span><?php echo $topic; ?></span>
                    <?php } ?>
                    </td>
                    <td><?php echo $entry('message'); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } catch (Exception $e) { ?>
            <div>Unable to connect to RouterOS.</div>
        <?php } ?>



                            </div>     
                        <!-- /#page-wrapper -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Manas Panjai
        </div>
    <strong>Copyright &copy; 2016 - <?php echo date("Y");?> <a href="#">โรงเรียนหนองบัว</a>.</strong> All rights
  </footer>



</body>
</html>