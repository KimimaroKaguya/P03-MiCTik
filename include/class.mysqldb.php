<?php
	//error_reporting(0);
	class mysqldb {
			var $link;
			var $result;
		function connect($config) {
			$this->link = mysqli_connect($config['hostname'], $config['username'], $config['password']);
			if($this->link) {
				//mysqli_query("SET NAMES 'utf-8'");
				mysqli_set_charset($this->link, "utf8");
				return true;
			}
			$this->show_error(mysqli_error($this->link), "connect()");
			return false;
		}
		function selectdb($database) {
			if($this->link) {
				mysqli_select_db($this->link,$database['database'] );
				return true;
			}
			$this->show_error("Not connect the database before", "selectdb($database)");
			return false;
		}
		function query($sql) {
			$this->query = mysqli_query($this->link,$sql) or die(mysqli_error($this->link));
			return $this->query;
		}
		function fetch() {
			$result = mysqli_fetch_object($this->link,$this->query);
			return $result;
		}
		function num_rows() {
			return mysqli_num_rows($this->query); 
		}
		function show_error($errmsg, $func) {
			echo "<b><font color=red>" . $func . "</font></b> : " . $errmsg . "<BR>\n";
			exit(1);
		} 
	}

?>
