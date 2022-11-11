<?php
/**
 * Pagina del comercio para redireccion del pagador
 * A esta página Flow redirecciona al pagador pasando vía POST
 * el token de la transacción. En esta página el comercio puede
 * mostrar su propio comprobante de pago
 */
require(__DIR__ . "/FlowApi.class.php");
//require 'vendor/autoload.php';
include("db_connect.php");
//$apiURL = 'https://api.chat-api.com/instance140487/';
//$token_wassenger = 'my0a0u78ip8vilkj';

/* Access token Jeremias Gordillo Lioren*/
//$accessToken="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdjNmJlMTc5MjIwMDRhYjQ2NDczNTEzYzY2NmQ3ZDU3NGM0ZjExZDA5ZWU5MmQxYzc2OTIxYWZkMGNmNjc0ZGI2ZTEzMmFkNWNhMjE0YjMwIn0.eyJhdWQiOiIxNjgiLCJqdGkiOiI3YzZiZTE3OTIyMDA0YWI0NjQ3MzUxM2M2NjZkN2Q1NzRjNGYxMWQwOWVlOTJkMWM3NjkyMWFmZDBjZjY3NGRiNmUxMzJhZDVjYTIxNGIzMCIsImlhdCI6MTU5MjkyNzAyOSwibmJmIjoxNTkyOTI3MDI5LCJleHAiOjE2MjQ0NjMwMjksInN1YiI6IjE2NzkiLCJzY29wZXMiOltdfQ.EeqaXjMAWxw9xEMHWV0xqAPl7pQITLLwboauNZ3lKgmx1L2mQdX582fWKE72R4zl65OEkzBIgQaqatju_schRIcA1FbM1Lfj1vOmdAuVSbQQVlitPm5h0sGMTcCVHsp5IL7lH05zhYVcDm3K2IaFIxNn9UzpaLNDM2UFE36xN4sNPzsNI2Oaf3P2OM2YfKlPEeO6YJfTW9XFadEoyKjrxQVSbcxle2tLtgOXVWVKpVrODqwkMrUDJjpA9eZtpwexnM83xaG8GF5z3RFaZa6mc-98fts0tH3BvMwlrDZKsRENBFO4CxdaV3bHSqVWgHkvemwf3VT8Bi3UcqC0E_pkQq5cvQ3tk4wNneu6SJ3IqaGS7Cmf1o0ky4qmVjzHKvHqETKZ_SzOBtNWXMONs6cY8qp5MCR5aU_YxYp9CeLoRyiuQOQdh5TApizxXbApiT0b2IGDPxO-c93qiMKPVZb9LB4w1KHc-bk_AgvGay1i0F906mwvcP8xU0XusP-teKt-xwqvpHNtpKmgS-pDP-0hy9N_cSV14nZ_anTKLMSEUSLuTWYXi3C3xOlfEsYEYysriR4Sc7mYgsVpYKvY_8CfklSzD3CGtpwHWAGz3uKonWuAsS75Dvh6Pc59gVZGyjc2YCgGYcQqPTt5NO1glV1IygC78moBz_e7MJA7PjZ72AU";

