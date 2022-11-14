<?php  
 
include("db_connect.php");

 $sql = "INSERT INTO medicos(NOMBRE, RUT, TELEFONO, EMAIL, ESPECIALIDAD, PASSWORD) VALUES('".$_POST["nombre"]."', '".$_POST["rut"]."', '".$_POST["telefono"]."', '".$_POST["email"]."', '".$_POST["especialidad"]."', '".$_POST["rut"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted'; 
       			$from = "administrador@lafarmaciasocial.com";
                        $to = $_POST['email'];
                        $subject = "Bienvenido a Farmasocial";
                        $message = "Hola ";
                        $message .=$_POST['nombre'];
                        $message .='. Para acceder a la plataforma debes ingresar tu rut: ';
                        $message .=$_POST['rut'];
                        $message .=' Y tu clave inicial: ';
                        $message .=$_POST['rut'];
                        $message .=' Saludos. ';
                        $headers = "From:" . $from;
                        //echo $message;
                        mail($to,$subject,$message, $headers);
                        //echo "The email message was sent."; 
 }
 $mensaje= "Estimado ".$_POST['nombre'].". Bienvenido a la plataforma Farmasocial del Municipio de Buin. Para acceder a los servicios debes ingresar en www.";
 $mensaje = $mensaje."lafarmaciasocial.com/farmasocial/login.html con tu rut y password. Tu clave inicial es ".$_POST['rut'];
 $mensaje = $mensaje.". Saludos cordiales, tu alcalde Miguel Araya.";
 $sql2 = "INSERT INTO notificaciones (TELEFONO, NOMBRE, MENSAJE, STATUS) VALUES('".$_POST["telefono"]."', '".$_POST["nombre"]."', '$mensaje', '1')";   
 if(mysqli_query($connect, $sql2))  
 {  
      //echo 'Notificacion creada correctamente'; 
 }
 ?> 