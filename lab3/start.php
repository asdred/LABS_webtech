<?php 

session_start();

$ip = $_SERVER['REMOTE_ADDR']; 
$agent = $_SERVER['HTTP_USER_AGENT'];
$special_key = "333555777";

$_SESSION['token'] = md5($ip . $agent . $special_key);
//echo $ip . "<br>" . $agent . "<br>" . $special_key . "<br>" . $_SESSION['token'];

?>