//Access token Pablo Araya Lioren
/*$accessToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlZjhiNWI5MDNkNzQyZDFlNjlkOTNiNzEzYzkyMGIxMjJhN2VhZGNkODZlMzQzYzE0Nzc3OTNkYjNkNmZkNTlhOTY4ZWY1ZjUyNThjNmQzIn0.eyJhdWQiOiIxODAiLCJqdGkiOiIwZWY4YjViOTAzZDc0MmQxZTY5ZDkzYjcxM2M5MjBiMTIyYTdlYWRjZDg2ZTM0M2MxNDc3NzkzZGIzZDZmZDU5YTk2OGVmNWY1MjU4YzZkMyIsImlhdCI6MTU5Nzg1OTgxMywibmJmIjoxNTk3ODU5ODEzLCJleHAiOjE2MjkzOTU4MTMsInN1YiI6IjE4MzgiLCJzY29wZXMiOltdfQ.DM64HB6UeDddHxuNAbj1Ncpltk2F_6K2XLalSIX4351L74zATHZSpKhCdX9uNafdqt6cGP7gePpg462SBeLx6AypC4kRNABjTnrv7aMYui8K9hPzTRzm90nPs3ZupseCz78eZBdhMwWvXCwC9sOr03Db1TOgZ8JykivGusLNpDoeT-pJSSu5M92B_X783slZPavlBYekFyxi9HJpDxTFB_LbIdJ4Qh3N-R-GSU6zLEPvh6ec53hAxOSaVjubYFNieo_JQ-ZYMt18QbbqocRvP4Zii3lZr1O0_9VTEYQydh7rl5Rp4V0NCVGZg03PiTAt9XhdHOS0_TLFquPHXGOLMcv4CvPqnFD71P9qzAKB3_uxtKidZbti2_QL-nhnPY71yB1adTFxzkLyBUszfdZWL2DYeIComlQ23GQEBNbPvgnFFZHL89UDbc9H3IozCsNr50kSwTqsHhrERWtkfLbYBBje6D5kS23zGj3tIys481S9iVHSN-u2TtTGKNYNkDrdyn4eKW2X9e1CBtTpHgYuVQ_iFNhcebS9EaRe9jZyPhc_cTYLg00GnqrCkCi37jAFlJYS3Vbc6XArAc3HGS7Nw39ACYoKB1Ofn1brDgQ3ua7VBERoZTcnYwG4pK5R4lYxkBN7SdkC3fQU4L2CzYUxBBsid-6rOhIbzauIm4qw6ng";*/
try {
    //Recibe el token enviado por Flow
    if(!isset($_POST["token"])) {
        throw new Exception("No se recibio el token", 1);
    }
    $token = filter_input(INPUT_POST, 'token');
    $params = array(
        "token" => $token
    );
    //Indica el servicio a utilizar
    $serviceName = "payment/getStatus";
    $flowApi = new FlowApi();
    $response = $flowApi->send($serviceName, $params, "GET");
    //Asignacion de parámetros para ser almacenados en la base de datos
    $nombre = $response["optional"]["nombre"];
    $telefono = $response["optional"]["telefono"];
    $email = $response["optional"]["email"];
    $monto = $response["paymentData"]["amount"];
    $comision = $response["paymentData"]["fee"];
    $iva = $response["paymentData"]["taxes"];
    $total=$response["paymentData"]["balance"];
    
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////  
//print_r($response["optional"]["maquina"]);
//Creación de boleta electrónica
 
 /*   $data = [
    'emisor' => 
    [
        'tipodoc' => '39',
        'servicio' => 3,
    ],
    'receptor' => 
    [
        'email' => $email,
        
    ],
    'detalles' => 
    [
        [
            'codigo' => '12345',
            'nombre' => 'Boleta electronica Infinitum',
            'cantidad' => 1,
            'precio' => $monto,
            'exento' => false,
        ],
    ],
    'expects' => 'pdf',
];

$client = new GuzzleHttp\Client;

$response1 = $client->request('POST', 'https://www.lioren.cl/api/boletas', [
    'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer '.$accessToken,
        'Content-Type' => 'application/json'
    ],
     'body' => json_encode($data),
]); 

$responseBody = json_decode((string) $response1->getBody(), true);
print_r($responseBody["folio"]);
$folio = $responseBody["folio"];
*/
        $sql = "INSERT INTO `Transacciones` (`ID`, `NOMBRE`, `EMAIL`, `TELEFONO`, `FECHA INICIO`, `STATUS`, `TOKEN FLOW`, `MONTO PAGADO`,`COMISION FLOW`,`IVA`,`TOTAL`, `FOLIO SII`, `MAQUINA`) VALUES (NULL, '$nombre', '$email', '$telefono', current_timestamp(), 'VIGENTE', '$token', '$monto','$comision', '$iva', '$total', '$folio', '1')";
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted'; 
}
$info = $responseBody["pdf"];
$info = base64_decode($info, true);
$nombre = $folio.".pdf";
file_put_contents("administradores/ventas/".$nombre, $info);

$message='http://wassenger.cl/administradores/ventas/'.$nombre;
$phone = '56'.$telefono;
echo $message;

$data2 = json_encode(
    array(
        'chatId'=>$phone.'@c.us',
        'body'=>$message,
        'filename'=> 'boleta.pdf'
    )
);
//$url = $apiURL.'message?token='.$token;
$urlx = $apiURL.'sendFile?token='.$token_wassenger;
$optionsx = stream_context_create(
    array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data2
        )
    )
);
$responsex = file_get_contents($urlx,false,$optionsx);
echo $responsex; 
exit;
    
} catch (Exception $e) {
    echo "Error: " . $e->getCode() . " - " . $e->getMessage();
}

?>