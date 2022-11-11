<?php
session_start();
include("db_connect.php");


$rut = strip_tags($_POST['rut']);
$password=strip_tags($_POST['password']);
$_SESSION['logged']=false;


$sql = "SELECT * FROM `administradores` WHERE `RUT`='$rut' AND `PASSWORD`='$password'";
//$sql = "SELECT * FROM `administradores` WHERE `RUT`='$rut'";
$res=mysqli_query($connect, $sql);
$existe = mysqli_fetch_object($res);

if($existe){
$_SESSION['rut']=$rut;
$_SESSION['password']=$_POST['password'];
$_SESSION['logged']=true;

	echo ("ADMINISTRADOR AUTORIZADO");
	echo '<meta http-equiv="Refresh" content="1; /locales/panel_control_administradores.php">';
}

else {
echo "Error en alguno de los datos";
echo '<meta http-equiv="Refresh" content="1; /locales/login.html">';
}
?>