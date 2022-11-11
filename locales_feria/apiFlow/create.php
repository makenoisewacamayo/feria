<?php
/**
 * Ejemplo de creación de una orden de cobro, iniciando una transacción de pago
 * Utiliza el método payment/create
 */
require(__DIR__ . "/FlowApi.class.php");
//require(__DIR__ . "/apiFlow/FlowApi.class.php");

echo __DIR__;
//Para datos opcionales campo "optional" prepara un arreglo JSON

$subject = "Boleta electronica infinitum";
$nombre = "jeremias";
//strip_tags($_POST['nombre']);
$email = "jgordilloaraneda@gmail.com";
//strip_tags($_POST['email']);
//$telefono = strip_tags($_POST['celular']);
$monto = "$500"; 
//strip_tags($_POST['monto']);


$optional = array(
	"nombre"=>$nombre,
	//"telefono" => $telefono,
	"email" => $email,
	"monto" => $monto

);
$optional = json_encode($optional);
echo $optional;

//Prepara el arreglo de datos
$params = array(
	"commerceOrder" => rand(1100,2000),
	"subject" => $subject,
	"currency" => "CLP",
	"amount" => 5000,
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