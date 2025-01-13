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
		if (!empty($ids)) {
			$url .= '&id=' . implode('&id=', $ids);
		}
		curl_setopt($this->c,CURLOPT_URL,$url);
		return (curl_exec($this->c));
	}
}