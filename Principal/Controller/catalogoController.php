<?php
include_once "api.php"; //es opcional , si el archivo no existe pasa de largo
include_once "../Models/juegosModelo.php";
class CatalogoController
{
    private $miapi = null;

    public function __construct()
    {
        $this->miapi = new MiAPI();

    }

    // public function listarCatalogo($titulo)
    // {
    //     $respuesta = $this->miapi->getJuegoId($titulo);
    //     $datos = json_decode($respuesta, true);
    //     $juegos = $datos['games'];
    //     sleep(1); // tiempo de retraso o espera , antes de continuar esperar 1 segundo
    //     $respuesta2 = $this->miapi->getJuegoDatos($juegos);
    //     $juegos = json_decode($respuesta2, true)["games"];
    //     include_once "../Views/catalogo.php";

    //     //  print($respuesta2);

    // }

    public function listarCatalogo($filtro)
    {
       
       $juegosModelo=new JuegosModelo();
       $juegosAsoc=$juegosModelo->buscarJuegos($filtro);
       $juegos=[];
       if($juegosAsoc!=null){
           foreach($juegosAsoc as $juego){
               //hay que mapear
               $juegos[]=new Juego($juego['id'],$juego['titulo'] , $juego['descripcion'], $juego['genero'],$juego['anio'] , $juego['imagen'] );
           }
       }
        $anios = JuegosModelo::listarAnios();
        $generos = JuegosModelo::listarGeneros();
        $plataformas = JuegosModelo::listarPlataformas();
    
        include_once "../Views/catalogo.php";
    }
    
    public function volcarCatalago()
    {
        $respuesta = $this->miapi->getJuegoId("");
        $datos = json_decode($respuesta, true);
        $juegos = $datos['games'];
        sleep(1); // tiempo de retraso o espera , antes de continuar esperar 1 segundo
        $respuesta2 = $this->miapi->getJuegoDatos($juegos);
        $juegos = json_decode($respuesta2, true)["games"];
        $juegoModelo= new JuegosModelo();
        foreach($juegos as $juego){
            $titulo=$juego['title'];
            $generos= $juego['genres'];
            $genero='';
            foreach($generos as $gen){
                $genero.=$gen['genre_name'].',';
            }
            
            $plataformas= $juego['platforms'];
            $plataforma = '';
            foreach($plataformas as $plat){
                $plataforma.=$plat['platform_name'].',';
            }
            $descripcion= $juego['description'] ;
            $imagen= $juego['sample_cover']['image'];
            $anyo=$juego['platforms'][0]['first_release_date'];
            $juegoModelo->insertarJuego($titulo,$descripcion,$genero, $plataforma,$anyo,$imagen);
        }
        $this->listarCatalogo(null);

    }


}

class Juego{
    private $id;
    private $genero;
    private $description;
    private $titulo;
    private $year;
    private $image;
    private $isPersisted = false;
   

    function __construct($id,$titulo, $description, $genero,$year,$image){
        $this->id = $id;
        $this->genero = $genero;
        $this->description = $description;
        $this->titulo=$titulo;
        $this->year=$year;
        $this->image=$image;
    }

    function getId(){
        return $this->id;
    }

    function getGenero(){
        return $this->genero;
    }

    function getDescription(){
        return $this->description;
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
    function isPersisted(){
        return $this->isPersisted;
    }
    function setPersisted($isPersisted){
        $this->isPersisted=$isPersisted;
    }
   
}

?>