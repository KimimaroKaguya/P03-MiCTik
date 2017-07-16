<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map API 3 - 01</title>
<style type="text/css">
html { height: 100% }
body { 
    height:100%;
    margin:0;padding:0;
    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
    font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
    width:550px;
    height:400px;
    margin:auto;
/*  margin-top:100px;*/
}
</style>
 
</head>
 
<body>
 
 
        <div id="map_canvas"></div>
 
 
 
 <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">  
  <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">  
    Latitude  
    <input name="lat_value" type="text" id="lat_value" value="0" />  <br />
    Longitude  
    <input name="lon_value" type="text" id="lon_value" value="0" />  <br />
  Zoom  
  <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />  
  <br />
  <input type="submit" name="button" id="button" value="บันทึก" />  
  </form>  
</div> 
   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var image1; // ตัวแปรสำหรับเก็บรูป icons กำหนดเอง  
function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#map_canvas")[0]; 
    // กำหนด Option ของแผนที่
    var myOptions = {
        zoom: 13, // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
    };
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
 
 
 
    // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
    if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
/*              var infowindow = new GGM.InfoWindow({
                    map: map,
                    position: pos,
                    content: "คุณอยู่ที่นี่."
                });*/
                image1 = new GGM.MarkerImage("http://www.ninenik.com/demo/photo_avatar.php",  // url ภาพ ใส่แบบเต็ม หรือแบบ path ก็ได้
                new GGM.Size(50, 60),  //กำหนดความกว้าง สูงของ icons
                new GGM.Point(0,0),  // จุดเริ่มต้นของรูปภาพ ใช้ 0,0
                new GGM.Point(25, 60)  // จุดปลายของพิกัดเทียบกับรูป ปกติ (0,ความสูงของรูป) หรือ (ครึ่งหนึ่งความกว้างของรูป,ความสูงของรูป)
                );              
                var my_Marker = new GGM.Marker({ // สร้างตัว marker  
                        position: pos,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
                        icon: image1,  
                        map: map // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                    });                 
                 
                var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker       
        //      $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
//              $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
//              $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value              
                map.setCenter(pos);
            },function() {
                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
            });
    }else{
         // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
    }
   
    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
    GGM.event.addListener(map, "zoom_changed", function() {
        $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
    });
 
}
/*setTimeout(function(){
    initialize();
},5000);*/
$(function(){
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
    // v=3.2&sensor=false&language=th&callback=initialize
    //  v เวอร์ชัน่ 3.2
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
    //  language ภาษา th ,en เป็นต้น
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
    $("<script/>", {
      "type": "text/javascript",
      src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
    }).appendTo("body");    
});
</script>  
</body>
</html>