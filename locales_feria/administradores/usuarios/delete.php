<?php  
 //$connect = mysqli_connect("localhost", "root", "", "farmaciasocial");  
include("db_connect.php");
 $sql = "DELETE FROM medicos WHERE ID = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>