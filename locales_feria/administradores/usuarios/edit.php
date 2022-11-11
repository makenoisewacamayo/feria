<?php  
 //$connect = mysqli_connect("localhost", "root", "", "farmaciasocial");  
 include("db_connect.php");
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE medicos SET ".$column_name."='".$text."' WHERE ID='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }

 ?>