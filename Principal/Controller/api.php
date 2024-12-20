<?php

// En este ejemplo voy a usar el juego que viene ya por defecto 
// en js-dos que es el digger: https://www.mobygames.com/game/18/digger/

// MobyGames nos proporciona su clave api
$apikey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
//Revisamos la API de mobygames para saber la ruta del endpoint
$url = 'https://api.mobygames.com/v1/games?format=id&title=the%20secret%20of%20monkey%20island&api_key='.$apikey;

class MiAPI {
	
	// Esta variable contendrá la sesión cURL (https://www.php.net/manual/en/intro.curl.php)
	private $c;
	// Esta es la clave de la API: "moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE" y siempre debemos añadirla en cada consulta
	private $apikey = '?&api_key=moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
	
	
	public function __construct () {
		$this->c = curl_init();
		curl_setopt($this->c,CURLOPT_RETURNTRANSFER,true);
	}
	
	public function __destruct () {
		curl_close($this->c);
	}
	
	// Obtiene el ID de todos los juegos cuyo título coincida con lo que le digamos
	public function getJuegoId($titulo) {
		$juego = rawurlencode($titulo);
		$url = 'https://api.mobygames.com/v1/games'.$this->apikey.'&platform_name=DOS&format=id&title='.$juego;
		curl_setopt($this->c,CURLOPT_URL,$url);
		return (curl_exec($this->c));
	}
	
	public function getJuegoDatos($ids) {
		$url = 'https://api.mobygames.com/v1/games'.$this->apikey;
		// Si el array está vacío no hacemos nada
		if (count($ids) != 0) {
			foreach ($ids as $id) {
			$url .= '&id='.$id;
			}
		}
		curl_setopt($this->c,CURLOPT_URL,$url);
		return (curl_exec($this->c));
	}
}

// $luis = new MiAPI();

// // Vamos a buscar un juego por su título. Ya sabemos que la plataforma es MS-DOS (i.e. "DOS").

// // Buscamos datos de juegos con la API. Si devuelve un resultado solo, cogeremos los campos que queremos y los pondremos
// // en el formulario automáticamente; si devuelve más de un resultado deberíamos indicar al usuario que sea
// // más específico con el título. Se podría mostrar todos los resultados y que el usuario eligiese el más acertado y luego
// // incorporar solo esos datos, pero entiendo que eso puede ser complejo.

// // Buscamos el ID del juego
// $respuesta = $luis->getJuegoId('Prince of Persia 2');
// //Ahora tenemos la respuesta del servidor en formato json y vamos a decodificarla
// $datos = json_decode($respuesta,true);
// // Esperamos 5 segundos o el servidor nos va a regañar por hacer búsquedas tan seguidas
// sleep(5);
// // print_r($datos);
// // juegos contiene un array con todos los IDs de juegos que contienen el titulo buscado. Debería contener sólo 1 por lo dicho
// $juegos = $datos['games'];

// $respuesta2 = $luis->getJuegoDatos($juegos);

// // print_r(json_decode($respuesta2));

// $juegos = json_decode($respuesta2,true);
// //$juegos = $kk['games'];

// print_r($juegos);
// $juego=$juegos['games'][0];
// echo '<br><br>Título: '.$juego['title'];
// echo '<br>Año de lanzamiento: '.$juego['platforms'][0]['first_release_date'];
// echo '<br>Portada: <img src="'.$juego['sample_cover']['image'].'" />';

// /*
// foreach($juegos as $juego) {
// 	foreach ($juego as $datos) {
// 		echo 'Nombre: ' .  
// 		echo '<img src="' . $valor['thumbnail_image'] . '" >';
 
// }



// /*
// // Para consumir una API utilizaremos la función cURL (https://www.php.net/manual/en/intro.curl.php)
// // Iniciamos sesión de cURL
// $c = curl_init();
// // Con esta función de cURL indicamos que le vamos a pasar una URL 
// curl_setopt($c,CURLOPT_URL,$url);
// // Con esta función indicamos que nos devuelva el valor "true" cuand
// // se realice correctamente la conexión 
// curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
// // En la variable respuesta vamos a guardar la respuesta del servidor
// $respuesta = curl_exec($c);

// // Si se produce un error:

// if(curl_errno($c)) {
// 	$error = curl_error($c);
// }
// else {
// 	$error = '';
// 	curl_close($c);
	
// 	$datos_juego = json_decode($respuesta,true);
// 	$juegos = $datos_juego[games];
// 	foreach ($datos_juego as $clave=>$id) {
// 		$url = 'https://api.mobygames.com/v1/games/'.$id.'?format=normal&api_key='.$apikey;
// 	}

// }

// */
// ?>

<!-- // <!DOCTYPE html>
// <html lang="es">
// <head>
// 	<meta charset="utf-8">
// 	<meta name="viewport" content="width-device-width, initial-scale=1.0">
// 	<title>Api reshulona para MobyGames</title>
// </head>
// <body>



// </body>



// </html> -->