<?php
error_reporting(0);
	session_start();
	ob_start();
	include("../include/class.mysqldb.php");
	include("../include/config.inc.php");	

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="900"/> <!-- โค๊ดรีเฟรชหน้าเว็บ -->
  <title>Kthai Technology Site</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
  <LINK REL="SHORTCUT ICON" HREF="../img/f5.ico">       <!--+++++++  คำสั่งเรียกใช้ ภาพ ของ icon แสดงบน title bar ++++++++-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->  
<!-- ส่วนเปิด Morniter กราฟ -->
<script> 
	var chart;
	function requestDatta(interface) {
		$.ajax({
			url: 'data.php?interface='+interface,
			datatype: "json",
			success: function(data) {
				var midata = JSON.parse(data);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
					var RX=parseInt(midata[1].data);
					var x = (new Date()).getTime(); 
					shift=chart.series[0].data.length > 19;
					chart.series[0].addPoint([x, TX], true, shift);
					chart.series[1].addPoint([x, RX], true, shift);
					document.getElementById("trafico").innerHTML=TX + " / " + RX;
				}else{
					document.getElementById("trafico").innerHTML="- / -";
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});
	}	

	$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});
	

           chart = new Highcharts.Chart({
			   chart: {
				renderTo: 'container',
				animation: Highcharts.svg,
				type: 'spline',
				events: {
					load: function () {
						setInterval(function () {
							requestDatta(document.getElementById("interface").value);
						}, 6000);
					}				
			}
		 },
		 title: {
			text: 'กราฟความเร็วการใช้งานอินเตอร์เน็ต'
		 },
		 xAxis: {
			type: 'datetime',
				tickPixelInterval: 150,
				maxZoom: 20 * 1000
		 },
		 yAxis: {
			minPadding: 0.2,
				maxPadding: 0.2,
				title: {
					text: 'Kthai Technology',
					margin: 80
				}
		 },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }]
	  });
  });
</script>
<!-- ส่วนปิด Morniter กราฟ -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<script>
function popup(url,name,windowWidth,windowHeight){      
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;   
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;     
    properties = "width="+windowWidth+",height="+windowHeight;  
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;     
    window.open(url,name,properties);  
}  
$(function () {
	
	/**
	 * Get the current time
	 */
	function getNow () {
	    var now = new Date();
	        
	    return {
	        hours: now.getHours() + now.getMinutes() / 60,
	        minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
	        seconds: now.getSeconds() * 12 / 60
	    };
	};
	
	/**
	 * Pad numbers
	 */
	function pad(number, length) {
		// Create an array of the remaining length +1 and join it with 0's
		return new Array((length || 2) + 1 - String(number).length).join(0) + number;
	}
	
	var now = getNow();
	
	// Create the chart
	$('#container1').highcharts({
	
	    chart: {
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false,
	        height: 200
	    },
	    
	    credits: {
	        enabled: false
	    },
	    
	    title: {
	    	text: 'The Highcharts clock'
	    },
	    
	    pane: {
	    	background: [{
	    		// default background
	    	}, {
	    		// reflex for supported browsers
	    		backgroundColor: Highcharts.svg ? {
		    		radialGradient: {
		    			cx: 0.5,
		    			cy: -0.4,
		    			r: 1.9
		    		},
		    		stops: [
		    			[0.5, 'rgba(255, 255, 255, 0.2)'],
		    			[0.5, 'rgba(200, 200, 200, 0.2)']
		    		]
		    	} : null
	    	}]
	    },
	    
	    yAxis: {
	        labels: {
	            distance: -20
	        },
	        min: 0,
	        max: 12,
	        lineWidth: 0,
	        showFirstLabel: false,
	        
	        minorTickInterval: 'auto',
	        minorTickWidth: 1,
	        minorTickLength: 5,
	        minorTickPosition: 'inside',
	        minorGridLineWidth: 0,
	        minorTickColor: '#666',
	
	        tickInterval: 1,
	        tickWidth: 2,
	        tickPosition: 'inside',
	        tickLength: 10,
	        tickColor: '#666',
	        title: {
	            text: 'Powered by<br/>Highcharts',
	            style: {
	                color: '#BBB',
	                fontWeight: 'normal',
	                fontSize: '8px',
	                lineHeight: '10px'                
	            },
	            y: 10
	        }       
	    },
	    
	    tooltip: {
	    	formatter: function () {
	    		return this.series.chart.tooltipText;
	    	}
	    },
	
	    series: [{
	        data: [{
	            id: 'hour',
	            y: now.hours,
	            dial: {
	                radius: '60%',
	                baseWidth: 4,
	                baseLength: '95%',
	                rearLength: 0
	            }
	        }, {
	            id: 'minute',
	            y: now.minutes,
	            dial: {
	                baseLength: '95%',
	                rearLength: 0
	            }
	        }, {
	            id: 'second',
	            y: now.seconds,
	            dial: {
	                radius: '100%',
	                baseWidth: 1,
	                rearLength: '20%'
	            }
	        }],
	        animation: false,
	        dataLabels: {
	            enabled: false
	        }
	    }]
	}, 
	                                 
	// Move
	function (chart) {
	    setInterval(function () {
	        var hour = chart.get('hour'),
	            minute = chart.get('minute'),
	            second = chart.get('second'),
	            now = getNow(),
	            // run animation unless we're wrapping around from 59 to 0
	            animation = now.seconds == 0 ? 
	                false : 
	                {
	                    easing: 'easeOutElastic'
	                };
	                
	        // Cache the tooltip text
	        chart.tooltipText = 
				pad(Math.floor(now.hours), 2) + ':' + 
	    		pad(Math.floor(now.minutes * 5), 2) + ':' + 
	    		pad(now.seconds * 5, 2);
	        
	        hour.update(now.hours, true, animation);
	        minute.update(now.minutes, true, animation);
	        second.update(now.seconds, true, animation);
	        
	    }, 1000);
	
	});
});

