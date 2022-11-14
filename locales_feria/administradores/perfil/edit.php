<?php  
 
 include("db_connect.php");
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE administradores SET ".$column_name."='".$text."' WHERE ID='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }

 ?>