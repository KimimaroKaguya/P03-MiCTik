<?php
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

			# configuration for database		
			define('DB_SERVER', 'localhost');
			define('DB_USERNAME', 'apt');
			define('DB_PASSWORD', 'apt1234');
			define('DB_DATABASE', 'api3');
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($this->link) {
				mysqli_query($this->link,"SET NAMES 'utf-8'");
				return true;
			}
			$this->show_error(mysqli_error($this->link), "connect() : con");
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
			# configuration for database		
			// define('DB_SERVER', 'localhost');
			// define('DB_USERNAME', 'apt');
			// define('DB_PASSWORD', 'apt1234');
			// define('DB_DATABASE', 'api3');
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($this->link) {
				mysqli_query($this->link,"SET NAMES 'utf-8'");
				return true;
			}
			$this->show_error(mysqli_error($this->link), "connect()");			
			if($this->link) {	
				$this->query = mysqli_query($this->link,$sql);
				return $this->query;
			}		
		}
		public function fetch($query) {
			# configuration for database		
			// define('DB_SERVER', 'localhost');
			// define('DB_USERNAME', 'apt');
			// define('DB_PASSWORD', 'apt1234');
			// define('DB_DATABASE', 'api3');
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if ($results = mysqli_query($this->link, $query)) {
				/* fetch associative array */
				return $result = mysqli_fetch_object($results);				
			}
		}
		public  function fetch_array($query)
		{
			$this->link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($results = mysqli_query($this->link,$query)){
				return $result = mysqli_fetch_array($results);
			}
		}
		public function num_rows() {
			# configuration for database		
			// define('DB_SERVER', 'localhost');
			// define('DB_USERNAME', 'apt');
			// define('DB_PASSWORD', 'apt1234');
			// define('DB_DATABASE', 'api3');
			# connect the database server
			$this->link  = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if($this->link) {
				mysqli_query($this->link,"SET NAMES 'utf-8'");
				return true;
			}
			$this->show_error(mysqli_error($this->link), "connect() num_rows Errors");
			return false;
			if($this->link) {
				return mysqli_num_rows($this->link,$this->query); 
			}
			if (mysqli_connect_errno()) {
			return "Connect failed:";}
		}
		public function show_error($errmsg, $func) {
			echo "<b><font color=red>" . $func . "</font></b> : " . $errmsg . "<BR>\n";
			exit(1);
		} 
	}

?>
