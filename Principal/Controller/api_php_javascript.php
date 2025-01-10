<?php

echo "<h1> Ejemplo para poder obtener datos </h1>";

$apiKey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
$url = 'https://api.mobygames.com/v1/games?format=id&api_key=' . $apiKey;
 // Voy a hacer una petición generica a la api

// Debemos de realizar la session de curl.
$curl = curl_init(); // Iniciamos la session de curl.

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE); // Esta funcion deberia devolverme una cadena tipo curl_exec
$response = curl_exec($curl);// La respuesta del formato curl
$err = curl_error($curl); // muestra errores en caso de existir
curl_close($curl);

// En el instituo no me funciona porque tengo algun problema con el certificado ssl.

curl_close($curl); // termina la sesión 

if ($err) {
	echo "cURL Error #:" . $err; // mostramos el error
} else {
	echo $response; // en caso de funcionar correctamente
    // Ahora mismo estoy recibiendo los id de los juegos. 

}

// Aqui deberiamos parsear la respuesta con el json. Obtengo los id de los juegos mas o menos. 
$objeto = json_decode($response);


echo var_dump($objeto);
















?>