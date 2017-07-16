<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_database = "localhost";
$database_conn_database = "api3";
$username_conn_database = "root";
$password_conn_database = "20062521";
$conn_database = mysql_pconnect($hostname_conn_database, $username_conn_database, $password_conn_database) or trigger_error(mysql_error(),E_USER_ERROR); 
?>