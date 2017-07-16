<?php 
//export.php  
$connect = mysqli_connect("localhost", "root", "9i8u7y6t", "api_mikrotik");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM mt_gen_pppoe";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>USER</th>  
                         <th>PASS</th>  
                         <th>STATUS</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["user"].'</td>  
                         <td>'.$row["pass"].'</td>  
                         <td>'.$row["status"].'</td>  
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Export_User_Pppoe.xls');
  echo $output;
 }
}
?>