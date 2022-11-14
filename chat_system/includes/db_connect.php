<?php
error_reporting(0);

$host = getenv("DB_HOST_CHAT_SYSTEM");
$user = getenv("DB_USER_CHAT_SYSTEM");
$password = getenv("DB_PASS_CHAT_SYSTEM");
$database = getenv("DB_NAME_CHAT_SYSTEM");
$port = getenv('DB_PORT_CHAT_SYSTEM');
 

$conn = mysqli_connect($host, $user, $password, $database, $port);
session_start();
// Check connection
if (mysqli_connect_errno())
{
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?> 
