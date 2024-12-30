<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de obtencion de datos de la api como pokemon dito</title>
</head>
<body>

<h1> Ejemplo de obtencion de la api </h1>

<?php

    // Empezamos a realizar un curl para conectar con la api. Es una session de curlURL

    $ch = curl_init();

    $url = 'https://pokeapi.co/api/v2/pokemon/ditto';

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($ch);

    if(curl_error($ch)){
        $error_msg = curl_error($ch);
        echo "Error al conectarse a la api";
    }else{
        curl_close($ch);
    }


    $pokemon_data = json_decode($response,true);

    echo '<h1>'. $pokemon_data['name']. '</h1>'; // Con esto ya esyoy obteniendo el nombre de DITTO

    echo '<img src="'.$pokemon_data['sprites']['front_default'].'" alt="'.$pokemon_data['name'].'">';





?>


    
</body>
</html>