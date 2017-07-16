<?php
                                ini_set('display_errors', 1);
                                error_reporting(~0);
                                $hostname = "localhost";
                                $username = "root";
                                $password = "9i8u7y6t";
                                $dbName = "nb_school";
                                $conn = mysqli_connect($hostname,$username,$password,$dbName);
                                //$tec_id = $_POST['tec_id'];   //   รับค่าจากตัวแปรที่ส่งมาจากปุ่มแก้ไข เพื่อนำมาเปรียบเทียบข้อมูลใน ตารางข้อมูล
                                //$tec_prefix = $_POST['tec_prefix'];
		       $am_username = $_POST['username'];
		       $am_password = $_POST['password'];
    
                                $sql = "SELECT  *  FROM  tb_data_am  WHERE  am_username = '$am_username' , am_password = '$am_password' ";  //คำสั่งเลือกข้อมูลจากตาราง ด้วย ค่า ที่ส่งมาจาก ปุ่มแก้ไข std_id
                                $query = mysqli_query($conn, $sql);   // ดึงข้อมูลจากตาราง 
                                if  ($query) {  // เงื่อนไข   ถ้า ดึงข้อมูลได้  เป็นจริง  $query  ให้ แสดงข้อความ อัพเดตข้อมูลเรียบร้อย
			echo "<script>alert('อัพเดตข้อมูลเรียบร้อย')</script>";
		        } else {  // เงื่อนไข     ไม่จริงหรือเป็นเท็จ   ให้ แสดงข้อความ ไม่สามารถอัพเดตข้อมูลได้
			echo "<script>alert('ไม่สามารถอัพเดตข้อมูลได้')</script>";
		                   }
		mysqli_close($conn);   // คำสั่ง ปิดการเชื่อมต่อฐานข้อมูล 
		echo "<meta http-equiv='refresh' content='0;url=site/index.php' />";    //  คำสั่ง  ให้ รีเฟรชไปหน้าที่ต้องการ เมื่อ ทำเงื่อนไขด้านบนเสร็จ
		exit();
?>
