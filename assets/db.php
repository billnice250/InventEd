<?php
session_start();
$hostname="localhost";
$username="root";  
$password="";      
$database="invented"; 
$con=@mysql_connect($hostname,$username,$password);
if(!$con)
{
die('Connection Failed'.mysql_error());
}
mysql_select_db($database,$con);
$_SESSION['userid'] = NULL;
?>