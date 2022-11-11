<?php
/**
 * Ejemplo de creación de una orden de cobro, iniciando una transacción de pago
 * Utiliza el método payment/create
 */
require(__DIR__ . "/FlowApi.class.php");
session_start();
//Para datos opcionales campo "optional" prepara un arreglo JSON

$subject = "AdminLocales.cl";
$nombre=strip_tags($_POST['nombre']);
$apellido=strip_tags($_POST['apellido']);
$telefono = strip_tags($_POST['telefono']);
$email = strip_tags($_POST['email']);
$evento= strip_tags($_SESSION['NOMBRE_TABLA']);
$local= strip_tags($_SESSION['ID_LOCAL']);
$monto = strip_tags($_SESSION['PRECIO']);


$optional = array(
	"nombre"=>$nombre,
    "apellido"=>$apellido,
	"telefono" => $telefono,
	"evento" => $evento,
    "local" => $local,
	"monto" => $monto

);
$optional = json_encode($optional);
echo $optional;

//Prepara el arreglo de datos
$params = array(
	"commerceOrder" => rand(1100,2000),
	"subject" => $subject,
	"currency" => "CLP",
	"amount" => $monto,
	"email" => $email,
	"paymentMethod" => 9,
	"urlConfirmation" => Config::get("BASEURL") . "/login.html",
	"urlReturn" => Config::get("BASEURL") ."/login.html",
	"optional" => $optional
);
//Define el metodo a usar
$serviceName = "payment/create";
echo $params;

try {
	// Instancia la clase FlowApi
	$flowApi = new FlowApi;
	// Ejecuta el servicio
	$response = $flowApi->send($serviceName, $params,"POST");
	//Prepara url para redireccionar el browser del pagador
	echo $response;
	$redirect = $response["url"] . "?token=" . $response["token"];
	header("location:$redirect");
} catch (Exception $e) {
	echo $e->getCode() . " - " . $e->getMessage();
}

?>