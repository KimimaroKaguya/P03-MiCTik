<?php
	class mysqldb {
			var $link;
			var $result;
			var $query;
		function connect($config) {
			$this->link = mysqli_connect($config['hostname'], $config['username'], $config['password']);
			if($this->link) {
				//mysqli_query("SET NAMES 'utf-8'");
				return true;
			}
			$this->show_error(mysqli_error($this->link), "connect()");
			return false;
		}
		function selectdb($database) {
			if($this->link) {
				mysqli_select_db( $this->link,$database);
				return true;
			}
			$this->show_error("Not connect the database before", "selectdb($database)");
			return false;
		}
		function query($sql) {
			if($this->link) {				
				$this->query = mysqli_query($this->link,$sql);
				return $this->query;
			}
			return 'dgdgdggd';			
			
		}
		function fetch() {
			if($this->link) {
				$result = mysqli_fetch_object($this->link,$this->query);
				return $result;
			}
			if (mysqli_connect_errno()) {
			return "Connect failed:";}
		}
		function num_rows() {
			if($this->link) {
				return mysqli_num_rows($this->link,$this->query); 
			}
			if (mysqli_connect_errno()) {
			return "Connect failed:";}
		}
		function show_error($errmsg, $func) {
			echo "<b><font color=red>" . $func . "</font></b> : " . $errmsg . "<BR>\n";
			exit(1);
		} 
	}

?>
