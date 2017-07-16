<?php session_start();
    if (empty($_SESSION['ses_fbid'])) {
header("Location: index.php");
}
function convertdate($date) {
//แยกตัวเลขออกจากเครื่องหมาย -
  $day = substr($date, 8, 2);
  $year = substr($date, 0, 4);
  $month = substr($date, 5, 2);
//ทำการสร้าง Array ที่เก็บเดือนต่างๆ
  $thai_month_arr=array(
  "0"=>"",
  "01"=>"มกราคม",
  "02"=>"กุมภาพันธ์",
  "03"=>"มีนาคม",
  "04"=>"เมษายน",
  "05"=>"พฤษภาคม",
  "06"=>"มิถุนายน", 
  "07"=>"กรกฎาคม",
  "08"=>"สิงหาคม",
  "09"=>"กันยายน",
  "10"=>"ตุลาคม",
  "11"=>"พฤศจิกายน",
  "12"=>"ธันวาคม"         
);
//ทำการเลือกเดือนตามตัวเลขที่ระบุ
  $month_final = $thai_month_arr[($month)];
//ทำการรวม วัน เดือน ปี เข้าเป็นตัวแปรเดียวกัน เพื่อเตรียมส่งค่าออกนอกฟังก์ชัน
  $date = $day . ' ' . $month_final . ' ' . $year; 
//ส่งค่าออกนอกฟังก์ชัน เพื่อนำไปใช้งานต่อ
  return $date;
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Anypic2u - Your Movies Your Select!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Anypic2u - เป็นเว็บไซต์รวบรวมความบันเทิงครบครัน ไม่ว่าจะเป็นภาพยนตร์ต่างประเทศ ละคร ซีรี่ส์ต่างๆ">
    <meta name="author" content="Kusumoto">
   <link rel="icon" href="img/logo1.png" type="image/x-icon"/>

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
   <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">-->

 <script>
$(document).ready(function(){
    $("#form").on('submit',function(event){
    event.preventDefault();
        $.ajax({
        type: "POST",
        url: "savedonate.php",
        data: $("#form").serialize(),
        }).done(function(msg) {{
            $("#alert").html(msg);
        }
        });
    });
});
</script>

   <script>
window.onload = function() {
   document.getElementById("load").style.display = "none";
}
</script>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=372632369514370";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="brand" href="index.php"><img src="img/logo.png"></a>
          <ul class="nav pull-right">
          <li class="divider-vertical"></li>
              <?php include('fb_user.php'); ?>
            </ul>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php"><i class="icon-home"></i> Home</a></li>
              <li><a href="sys_status.php"><i class="icon-signal"></i> System Status</a></li>
              <li><a href="#"><i class="icon-play"></i> Player</a></li>
              <li><a href="notifi.php"><i class="icon-bullhorn"></i> Notification</a></li>
              <li class="active"><a href="donate.php"><i class="icon-info-sign"></i> Donate <img src="img/donate_notif.png" \></a></li>
              <li><a href="invite.php"><i class="icon-share"></i> Invite</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container-fluid">
  <div class="alert alert-error">
  <?php include('notification_new.php'); ?>
</div>
<?php
include('db_connect.php');
$link = new mysqli($host,$user,$pass,$db);
if ($link->connect_error) {
  die("Error : ".mysqli_connect_errno());
}
$fbid = $_SESSION['ses_fbid'];
$link->set_charset("utf8");
$coinquery = $link->query("SELECT * from anypic2u_coin WHERE fbid='$fbid'");
$coinnum = $coinquery->num_rows;
if ($coinnum == 0) {
  $coin = 0;
}else{
  $i=0;
  while($row = $coinquery->fetch_array(MYSQLI_BOTH)) {
    $coin = $row['coin'];
    $i++;
  }
}
$userquery = $link->query("SELECT * from anypic2u_user WHERE fbid='$fbid'");
$usernum = $userquery->num_rows;
if ($usernum != 0) {
  $fetch_array = $userquery->fetch_array(MYSQLI_BOTH);
  $donate1 = $fetch_array['donate'];
  $vipdatequery = $link->query("SELECT * from anypic2u_vipdate WHERE fbid='$fbid'");
  while($row = $vipdatequery->fetch_array(MYSQLI_BOTH)) {
    $datex = $row['date'];
  }
}
$datex = convertdate($datex);
?>

<div class="alert alert-warning" id="load">
  <p><img src='img/20-0.gif' border='0'>  <strong>หน้านี้จะใช้เวลาโหลดสักครู่นะครับ โปรดรอจนกว่าหน้านี้จะโหลดเสร็จ</strong></p>
</div>
<center><div class="fb-like-box" data-href="https://www.facebook.com/zxpic" data-width="500" data-height="210" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div></center>
      </br>
      <?php if ($donate1 == 2) { ?>
      <div class="alert alert-info"><center><strong>โปรดทราบ : </strong>สถานะ Donater ของคุณจะหมดลงในวันที่ <?=$datex;?></center></div>
      </br>
      <?php }else if ($donate1 == 1) { ?>
      <div class="alert alert-info"><center><strong>โปรดทราบ : </strong>สถานะ Donater ของคุณเป็นแบบถาวร</center></div>
      <?php } ?>
      <h1>Donation</h1>
      <small>เนื่องจากการขับเคลื่อนเว็บไซต์นั้น จำเป็นต้องมีค่าใช้จ่ายในการดูและรักษาระบบ ค่าเช่า Server และค่าอัพเกรดระบบใหม่ๆ ให้ทันสมัยและรองรับบริการมากขึ้น การบริจาคด้วยเงินของคุณจะทำให้เว็บไซต์ดำเนินต่อไปอย่างราบรื่น และมีสิ่งใหม่ๆ มาให้ลองเล่นกันเสมอ</small>
      </br>
      <h3>บริจาคแล้วได้อะไร?</h3>
      <small>ค่าสมาชิกพิเศษ (Donater) จ่ายค่าบริการเดือนละ 150 บาท (0.7 BTC) คุณจะได้รับเครื่องหมายดาว <img src="img/star.png" \> เพื่อเป็นการแสดงให้เห็นว่าท่านเป็นสมาชิกแบบ Donater โดยทางเราจะเก็บสะสมเงินของคุณไปเรื่อยๆ โดยอัตราค่าบริการจะแตกต่างกัน ดังนี้</small> 
      <h3>ช่องทางในรับเงิน</h3>
      <div class="alert alert-warning">
      <p><strong>โปรดทราบ ตอนนี้คุณมียอดเงินสะสม <font color="red"><?=$coin;?></font> บาท</strong> <a href="setvip.php?type=1" class="btn btn-primary" >หักเงินเพื่อต่ออายุ Donater (ต่อรายวัน 10 บาท)</a> <a href="setvip.php?type=2" class="btn btn-primary" >หักเงินเพื่อต่ออายุ Donater (ต่อรายเดือน 150 บาท)</a> <a href="setinvite.php" class="btn btn-primary" >หักเงินเพื่อซื้อ Invite (1 อัน 20 บาท)</a> <a href="setdemo.php" class="btn btn-primary" >ทดลองใช้งาน 1 วัน (ฟรี)</a></p>
      </div>
      <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ช่องทางในการรับเงิน</th>
                <th>รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img src="img/true.jpg" />
                </td>
                <td>
                  <code>ผ่านช่องทาง True Money ท่านจะต้องรับภาระในการจ่ายค่าธรรมเนียมในการหักเงิน (การเติมเงินทุกครั้ง จะมีการหักค่าทำเนียม 15% ในการเติมเงินทุกครั้ง)</code>
                </td>
              </tr>
              <tr>
                <td>
                   <img src="img/bitcoin.jpg" />
                  
                </td>
                <td>
                  <code>ผ่านช่องทาง Bitcoin ท่านจะต้องรับภาระในการจ่ายค่าธรรมเนียมในการหักเงิน (การเติมเงินทุกครั้ง จะมีการหักค่าธรรมเนียม 100 บาทในการเติม)</code>
                </td>
              </tr>
            </tbody>
          </table>

      <h3>ข้อมูลการบริจากผ่าน True Money</h3>
      <div id="warning" style="text-align:center;background-color:green;color:white;font-weight:bold;font-size:120%;padding:5px;">ระบบหักเงินอัตโนมัติ ทำงานปกติแล้วครับ</div>
      <small><strong>กรุณาดู และกรอกข้อมูลตามที่เราบอกด้วยนะครับ เพื่อประโยชน์ของท่านเอง เพราะถ้าทางกรอกข้อมูลไม่ตามที่เราบอกด้านล่าง จะมีปัญหาตามมาทีหลังได้นะครับ</strong></small>
      <hr>
      <div class="control-group">
        <strong>Facebook ID :: </strong><?=$fbid;?> <strong><font color="red">(สำคัญมากนะครับ กรอกให้ตรงทุกตัว)</font></strong>
        </div>
      <div class="control-group">
        <strong>E-Mail Address :: </strong>กรอก E-Mail ที่สามารถติดต่อกลับได้ของคุณ
        </div>
        <div class="control-group">
        <strong>เบอร์โทรศัพท์ :: </strong>กรอกเบอร์โทรศัพท์ที่สามารถติดต่อคุณได้
        </div>
       
       <a href="http://www.tmtopup.com/topup/?uid=" target="_BLANK" class="btn btn-primary">เริ่มต้นขั้นตอนการจ่ายเงินด้วย True Money</a>
        <hr>
      <h3>แจ้งบริจาค (สำหรับ Bitcoin)</h3>
    <form class="form-horizontal" id="form" method="GET" action="savedonate.php">
          <div class="control-group">
              <label class="control-label">จำนวนเงิน</label>
                  <div class="controls">
                      <input type="text" name="donate_total" class="input-mini" >
           </div>
         </div>
    <div class="control-group">
            <label class="control-label">วันเวลาโอน</label>
                <div class="controls">
                  <input class="hasDatepicker" name="date" type="text"><span class="help-inline">กรอกวันเวลาให้ละเอียดครบถ้วน เพื่อใช้ในการตรวจสอบ</span>
            </div>
    </div>
    <div class="control-group">
      <label class="control-label">ธนาคารที่โอน</label>
       <div class="controls">
         <select class="span2" name="bank">
          <option>Bitcoin</option>
        </select>
        </div>
       Bitcoin QR Code <img src="img/bitcoin.png" >
   </div>

           <div class="controls">
    <button type="submit" class="btn btn-primary" data-loading-text="Loading...">แจ้งโอนเงิน</button>
    </div>
    </form>
    
<div id="set_security" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="security_title" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
      <h3 id="security_title">สร้าง/ปรับเปลี่ยนรหัสผ่านเข้าสู่ระบบแบบครั้งเดียว</h3>
        </div>
      <div class="modal-body">
     <iframe width="100%" height="260px" frameborder="0" scrolling="no" allowtransparency="true" src="set_securitycode.php"></iframe>
      </div>
   <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> ปิด</button>
    </div>
</div>

        <div class="alert alert-error" id="alert">
    </div>

      <footer>
        <hr>
        <p class="pull-right"><!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="counter free hit invisible" ><script  type="text/javascript" >
try {Histats.start(1,2414640,4,110,145,23,"00000001");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2414640&101" alt="counter free hit invisible" border="0"></a></noscript>
<!-- Histats.com  END  --><a href="#">Back to top</a></p>
        <p>&copy; 2013 Anypic2u by Kusumoto <script type="text/javascript" language="javascript1.1" src="http://tracker.stats.in.th/tracker.php?sid=50590"></script><noscript><a target="_blank" href="http://www.stats.in.th/">www.Stats.in.th</a></noscript></p>
      </footer>
  </div>
  

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>