<?php
	# configuration for database
	$_config['database']['hostname'] = "localhost";
	$_config['database']['username'] = "apt";
	$_config['database']['password'] = "apt1234";
	$_config['database']['database'] = "mikrotik_api";
	
	# connect the database server
	// $link = new mysqldb('localhost','apt','apt1234','mikrotik_api');
	//$link->connect($_config['database']);
	//$link->selectdb($_config['database']);
	// $link->query("SET NAMES 'utf8'");
	
    // $link->connectdb($_config['database']);
    // $link->selectdb($_config['database']);

	@session_start();
?>
