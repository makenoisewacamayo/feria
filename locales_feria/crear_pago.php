<?php  
 session_start();
 include("db_connect.php");
 $_SESSION["ID_LOCAL"] = $_GET["id"];  
$_SESSION["PRECIO"]= $_GET["precio"]
?>

<br><br>
 <form action="/apiFlow/pagar.php" method="POST">
 
     <input type="text" placeholder="NOMBRE CLIENTE" name="nombre">
     <br><br>
     <input type="text" placeholder="APELLIDO CLIENTE" name="apellido">
     <br><br>
     <input type="text" placeholder="TELEFONO" name="telefono">
     <br><br>
     <input type="text" placeholder="EMAIL" name="email">
     <br><br>
     
     EVENTO <?php echo $_SESSION["NOMBRE_TABLA"];?>
     <br><br>
     LOCAL<?php echo $_SESSION["ID_LOCAL"];?>
     <br><br>
     MONTO A PAGAR<?php echo $_SESSION["PRECIO"];?>
     <br><br>
     
     <button type="submit">PAGAR</button>
 </form>
 



