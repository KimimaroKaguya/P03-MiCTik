<?php
	error_reporting(E_ALL);
   
	class mysqldb {
		var $host="localhost";
        var $username="apt";    // specify the sever details for mysql
        var $password = "apt1234";
        var $database="mikrotik_api";
        var $myconn;

    function connect() // create a function for connect database
    {
        $conn= mysqli_connect($this->host,$this->username,$this->password);
        if(!$conn)// testing the connection
        {
            die ("Cannot connect to the database");
        }
        else
        {
            $this->myconn = $conn;
            //echo "Connection established";
        }
        return $this->myconn;
    }
    function selectDatabase() // selecting the database.
    {
        mysqli_select_db($this->database);  //use php inbuild functions for select database
        if(mysqli_error()) // if error occured display the error message
        {
            echo "Cannot find the database ".$this->database;
        }
         echo "Database selected..";       
    }
    // function closeConnection() // close the connection
    // {
    //     mysql_close($this->myconn);

    //     echo "Connection closed";
    // }
    function query($sql) {
        $this->connect();
        $this->query = mysqli_query($this->myconn,$sql);
        return $this->query;
	}
    // function fetch_object($query) {
    //     $this->connect();
	// 	$result = mysqli_fetch_object($this->myconn,$query);
    //     mysqli_free_result($result);
    //     return $result;
	// }
    function fetch() {
        $this->connect();
		$result = mysqli_fetch_object($this->myconn,$this->query);
        // mysqli_free_result($result);
        return 	$result;
	}
    function num_rows() {
			return mysqli_num_rows($this->query); 
	}



   
	}
?>