// Extend jQuery with some easing (copied from jQuery UI)
$.extend($.easing, {
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	}
});

</script>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <!-- Script แสดงวันเวลา --> 
    <script type="text/javascript" >
        function date_time(id) {
            date = new Date;
            year = date.getFullYear();
            month = date.getMonth();
            months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dev');
            d = date.getDate();
            day = date.getDay();
            days = new Array('sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
            h = date.getHours();
            if (h < 10) {
                h = "0" + h;
            }
            m = date.getMinutes();
            if (m < 10) {
                m = "0" + m;
            }
            s = date.getSeconds();
            if (s < 10) {
                s = "0" + s;
            }
            result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
            document.getElementById(id).innerHTML = result;
            setTimeout('date_time("' + id + '");', '1000');
            return true;
        }
      
    </script> 

    <SCRIPT TYPE="text/javascript"> function popup(mylink, windowname) { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); return false; } </SCRIPT>


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</head>

<!-- เปิดส่วนแสดงเนื้อหา Body -->
<body class="hold-transition skin-blue sidebar-mini">
    <div id="wrapper">
<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kthai</b>Technology</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($_SESSION['APIUser']); ?><?php echo ($_SESSION['EmpUser']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo ($_SESSION['APIUser']); ?><?php echo ($_SESSION['EmpUser']); ?> - Kthai Technology 
                  <small>korn Devaloper</small>
                  <small>By www.k-thai.net</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" target="_blank" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
  <!-- เปิดส่วนแสดง เมนูบาร์ทางด้านซ้ายของเว็บ -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($_SESSION['APIUser']); ?><?php echo ($_SESSION['EmpUser']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- เปิดส่วนค้นหาข้อมูล  search form -->
            <form action="search_user1.php" target="blank" method="get" class="sidebar-form">
                          <div class="input-group">
                                  <input type="text" name="user_id" class="form-control" placeholder="ค้นหาด้วย ชื่อผู้ใช้">
                                            <span class="input-group-btn">

                                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                            </span>
                          </div>
            </form>
      <!-- /.search form -->
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="label label-primary pull-right"></span>      <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>

  
        </li>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- ส่วนเปิด แสดงรายการ ตรงเมนูบาร์ -->
 		<li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Hotspot </span>
            <span class="label label-primary pull-right"></span>    <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>
          <ul class="treeview-menu">
          	<li>
				<a href="index.php?opt=useronline"><i class="fa fa-circle-o"></i> User Online</a>
			</li>
          	<li>
            	<a href="index.php?opt=userall"><i class="fa fa-circle-o"></i> View ALL User</a>
            </li>
            <li>
            	<a href="index.php?opt=profile"><i class="fa fa-circle-o"></i> View ALL Profile</a>
            </li>
            <li>
            	<a href="#"><i class="fa fa-circle-o"></i> Add User</a>
            	<ul class="treeview-menu">
					 <li><a href="index.php?opt=add_user"><i class="fa fa-circle-o"></i> Add User </a></li>
           			 <li><a href="index.php?opt=add_genuser"><i class="fa fa-circle-o"></i> Add User group 0-9 </a></li>
           			 <li><a href="index.php?opt=add_genuser2"><i class="fa fa-circle-o"></i> Add User group a-z</a></li>
           			 <li><a href="index.php?opt=import_csv"><i class="fa fa-circle-o"></i> Import Accout CSV</a></li>
				</ul>
            </li>
            <li>
            	<a href="index.php?opt=hotspot_bypass_web"><i class="fa fa-circle-o"></i> Bypass</a>
            </li>
			<li>
				<a href="view_total_hotspot.php" target="blank"><i class="fa fa-circle-o"></i> Print Card Hotspot</a>
			</li>

          </ul>
        </li>

 		<li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>PPPoe </span>
            <span class="label label-primary pull-right"></span>    <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>
          <ul class="treeview-menu">
          	<li>
				<a href="index.php?opt=pppoeonline"><i class="fa fa-circle-o"></i> Secret Online</a>
			</li>
          	<li>
            	<a href="index.php?opt=pppoe_list"><i class="fa fa-circle-o"></i> View ALL Secret</a>
            </li>
            <li>
            	<a href="index.php?opt=profile_pppoe"><i class="fa fa-circle-o"></i> View ALL Profile</a>
            </li>
            <li>
            	<a href="#"><i class="fa fa-circle-o"></i> Add Secret </a>
            	<ul class="treeview-menu">
					 <li><a href="index.php?opt=add_pppoe"><i class="fa fa-circle-o"></i> Add Secret </a></li>
           			 <li><a href="index.php?opt=add_genppoe"><i class="fa fa-circle-o"></i> Add Secret Group 0-9 </a></li>
           			 <li><a href="index.php?opt=add_genpppoe"><i class="fa fa-circle-o"></i> Add Secret Group a-z</a></li>
           			 <li><a href="index.php?opt=import_csv_pppoe"><i class="fa fa-circle-o"></i> Import Accout CSV</a></li>
				</ul>
            </li>
			<li>
				<a href="view_total_ppoe.php" traget="blank"><i class="fa fa-circle-o"></i> Print Card PPP</a>
			</li>

          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i>
            <span>IP</span>
            <span class="label label-primary pull-right"></span>    <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>
          <ul class="treeview-menu">
            
            <li>
            	<a href="index.php?opt=pool"><i class="fa fa-circle-o"></i> Pool </a>
            </li>
            <li>
            	<a href="index.php?opt=add_address_list"><i class="fa fa-circle-o"></i> Addresses</a>
            </li>
            <li>
            	<a href="index.php?opt=dhcp"><i class="fa fa-circle-o"></i> DHCP Server</a>
            </li>
			<li>
				<a href="#"><i class="fa fa-circle-o"></i> Routes</a>
			</li>

          </ul>
        </li>
       
       	<li class="treeview">
            	<a href="#">
            	<i class="fa fa-unlink"></i>
            	<span>Firewall</span>
            	<ul class="treeview-menu">
					 <li><a href="index.php?opt=firewall_info"><i class="fa fa-circle-o"></i> Info Firewall </a></li>
           			 
				</ul>
            </li>


       	<li class="treeview">
          <a href="index.php?opt=interface">
            <i class="fa fa-exchange"></i>
            <span>Interface</span>
           <span class="label label-primary pull-right"></span>  <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>
        

        <li class="treeview">
          		<a href="index.php?opt=reportusertotal">
            		<i class="fa fa-bar-chart"></i>
            		<span>Report</span>
           			<span class="label label-primary pull-right"></span>   <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          		</a>

        </li>
        <li class="treeview">
          		<a href="index.php?opt=ap_online">
            		<i class="fa fa-random"></i>
            		<span>Device Connect</span>
           			<span class="label label-primary pull-right"></span>   <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          		</a>

        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>System</span>
            <span class="label label-primary pull-right"></span>    <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>
          <ul class="treeview-menu">
            
            <li>
            	<a href="index.php?opt=resources"><i class="fa fa-circle-o"></i> Resources </a>
            </li>
            <li>
            	<a href="index.php?opt=truemoney"><i class="fa fa-circle-o"></i> Users</a>
            </li>
            <li>
            	<a href="#"><i class="fa fa-circle-o"></i> Reboot</a>
            </li>
			<li>
				<a href="#"><i class="fa fa-circle-o"></i> Shutdown</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-circle-o"></i> Identity</a>
			</li>

          </ul>
        </li>

        <li class="treeview">
          		<a href="index.php?opt=view_developer">
            		<i class="fa fa-windows"></i>
            		<span>ทีมงานผุ้พัฒนา</span>
           			<span class="label label-primary pull-right"></span>   <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          		</a>
				
		<li class="treeview">
          		<a href="index.php?opt=truemoney">
            		<i class="fa fa-windows"></i>
            		<span>True Money</span>
           			<span class="label label-primary pull-right"></span>   <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          		</a>		


        <li class="treeview">
          <a href="logoff.php">
            <i class="glyphicon glyphicon-log-out"></i>
            <span>Back To Site </span>
           <span class="label label-primary pull-right"></span>     <!--  คำสั่ง แสดงตัวเลข มุมขวา ของลิ้ง  -->
          </a>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- ปิดส่วนแสดง เมนูบาร์ ทางด้านซ้ายของเว็บไซต์  -->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <!--เปิดส่วน คำสั่งตรวจสอบ การเชื่อมต่อกับ เราเตอร์  -->        
                      <? if(!isset($_REQUEST['opt'])) { ?>
                      <!-- Page Content -->
                      <?php
						include('../config/routeros_api.class.php');	
						include("conn.php");
						$ARRAY = $API->comm("/system/resource/print");
						$ram =	$ARRAY['0']['free-memory']/1048576;
						$hdd =	$ARRAY['0']['free-hdd-space']/1048576;	
							?>
                  <!--ปิดส่วน คำสั่งตรวจสอบ การเชื่อมต่อกับ เราเตอร์  -->

    <div class="content-wrapper">
		<section class="content-header">
		      <h1>
		        โปรแกรมบริหารจัดการอินเตอร์เน็ต
		        <small><?php echo " ".$ARRAY['0']['board-name'].""; ?> <?php echo "version ".$ARRAY['0']['version'].""; ?></small>
		      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
	        <li class="active">Dashboard</li>
	      </ol>
    	</section>

<!-- เปิดส่วนแสดงเนื้อหา ตรงกลางเว็บไซต์  -->
	<section class="content">
	<!-- Small boxes (Stat box) -->
	<!-- ส่วนเปิด แสดงแถบ 4 สี สถานะของ เราเตอร์ -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo " ".$ARRAY['0']['cpu-load']."%"; ?></h3>

              <p>CPU Traffic</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-dashboard"></i>
            </div>
            <a href="#" class="small-box-footer">
              สถานะ CPU <i class="fa fa-rocket"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo " ".round($ram,1)."MB"; ?><sup style="font-size: 20px"></sup></h3>

              <p>Free-memory</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              สถานะหน่วยความจำ <i class="fa fa-rocket"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php $ARRAY = $API->comm("/ip/hotspot/active/print", array(
    "count-only"=> "",
    "~active-address" => "1.1.",
));
echo($ARRAY);?></h3>

              <p>User Online</p>
            </div>
            <a href="javascript:popup('index.php?opt=useronline')">
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            </a>
            <a href="index.php?opt=userall" target="_blank" class="small-box-footer">
              All    <?php $ARRAY = $API->comm("/ip/hotspot/user/print", array(
												"count-only"=> "",
												"~active-address" => "1.1.",
											));
											print_r($ARRAY)?>    User    <i class="fa fa-rocket"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo "  ".round($hdd,1)."MB"; ?></h3>

              <p>Free-HDD</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
             สถานะฮาร์ดดิส <i class="fa fa-rocket"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
  <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->                                     
                                            
		<div class="row">
                                <!-- เปิดส่วน กรอปตารางแสดงความเร็วอินเตอร์เน็ต  -->
                                      <div class="col-md-8">
                                              <div class="box box-danger  box-solid">
                                                        <div class="box-header with-border">
                                                                  <i class="fa fa-wrench"></i>
                                                                  <h3 class="box-title">Morniter Traffic</h3>
                                                            <div class="box-tools pull-right">
                                                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> </button>
                                                            </div>
                                                          <!-- /.box-tools -->
                                                        </div>
                                                <!-- /.box-header -->
                            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                                  <!-- เปิดส่วน ตารางกราฟ -->  
                                                <div class="box-body">
                                                                      <div class="box-body">

														                      <div class="col-md-12">
																					<div class="chart">
																						<div id="container" style="height: 400px; width: 800px;"></div>
															                  		</div>
															  
																							<select  name="interface"  id="interface">
															                                            	<?php
																												$ARRAY = $API->comm("/interface/print");
																												$num =count($ARRAY);
																												for($i=0; $i<$num; $i++){
																													$seleceted = ($i == 0) ? 'selected="selected"' : '';
																													echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
																												}
																											?>
															                                </select>
																									
															                	</div>                                                            <!-- Info Boxes Style 2 -->
																          


														          <!-- /.info-box -->
                                                                      </div>            <!-- /.box-body -->

                                                           <!-- ปิดส่วน แสดงแถบไอคอน Appication -->                                        


                                                </div>                                          <!-- /.box-body -->
                          <!-- ปิดส่วน แสดงแถบไอคอน Appication -->  
                                              </div>                                        <!-- /.box -->
                                      </div>
        <!-- ปิดส่วน แสดงแถบกราฟ -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                      <!-- เปิดส่วน แสดงแถบด้านขวาของจอแสดงสถานะ -->
                                      <div class="col-md-4">
                                                   <!-- Info Boxes Style 2 -->
											<div class="info-box bg-yellow">
												<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
										            <div class="info-box-content">
														<span class="info-box-text">Location site</span>
														<span class="info-box-number"><?php echo "<td>".$result['mt_name']."</td>";?></span>
															<div class="progress">
																<div class="progress-bar" style="width: 100%"></div>
															</div>
																<span class="progress-description">
																	<?php echo "<td>".$result['mt_location']."</td>";?>
																</span>
													</div>
																            <!-- /.info-box-content -->
											</div>
														          <!-- /.info-box -->
											<div class="info-box bg-green">
												<span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">Hotspot ALL Users</span>
														<span class="info-box-number">
															<?php $ARRAY = $API->comm("/ip/hotspot/user/print", array(
																			"count-only"=> "",
																			"~active-address" => "1.1.",
																		));
																			print_r($ARRAY)?> คน</span>
														<div class="progress">
														    <div class="progress-bar" style="width: 100%"></div>
														</div>
														    <span class="progress-description">กลุ่มผู้ใช้งาน   
														        <?php $ARRAY = $API->comm("/ip/hotspot/user/profile/print", array(
																				"count-only"=> "",
																				"~active-address" => "1.1.",
																			));
																				print_r($ARRAY)?>    กลุ่ม
														    </span>

													</div>
														            <!-- /.info-box-content -->
											</div>
														          <!-- /.info-box -->
											<div class="info-box bg-red">
												<span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">PPPOE ALL User</span>
														<span class="info-box-number"><?php $ARRAY = $API->comm("/ppp/secret/print", array(
																								"count-only"=> "",
																								"~active-address" => "1.1.",
																							));
																								print_r($ARRAY)?> คน</span>
														<div class="progress">
															<div class="progress-bar" style="width: 70%"></div>
														</div>
														<span class="progress-description">โปรไฟล์  
																<?php $ARRAY = $API->comm("/ppp/profile/print", array(
																						"count-only"=> "",
																						"~active-address" => "1.1.",
																					));
																						print_r($ARRAY)?> Profile
														</span>
													</div>
														            
											</div>
														          <!-- /.info-box -->
											<div class="info-box bg-aqua">
												<span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
													<div class="info-box-content">
														<span class="info-box-text">วันเวลาใช้งาน</span>
														<span class="info-box-number"><!-- แสดงวันเวลา -->
														<span id="date_time" style="color: #ffffff; font-size: 8;"></span>
														    <script type="text/javascript"> window.onload = date_time('date_time');</script></span>
														        <div class="progress">
														            <div class="progress-bar" style="width: 100%"></div>
														        </div>
														        <span class="progress-description">
														            <?php $resource = $API->comm("/system/resource/print");  ?>
														            Mikrotik Uptime : <?=$resource[0]['uptime']?>
														        </span>
													</div>
											<!-- /.info-box-content -->
											</div>
									<!-- /.info-box -->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <!-- ปิดส่วน แสดงแถบไอคอน Appication -->                                        
											<div class="box box-info collapsed-box  box-solid">
                                                <div class="box-header with-border">
                                                    <i class="fa fa-wrench"></i>
                                                        <h3 class="box-title">Fast Control</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> </button>
                                                    </div>
                                                </div>
                                  
										<?php
										    include_once('../phpqrcode/qrlib.php');
											include_once('../config/routeros_api.class.php');			
											include_once('conn.php');	
										    include_once("../include/class.mysqldb.php");


										      $mikrotik_ip = $ip;  
										      $mikrotik_username = $user;  
										      $mikrotik_password =$pass;
										      $ARRAY = $API->comm("/ip/hotspot/user/profile/print");
											  $ARRAY = $API->comm("/ip/hotspot/user/print");
										      $ARRAY1 = $API->comm("/ip/hotspot/user/profile/print"); 
										 	  $ARRAY2 = $API->comm("/ip/hotspot/user/profile/print");
										 	  $ARRAY3 = $API->comm("/ppp/profile/print");
										      $mikrotik_ip = $ip;  
										      $mikrotik_username = $user;  
										      $mikrotik_password =$pass;                                                                                                                      
										      $ARRAY4 = $API->comm("/ppp/profile/print");	
														   								
										?>
                                                <div class="box-body">
                                                    <div class="box-body">
                                                    					<a href="#" class="btn btn-app" data-toggle="modal" data-target="#add_user" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานอินเตอร์เน็ต">
                                                                          <i class="fa fa-user-plus"></i> Add User Hotspot
                                                                        </a>
                                                                        <a href="#" class="btn btn-app" data-toggle="modal" data-target="#add_secret" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานอินเตอร์เน็ต">
                                                                          <i class="fa fa-user-plus"></i> Add User Pppoe
                                                                        </a>
														         		<a href="#" class="btn btn-app" data-toggle="modal" data-target="#add_l7" data-toggle="tooltip" data-placement="top" title="เพิ่ม Layer7">
                                                                          <i class="fa fa-edit"></i> Add Layer7 
                                                                        </a>
                                                                        <form name="export" action="con_export_user_hotspot.php" method="post">
                                                                        	<input class="btn btn-app" type="submit" name="export" class="btn btn-success" value="Export User Hotspot" data-toggle="tooltip" data-placement="top" title="สำรองข้อมูลผู้ใช้งานจากระบบ Hotspot" />
                                                                        </form>
                                                                        </a>
                                                                        <form name="export" action="con_export_user_pppoe.php" method="post">
                                                                        	<input class="btn btn-app" type="submit" name="export" class="btn btn-success" value="Export User PPPoe" data-toggle="tooltip" data-placement="top" title="สำรองข้อมูลผู้ใช้งานจากระบบ PPPoe" />
                                                                        </form>
                                                    </div>            
                                                 </div>                              
                                            </div> <!-- ปิดส่วน แสดงแถบไอคอน Appication -->                         
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <!-- ปิดส่วน แสดงแถบไอคอน Appication -->                                        
											<div class="box box-success collapsed-box  box-solid">
                                                <div class="box-header with-border">
                                                    <i class="fa fa-wrench"></i>
                                                        <h3 class="box-title">Mikrotik Infomation</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> </button>
                                                    </div>
                                                </div>
                                                <?php
		
													include_once('../config/routeros_api.class.php');			
													include_once('conn.php');	

													$ARRAY5 = $API->comm("/interface/print");			
													$resource = $API->comm("/system/resource/print");
										      		$health = $API->comm("/system/health/print");
												      include("../include/config.inc.php"); 			
												      $count_up = count($up);
												      $up = $API->comm("/ip/hotspot/user/profile/print");
												      $free_ram =  $resource['0']['free-memory']/1048576;
												      $total_ram =  $resource['0']['total-memory']/1048576;
												      $free_hdd =  $resource['0']['free-hdd-space']/1048576;
												      $total_hdd =  $resource['0']['total-hdd-space']/1048576;	 
												?>
                                                <div class="box-body">
                                                    <div class="box-body">
                                                    	  <div class="row">
						                                  		<div class="col-xs-6">Uptime ระยะเวลาใช้งาน  </div>
						                                  			<div class="col-xs-6">
						                                       		<div class="text-temp"><?=$resource[0]['uptime']?> </div>
						                                  		</div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">ชื่ออุปกรณ์ </div>
								                                  <div class="col-xs-6">
								                                       <div class="text-temp"><?=$resource[0]['platform']?> </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">รุ่น</div>
								                                  <div class="col-xs-6">
								                                       <div class="text-temp"><?=$resource[0]['board-name']?> </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Version  </div>
								                                  <div class="col-xs-6">
								                                       <div class="text-temp"><?=$resource[0]['version']?> </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">รุ่น CPU  </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"> <?=$resource[0]['cpu']?> </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">CPU Count </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"> <?=$resource[0]['cpu-count']?> Core </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">CPU Frequency </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"> <?=$resource[0]['cpu-frequency']?> MHz </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">CPU Load </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"> <?=$resource[0]['cpu-load']?> % </div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Free Memory </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"><?php echo " ".round($free_ram,1)."MB"; ?></div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Total Memory </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"><?php echo " ".round($total_ram,1)."MB"; ?></div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Free HDD Space </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"><?php echo " ".round($free_hdd,1)."MB"; ?></div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Total HDD Size </div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"><?php echo " ".round($total_hdd,1)."MB"; ?></div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Architecture Name</div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"><?=$resource[0]['architecture-name']?></div>
								                                  </div>
								                          </div>
								                          <div class="row">
								                                  <div class="col-xs-6">Build Time</div>
								                                  <div class="col-xs-6">
								                                      <div class="text-temp"><?=$resource[0]['build-time']?></div>
								                                  </div>
								                          </div>				
                                                    </div>            
                                                 </div>                              
                                            </div> <!-- ปิดส่วน แสดงแถบไอคอน Appication -->                         
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                                      </div>
                            <!-- ปิดส่วน แสดงแถบด้านขวาของจอแสดงสถานะ -->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                      
		</div>

   </section>
 


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->     
<!-- แถบ 4 สีด้านล่าง -->
<section class="content">
     <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text" >IP ROUTER</span>
              <span class="info-box-number" >
              		<?php echo $result['mt_ip'];?></span>
            </div>
          </div>
        </div>

       <a href="javascript:popup('index.php?opt=dhcp')">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-arrow-graph-up-right"></i></span>
       </a>
            <div class="info-box-content">
              <span class="info-box-text">DHCP LEASE</span>
              <span class="info-box-number">
              		<?php $ARRAY = $API->comm("/ip/dhcp-server/lease/print", array(
								"count-only"=> "",
								"~active-address" => "1.1.",
							));
								print_r($ARRAY)?></span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>
        <a href="javascript:popup('index.php?opt=interface')">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-archive"></i></span>
        </a>
            <div class="info-box-content">
              <span class="info-box-text">INTERFACE</span>
              	<span class="info-box-number">
              		<?php $ARRAY = $API->comm("/interface/print", array(
							"count-only"=> "",
						));
							echo($ARRAY)?>
				</span></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">ADMIN WINBOX</span>
              <span class="info-box-number"><?php echo $result['mt_user'];?></span>
            </div>
          </div>
        </div>
	</div>

</div>
    <!--++++++++++++++++++++++++++++++++++ ปิดส่วนแสดงแถบ 4 สีด้านล่าง +++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</section> 

</div>

<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User </h4>
              </div>
              <div class="modal-body">
                <form id="add_user" action="con_adduser.php" method="post">
                              <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="กรุณากรอกชื่อผู้ใช้งานเป็นภาษาอังกฤษเท่านั้น" class="form-control" required>
                                    </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Password&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><strong>Profile&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile" data-toggle="tooltip" data-placement="top" title="กรุณาเลือกกลุ่มผู้ใช้งานอินเตอร์เน็ต">
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
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
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

        <!-- Modal -->
        <div class="modal fade" id="add_secret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Secret </h4>
              </div>
              <div class="modal-body">
                <form id="add_secret" action="con_addpppoe.php" method="post">
                              <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="ตั้งชื่อเป็นภาษาอังกฤษเท่านั้น" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Password&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile">
                                                <?php
                                                    $num =count($ARRAY3);
                                                    for($i=0; $i<$num; $i++){
                                                        $seleceted = ($i == 0) ? 'selected="selected"' : '';
                                                        echo '<option value="'.$ARRAY3[$i]['name'].$selected.'">'.$ARRAY3[$i]['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Service&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="service" size="1" id="profile">
                                              <option value="any">Any</option>
                                              <option value="pppoe">PPPoe</option>
                                              <option value="pptp">PPTP</option>
                                              <option value="l2tp">L2TP</option>
                                              <option value="async">ASYNC</option>
                                              <option value="ovpn">Ovpn</option>
                                              <option value="sstp">SSTP</option>
                                            </select>
                                        </div>  
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="status" placeholder="หมายเหตุ" class="form-control" required>
                                    </div>                                                                              
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;  
                                        <button id="btnReset" class="btn btn-warning" type="reset"><i class="fa fa-undo"></i>&nbsp;Reset&nbsp;</button> &nbsp;&nbsp;&nbsp;                                     
                                        <button id="btnCancel" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button>
                                    </div>
                </form>
               </div>
             </div>
            </div>
          </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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
<!--********************************************************************************************************-->
        <!-- Modal -->
        <div class="modal fade" id="search_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Search User </h4>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                
                                    <thead>
                                     <!-- ส่วนเปิด ปุ่ม เพิ่ม ลบ User -->
                                        <tr>
                                          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add_user" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-user-plus"></i>&nbsp;Add User&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <button id="btnSave" class="btn btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="ลบผู้ใช้งานอินเตอร์เน็ต"><i class="fa fa-trash-o"></i>&nbsp;Delete&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#import_user" data-toggle="tooltip" data-placement="top" title="เพิ่มผู้ใช้งานจำนวนมาก"><i class="fa fa-user-plus"></i>&nbsp;Import User&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input type="submit" name="export" class="btn btn-success" value="Export User" data-toggle="tooltip" data-placement="top" title="สำรองข้อมูลผู้ใช้งานจากระบบ" />
                                        </tr>
                                      <!-- ส่วนปิด ปุ่ม เพิ่ม ลบ User -->
                                        <br>
                                        <br>

                                         <!-- ส่วนเปิด หัวข้อแสดงตาราง -->
                                        <tr>
                                            
                                            <th width="10%">&nbsp;&nbsp;ทั้งหมด&nbsp;&nbsp;<input type="checkbox" id="selecctall"/></th>
                                            <th>No.</th>  
                                            <th>ชื่อ</th>   
                                            <th>รหัสผ่าน</th>
                                            <th>กลุ่มผู้ใช้งาน</th>
                                            <th>Comment</th>
                                            <th>แก้ไข / พิมพ์</th>
                                        </tr>
                                         <!-- ส่วนปิด หัวข้อแสดงตาราง -->
                                    </thead>
                        <tbody>
                        <?php
                                $hostname = "localhost";
                                $username = "root";
                                $password = "20062521";
                                $dbName = "api3";
                                $connect = mysqli_connect($hostname,$username,$password,$dbName);
                          $user = $_GET['user_id'];
                          $sql = "SELECT * FROM  mt_gen  WHERE  user  LIKE  '%$user%'   ORDER BY   `user`  ASC"; 
                          //$query=mysql_query("SELECT * FROM mt_gen WHERE  user  LIKE  '%$user%'   ORDER BY   `user`  ASC");
                          $query=mysqli_query($connect, $sql);
                          $i=0;
                          while($result=mysqli_fetch_array($query)){
                            $i++;
                          echo "<tr>";
                            //echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$result['user']."></center></td>";
                            echo "<td>".$i."</td>";  
                            echo "<td>".$result['user']."</td>"; 
                            echo "<td>".$result['pass']."</td>";             
                            echo "<td>".$result['profile']."</td>";
                            echo "<td>".$result['status']."</td>";
                            
                                           
                          //  ส่วนเปิด ตรงปุ่มแก้ไข พิมพ์ ลบ
                                                        echo "<td>
                                                            <a href='index.php?opt=edit_user&id=".$result['user']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-edit\"></i></button></a>
                                                            <a href='print.php?user&id=".$result['user']."' target='_blank'><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-print\"></i></button></a>
                                                           
                                                            

                                                            </td>";
                           //  ส่วนปิด ตรงปุ่มแก้ไข พิมพ์ ลบ                                  
                          // echo "<a href='index.php?opt=user&id=".$result['date']."' title='view'><img src='../img/search.png' width=20px></a>";
                          // echo "&nbsp;<a href='print.php?id=".$result['date']."' title='Print' target='_blank'><img src='../img/print.png' width=20px></a></td>";                           
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
     
<footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Desing By</b> Kthai Technology
        </div>
    <strong>Copyright &copy; 2017 - <?php echo date("Y");?> <a href="#">www.kthai.net</a>.</strong> All rights
  </footer>
    <!-- /#wrapper -->
		 <?php
				 } else { 
            		include($_REQUEST['opt'] . ".php"); 
                 } 
          ?>


<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->

<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
   <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="../dist/js/demo.js"></script>	
<!-- AdminLTE for demo purposes -->

    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
 <script type="text/javascript" src="../highchart/js/highcharts.js"></script>
   <script type="text/javascript" src="../highchart/js/highcharts-more.js"></script>
<script type="text/javascript" src="../highchart/js/modules/exporting.js"></script>
<script src="../../dist/js/app.min.js"></script>

</body>

</html>

