<?php
	# configuration for database
	$_config['database']['hostname'] = "localhost";
	$_config['database']['username'] = "apt";
	$_config['database']['password'] = "apt1234";
	$_config['database']['database'] = "api3";
	
	# connect the database server
	$link = new mysqldb();
	$link->connect($_config['database']);
	$link->selectdb($_config['database']['database']);
	//$link->query("SET NAMES 'utf8'");
	//echo 'desfefsf';
	@session_start();
?>
