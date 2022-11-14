<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<body>



<?php
session_start();

if(isset( $_SESSION['logged'] ) && $_SESSION['logged']=='si'){


$rut=$_SESSION["rut"];
$sql = "SELECT * FROM `administradores` WHERE RUT = '$rut' "; 
$resultado=mysqli_query($connect, $sql);
$existe = mysqli_fetch_array($resultado);


echo "ID:" . $existe[0] . ".<br>";
echo "RUT:". $existe['RUT'].".<br>";
echo "NOMBRE:" . $existe['NOMBRE'] . ".<br>";
echo "PASSWORD: " . $existe["PASSWORD"] . ".<br>";
$_SESSION['id_administrador']=$existe[0];
}
else {
	echo("NO TIENE ACCESO A ESTA PAGINA");
echo '<meta http-equiv="Refresh" content="1; /locales/login.html">';
exit();
}
?>
<br>
<br>


<form action="/locales/administradores/perfil/index.php">

<input type="submit" value="MI PERFIL">

</form>

<br>
<form action="/locales/administradores/eventos/index.php">

<input type="submit" value="MIS EVENTOS">

</form>

<br>

<form action="cerrar_sesion.php">

<input type="submit" value="CERRAR SESION">

</form>
<br>



</body>
</html>
