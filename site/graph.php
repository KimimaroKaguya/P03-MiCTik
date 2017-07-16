<?php
$url = "http://192.168.16.1/graphs/iface/bridg_hotspot/";   # The page to enter
$ch = curl_init();    
$user = "api"; # login
$pass = "20062521"; #password
curl_setopt($ch, CURLOPT_URL, $url);   
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);   
curl_setopt($ch, CURLOPT_POST, 1);   
curl_setopt($ch, CURLOPT_POSTFIELDS, "process=login&page=start&user=$user&password=$pass");   
curl_setopt($ch, CURLOPT_COOKIEJAR, 'D:/HTTP/graph/cookie.txt');   # local path to save cookies to file 
$result = curl_exec($ch);
$url = "http://192.168.16.1:90/dude/chart.png?page=chart_picture&download=yes&id=$i&num=$n"; #   
id = $i & num = $n is responsible for the identifier and the numbering (hour / day / week / year) 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 0);    
curl_setopt($ch, CURLOPT_COOKIEFILE, 'D:/HTTP/graph/cookie.txt'); # local path to save cookies to file
$result = curl_exec($ch);         
curl_close($ch);      
echo $result;
?>