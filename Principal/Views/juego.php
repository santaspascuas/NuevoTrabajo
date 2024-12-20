<?php

include_once 'Controller/juegoController.php';
$controlador= new JuegoController();

if($_SERVER['REQUEST_METHOD']=="GET"){
    $controlador->render();

}


?>