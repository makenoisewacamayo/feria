<?php 
//$connect = mysqli_connect('jgordilloaraneda90562.ipagemysql.com', 'jgordillo', 'sqku8182', 'farmaciasocial'); 
//$connect = mysqli_connect('wassenger.cl', 'wassenge_jgordillo', 'sqku8182JEREMIAS{}', 'wassenge_aguasoasis'); 
$host = getenv("DB_HOST_LOCALES");
$user = getenv("DB_USER_LOCALES");
$password = getenv("DB_PASS_LOCALES");
$database = getenv("DB_NAME_LOCALES");
$port = getenv('DB_PORT_LOCALES');
 
$connect = mysqli_connect($host, $user, $password, $database, $port);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n " . mysqli_connect_error());
    exit();
}
//echo ("conexion ok");


?> 