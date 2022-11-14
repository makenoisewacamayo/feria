<?php  

include("db_connect.php");
$sql="SELECT * FROM eventos WHERE ID = '".$_POST["id"]."'";
$resultado=mysqli_query($connect, $sql);
$existe = mysqli_fetch_array($resultado);
$nombre_evento=$existe['NOMBRE_EVENTO'].$existe['LUGAR'];


 $sql = "DELETE FROM eventos WHERE ID = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 } 
 $sql = "DROP TABLE `grobotics`.$nombre_evento"; 
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 } 
 ?>