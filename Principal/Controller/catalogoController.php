<?php
include_once "api.php"; //es opcional , si el archivo no existe pasa de largo

class CatalogoController
{
    private $miapi = null;

    public function __construct()
    {
        $this->miapi = new MiAPI();

    }

    public function listarCatalogo($titulo)
    {
        $respuesta = $this->miapi->getJuegoId($titulo);
        $datos = json_decode($respuesta, true);
        $juegos = $datos['games'];
        sleep(1); // tiempo de retraso o espera , antes de continuar esperar 1 segundo
        $respuesta2 = $this->miapi->getJuegoDatos($juegos);
        $juegos = json_decode($respuesta2, true)["games"];
        include_once "../Views/catalogo.php";

        //  print($respuesta2);

    }


}

class Juego{
    private $titulo;
    private $year;
    private $image;
    private $description;

    function __construct($titulo,$year,$image,$description){
        $this->titulo=$titulo;
        $this->year=$year;
        $this->image=$image;
        $this->description=$description;

    }

    function getTitulo(){
        return $this->titulo;
    }
    function getYear(){
        return $this->year;
    }
    function getImage(){
        return $this->image;
    }
    function getDescription(){
        return $this->description;
    }
}

?>