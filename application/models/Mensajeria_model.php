<?php

class mensajeria_model extends CI_Model {

	function smsdrocerca($numberCLI,$templade,$factu){

		$this->load->helper('mensajeria');

		//validaciones
		$numberCLI =str_replace(' ', '', $numberCLI); // para que no tenga espacios en blanco
		$numberCLI = preg_replace('/-/', '', $numberCLI); // para que no tenga -
		$numberCLI = substr($numberCLI, 1); // empiece desde primera posicion ejemplo 4120749550
		
		$mensaje = $templade .' ' .$factu;
		$numeros = [$numberCLI]; // Obligatoriamente debe ser un array
		$api_key = '8ca7ff824738db1d';
		$url = "https://www.enviatusms.com/api/sms-multi?api_key={$api_key}";

		$respuesta = requestHelper($url, true, json_encode(['numeros' => $numeros, 'texto' => $mensaje]), ['Content-Type' => 'application/json']);

	}

}
?>
