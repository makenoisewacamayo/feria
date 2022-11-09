<?php
error_reporting(0);
$conn = mysqli_connect("127.0.0.1","root","my_secret_pw_shh","chat_db_new");
session_start();
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 
