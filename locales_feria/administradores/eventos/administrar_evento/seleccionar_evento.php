<?php
include("db_connect.php");
session_start();
$id = $_GET['subject'];
//echo $id;
$_SESSION['logged']=false;


$sql = "SELECT * FROM `eventos` WHERE ID = '$id' "; 
$resultado=mysqli_query($connect, $sql);
$existe = mysqli_fetch_array($resultado);

$nombre_tabla = $existe['NOMBRE_EVENTO'].$existe['LUGAR'];
$_SESSION["NOMBRE_TABLA"]= $nombre_tabla;

//echo $_SESSION["NOMBRE_TABLA"];
echo '<meta http-equiv="Refresh" content="0; /locales/administradores/eventos/administrar_evento/seleccionar_evento.html">';

?>