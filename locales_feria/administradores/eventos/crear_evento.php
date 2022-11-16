<?php
session_start();
include("db_connect.php");


$nombre = strip_tags($_POST['nombre']);
$lugar=strip_tags($_POST['lugar']);
$fecha=strip_tags($_POST['fecha']);
$locales=strip_tags($_POST['locales']);
$precio=strip_tags($_POST['precio']);
$nombre_tabla=$nombre.$lugar;
$_SESSION['logged']=false;

$sql = "INSERT INTO eventos(ID_ADMINISTRADOR, NOMBRE_EVENTO,LUGAR, FECHA, NUMERO_LOCALES) VALUES('".$_SESSION['id_administrador']."', '".$_POST["nombre"]."', '".$_POST["lugar"]."', '".$_POST["fecha"]."', '".$_POST["locales"]."')";  
if(mysqli_query($connect, $sql))  
 { echo "evento creado exitosamente";
    //echo '<meta http-equiv="Refresh" content="1; /locales/administradores/eventos/index.php">';
    }

$sql_crear_tabla= "CREATE TABLE `grobotics`.$nombre_tabla
(`NUMERO_LOCAL` INT NOT NULL AUTO_INCREMENT, 
`PRECIO` INT NOT NULL , 
`CATEGORIA` TEXT NOT NULL , 
`STATUS` TEXT NOT NULL DEFAULT 'DISPONIBLE' , 
`NOMBRE CLIENTE` TEXT NOT NULL , 
`APELLIDO CLIENTE` TEXT NOT NULL , 
`FONO` INT NOT NULL,
PRIMARY KEY (`NUMERO_LOCAL`) ) ENGINE = InnoDB";

if(mysqli_query($connect, $sql_crear_tabla))  
 { echo "tabla creado exitosamente";
    
    for ($i=1; $i<=$locales; $i++){
        $sql_crear_registros = "INSERT INTO $nombre_tabla(PRECIO, STATUS) VALUES('".$precio."', 'DISPONIBLE')";  
        mysqli_query($connect, $sql_crear_registros);
        
    }
    echo '<meta http-equiv="Refresh" content="1; /administradores/eventos/index.php">';
}



else {
echo "Error en alguno de los datos";
echo '<meta http-equiv="Refresh" content="1; /administradores/eventos/index.php">';

}


?>