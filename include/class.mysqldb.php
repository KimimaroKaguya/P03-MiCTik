<?php
	# configuration for database		
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'apt');
	define('DB_PASSWORD', 'apt1234');
	define('DB_DATABASE', 'api3');
	class mysqldb {
			var $link;
			var $result;
			var $query;
					
		public function connect($config) {
			// $this->link = mysqli_connect($config['hostname'], $config['username'], $config['password']);
			// if($this->link) {
			// 	mysqli_query($this->link,"SET NAMES 'utf-8'");
			// 	return true;
			// }
			// $this->show_error(mysqli_error($this->link), "connect()");
			// return false;
			# 20170728 New connect the database server
			$this->link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($this->link) {
				mysqli_query($this->link,"SET NAMES 'utf-8'");
				return true;
			}
			// $this->show_error(mysqli_error($this->link), "connect() : con");
			return false;
		}
		public function selectdb($database) {
			if($this->link) {
				mysqli_select_db( $this->link,$database);
				return true;
			}
			$this->show_error("Not connect the database before", "selectdb($database)");
			return false;
		}
		public function query($sql) {				
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);					
			if($this->link) {	
				$this->query = mysqli_query($this->link,$sql);
				return $this->query;
			}		
		}
		public function fetch($query) {			
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if ($results = mysqli_query($this->link, $query)) {
				/* fetch associative array */
				return $result = $results->fetch_object();				
			}
		}
		public  function fetch_array2($query)
		{
			$this->link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($results = mysqli_query($this->link,$query)){
				//return $result = mysqli_fetch_array($results);
				return $result = mysqli_fetch_assoc($results);
				
			}
		}
		public function num_rows($query) {		
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($this->link) {
				$results = mysqli_query($this->link,$query);
				return  mysqli_num_rows($results);				
			}			
		}
		public function show_error($errmsg, $func) {
			echo "<b><font color=red>" . $func . "</font></b> : " . $errmsg . "<BR>\n";
			exit(1);
		} 
	}

?>