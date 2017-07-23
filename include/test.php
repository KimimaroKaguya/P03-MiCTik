<?php
require_once( "Model/db_config.php");
class CreateBook{
		
		public $db;
		public function __construct(){
			// $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);		
			// if(mysqli_connect_errno()) {	 
			// 	echo "Error: Could not connect to database.";
                        // mysqli_set_charset($this->db, "utf8");	 
			// exit; }
                        $this->db  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			mysqli_set_charset($this->db, "utf8");
			
		}
		       
        public function CreateBook($RoomId,$Title, $Name, $Lastname, $CardId, $Email, $Tel, $Tel2, $Address,$user,$Amount_book,$DateBook)
        {       
                $sql="SELECT Max(Book_No) Book_No FROM booking ;";
		////Check Customer is not in db then insert to the table
		$Max =  $this->db->query($sql) ;
                $count_row = $Max->num_rows;
                if (isset($count_row)){ 
                        $MaxNos = mysqli_fetch_object($Max);
                        $MaxNo = $MaxNos->Book_No + 1;                       
                }else {$MaxNo=1;}  	 
                        $sql = "INSERT INTO booking (Room_Id,Book_No,Title, Name, Last_Name, CardId, Email, Tel, Tel2, Address, Create_By, Create_Date, Update_By, Update_Date,Book_Amount,Status_Book,Book_Date) 
                        VALUES ('$RoomId','$MaxNo','$Title','$Name','$Lastname','$CardId','$Email','$Tel','$Tel2','$Address','$user',NOW(),'$user',NOW(),'$Amount_book','0',STR_TO_DATE('$DateBook 01:00:00 AM', '%d/%m/%Y %r') )";
                        $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                        if ($result)
                        { 
                           $sql = "UPDATE room set Book_Id = (Select Id From booking Where Delete_By IS NULL ORDER BY Id DESC LIMIT 1 ) Where Id ='$RoomId' ";
                           $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                        if ($result)
                                { return $result;}else{return false;} 
                        }
                        else{return false;} 
                        ///return $sql;  
               mysqli_close($this->db); 
        }
        //Process Update booking
         public function BookUpdate($Idb,$RoomId,$Title, $Name, $Lastname, $CardId, $Email, $Tel, $Tel2, $Address,$user,$Amount_book,$DateBook)
        {  
          $sql = "UPDATE booking Set Room_Id='$RoomId',Title='$Title',Name='$Name',Last_Name='$Lastname',CardId='$CardId',Email='$Email',Tel='$Tel',Tel2='$Tel2',Address='$Address',Update_By='$user', Update_Date=NOW(),Book_Amount='$Amount_book',Book_Date=STR_TO_DATE('$DateBook 01:00:00 AM', '%d/%m/%Y %r') Where Id ='$Idb';";
         $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
         //return  $sql;
         if ($result){return $result;}else{return false;}
          mysqli_close($this->db); 
        }
        //Process Del
        public function BookDel($Idb,$RoomId,$user)
        {  
           $sql = "UPDATE booking Set Delete_By='$user',Delete_Date=NOW(),Update_By='$user', Update_Date=NOW() Where Id ='$Idb';";
           $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
           
           if ($result){
                   $sql = "UPDATE room Set Book_Id = null Where Id ='$RoomId';";
                   $result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted"); 
                    if ($result){ return $result;}else{return false;}}else{return false;}
           mysqli_close($this->db); 
        }
        //Get data on booking where id
         public function GetBooking($Idb)
        {       
                $sql="SELECT * FROM booking Where Id='$Idb' ;";		
		$Query =  $this->db->query($sql) ;
                $count_row = $Query->num_rows;
                if (isset($count_row)){                         
                     return mysqli_fetch_object($Query);
                }
                else{return false;}   
               mysqli_close($this->db); 
        }
       
}
?>