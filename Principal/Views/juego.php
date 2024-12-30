<?php

include_once 'Controller/juegoController.php';
$controlador= new JuegoController();

if($_SERVER['REQUEST_METHOD']=="GET"){
    // l código dentro del bloque `if` solo se ejecuta para solicitudes GET. 
    $controlador->render();
    // Llama al método `render()` del objeto `$controlador`. 
    // Este método probablemente se encarga de procesar los datos y generar la vista correspondiente. 
    

}


?>