<?php 
$connect = mysqli_connect(getenv("DB_HOST"),getenv("DB_USER"),getenv("DB_PASS"),getenv("DB_NAME"),getenv('DB_PORT'));
//$connect = mysqli_connect('wassenger.cl', 'wassenge_jgordillo', 'sqku8182JEREMIAS{}', 'wassenge_aguasoasis'); 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


?> 