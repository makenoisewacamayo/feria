<?php 
//$connect = mysqli_connect('jgordilloaraneda90562.ipagemysql.com', 'jgordillo', 'sqku8182', 'farmaciasocial'); 
//$connect = mysqli_connect('wassenger.cl', 'wassenge_jgordillo', 'sqku8182JEREMIAS{}', 'wassenge_aguasoasis'); 
mysqli_connect(getenv("DB_HOST"),getenv("DB_USER"),getenv("DB_PASS"),getenv("DB_NAME"),getenv('DB_PORT'));
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//echo ("conexion ok");


?> 