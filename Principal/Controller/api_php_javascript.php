<?php
// En este ejemplo voy a usar el juego que viene ya por defecto 
// en js-dos que es el digger: https://www.mobygames.com/game/18/digger/

// MobyGames nos proporciona su clave api
//private $apikey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
//Revisamos la API de mobygames para saber la ruta del endpoint
/////private $url = 'https://api.mobygames.com/v1/games';

class MiAPIEjemplo {
	
	// Esta variable contendrá la sesión cURL (https://www.php.net/manual/en/intro.curl.php)
	private $c;
		// Esta es la clave de la API: "moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE" y siempre debemos añadirla en cada consulta
		//private $apikey = '?&api_key=moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
	private $apikey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
	private $url = 'https://api.mobygames.com/v1/games';
	
	
	public function __construct () {
		$this->c = curl_init();
		curl_setopt($this->c,CURLOPT_RETURNTRANSFER,true);
	}
	
	public function __destruct () {
		// Aqui cerraria la cesion curl.
		curl_close($this->c);
	}

		// Obtiene el ID de todos los juegos cuyo título coincida con el nombre buscado
		public function getIdJuego($titulo) {
			//$_SESSION['avisos'].='<br>Entro en getIdJuego();';
			// Convertimos el nombre del juego en una cadena URL que sustituye caracteres "extraños" por sus formato URL
			$juego = rawurlencode($titulo);
			echo "luis->".$juego.'<br><br>';
			// Componemos la cadena de búsqueda (hay varios métodos de búsqueda especificados en el manual; nosotros usaremos por id) y
			// obtiene el/los IDs de todos los juegos encontrados cuyo título coincida con lo buscado. Espera 5 segundos...
			curl_setopt($this->c,CURLOPT_URL,$this->url.'?api_key='.$this->apikey.'&format=id&title='.$juego);
			$juego = curl_exec($this->c);
			sleep(5);
			// Decodificamos los datos porque están en JSON y los convertimos en array para devolverlos...
			$juego = json_decode($juego,true);
			//echo "<br><br>Paso 1:<br><br>";
			//print_r($juego);
			return($juego);
		}
	
		public function getDatosDeJuegoById($ids) {
			//$_SESSION['avisos'].='<br>Entro en getDatosDeJuegoById();';
			// GET https://api.mobygames.com/v1/games?format=normal
			$idurl = '';
			// $ids es un array de 1 o varios IDs de juegos. Los vamos a convertir en un cadena única para incluirlos en la URL
			// Podéis echar un ojo a esta función --> http_build_query
			foreach($ids as $i=>$id) {
				$idurl.='&id='.$id;
			}
			//echo '<br><br>luis->'.$this->url.'?api_key='.$this->apikey.$idurl;
			curl_setopt($this->c,CURLOPT_URL,$this->url.'?api_key='.$this->apikey.$idurl);
			return (curl_exec($this->c));
		}

		public function getInfoJuego($juego) {
			//$_SESSION['avisos'].='<br>Entro en getInfoJuego();';
			$ids = $this->getIdJuego($juego);
			$ids = $ids['games'];
			$datosJuego = $this->getDatosDeJuegoById($ids);
			return json_decode($datosJuego, true); 
		}

}




?>