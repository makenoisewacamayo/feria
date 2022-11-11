<?php
/**
 * Clase para Configurar el cliente
 * @Filename: Config.class.php
 * @version: 2.0
 * @Author: flow.cl
 * @Email: csepulveda@tuxpan.com
 * @Date: 28-04-2017 11:32
 * @Last Modified by: Carlos Sepulveda
 * @Last Modified time: 28-04-2017 11:32
 */
 
 $COMMERCE_CONFIG = array(
 	"APIKEY" => "7D055ADF-B7E0-450B-98E8-8ADD6B95LC00", // apikey Jeremias Gordillo Sanbox
 	
 	//"APIKEY" => "2FF0FE40-8F92-4107-996D-4BBELB15EDFD", // apikey Pablo Araya Sanbox

 	"SECRETKEY" => "ec6cd303b37d25808f28e0b61caa7320d57ec1e2", // SecretKey Jeremias Gordillo Sandbox
 	//"SECRETKEY" => "633ab4e51f703852341594bb84715fc9f5b6a6a9", // SecretKey Pablo Araya Sandbox

 	"APIURL" => "https://sandbox.flow.cl/api", // Producción EndPoint o Sandbox EndPoint
 	//"BASEURL" => "https://www.wassenger.cl/jgordillo/apiFlow" //Registre aquí la URL base en su página donde instalará el cliente
 	"BASEURL" => "https://www.grobotics.cl/apiFlow" //Registre aquí la URL base en su página donde instalará el cliente
	 //"BASEURL" => "https://www.grobotics.cl/home/groboti1/public_html/apiFlow" //Registre aquí la URL base en su página donde instalará el cliente
 
	 
);
 
 class Config {
 	
	static function get($name) {
		global $COMMERCE_CONFIG;
		if(!isset($COMMERCE_CONFIG[$name])) {
			throw new Exception("The configuration element thas not exist", 1);
		}
		return $COMMERCE_CONFIG[$name];
	}
 }
