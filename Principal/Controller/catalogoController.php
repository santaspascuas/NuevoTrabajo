<?php
include_once "Controller/api.php";

class CatalogoController{
    private  $miapi=null;

public function __construct(){
    $this->miapi=new MiAPI();

}    

public function listarCatalogo($titulo){
  $respuesta=$this->miapi->getJuegoId($titulo);
  $datos = json_decode($respuesta,true);
  $juegos = $datos['games'];
  sleep(1); // tiempo de retraso o espera , antes de continuar esperar 1 segundo
  $respuesta2 = $this->miapi->getJuegoDatos($juegos);
  $juegos = json_decode($respuesta2,true)["games"];
  include_once "Views/catalogoView.php";

  //  print($respuesta2);
  
}


}




?>