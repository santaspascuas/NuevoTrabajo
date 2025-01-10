<?php
//Necesitamos la clave de la api
$apikey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';

$url = 'https://api.mobygames.com/v1/games?format=id&title=the%20secret%20of%20monkey%20island&api_key='.$apikey;

// Iniciamos la clase


class apiJuegos{

    //Declaramos la variable que sera la session de la conexion.

    private $ch;

    private $apikey = '?&api_key=moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';


    public function __construct(){
        $this->ch = curl_init();
        curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,true);
    }

    public function __destruct () {
		curl_close($this->ch);
	}

    public function getDatosApi(){

        // USO LA VAIRABLE GLOBAL URL 

        global $url;

        // Modificamos el curl para hacer la session en la api

        curl_setopt($this->ch,CURLOPT_URL,$url);


        //Tendriamos la respuesta de la petición.

        $response = curl_exec($this->ch);

        // Probamos a ver si hay algun error


        if(curl_error($this->ch)){
            $error_msg = curl_error($this->ch);

            echo "Error al conectarse a la api";

        }else{
            curl_close($this->ch);
        }

        //Obetenemos el valor de la api para mostrar en formato json

        $datos_juegos = json_decode($response,true);


        // debemos de devolver los datos. 

         // Devuelve los datos decodificados o el JSON original si falla la decodificación
        return $datos_juegos ?: $response;
    }


    public function getDetallesJuegos($ids) {
        global $apikey; // Accedemos a la clave de API
    
        $baseUrl = 'https://api.mobygames.com/v1/games';
        $detalles = [];
    
        foreach ($ids as $id) {
            $url = $baseUrl . '/' . $id . '?api_key=' . $apikey;
            
            // Configura la URL para la sesión cURL
            curl_setopt($this->ch, CURLOPT_URL, $url);
            
            // Realiza la solicitud y obtiene la respuesta
            $respuesta = curl_exec($this->ch);
            
            // Comprueba si hay errores
            if (curl_errno($this->ch)) {
                $detalles[$id] = 'Error cURL: ' . curl_error($this->ch);
            } else {
                $detalles[$id] = json_decode($respuesta, true); // Decodifica y guarda el detalle
            }
            
            // Pausa de 1 segundo para respetar el límite de la API
            sleep(1);
        }
    
        return $detalles;
    }
    

}


$ejemplo =new apiJuegos();

$ejemplo ->getDatosApi();

print_r($ejemplo);




















?>