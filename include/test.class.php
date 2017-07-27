<?php
	//require( "include/config.inc.php");
	class Myclass 
    {
        var $link;
        var $result;
        var $query;
         public function connect($config) {
            $query = 'Test call function'; 
            return  $query;
         }
    }
?>
