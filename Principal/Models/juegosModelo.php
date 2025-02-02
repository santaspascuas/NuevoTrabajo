<?php
//hacer las consultas a la base de datos
 class JuegosModelo{

    function buscarJuegos ($filtro){
        try{
            // Conecto a la base de datos y genero un objeto para hacer las cosultas.
        $conexion = Conectar::conexion();
        //guardar valores
        $params= [];
            $query="SELECT * FROM juego WHERE";
            if($filtro !=null){
                if($filtro->getGenero()!=''){
                    //si viene un filtro por genero aplicas el filtro .
                    $query.=" AND LOWER(genero) LIKE LOWER(?)"; //buscar patron en una columna de la base de datos
                    $params[]='%'.$filtro->getGenero().'%';
                }
                if($filtro->getPlataforma()!=''){
                    //si viene un filtro por genero aplicas el filtro .
                    $query.=" AND LOWER(plataforma) LIKE LOWER(?)"; //buscar patron en una columna de la base de datos
                    $params[]='%'.$filtro->getPlataforma().'%';
                }
                if($filtro->getAnyo()!=''){
                    //si viene un filtro por genero aplicas el filtro .
                    $query.=" AND anio=?";
                    $params[]=$filtro->getAnyo();
                }
                if($filtro->getTitulo()!=''){
                    //si viene un filtro por genero aplicas el filtro .
                    $query.=" AND LOWER(titulo) LIKE LOWER(?)";
                    $params[]='%'.$filtro->getTitulo().'%';
                }
            }
            if(empty($params)){
                $query= "SELECT * FROM juego";
            }else{
               $query= str_replace("WHERE AND" , "WHERE" , $query);
            }
        // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.
        $stmt = $conexion->prepare($query);

         // Ejecutar la consulta con el email proporcionado
         $stmt->execute($params);
         // Obtener el resultado
         $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
         // Retornar el resultado o null si no existe
         return $resultado ?: null;

        }catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error: " . $e->getMessage();
            error_log("Error en Buscar Juegos: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada
        } finally {
            Conectar::cerrarConexion();
        }
    }

    public function insertarJuego($titulo, $descripcion, $genero, $plataforma, $anyo, $imagen) {
        try {
            // Conexión a la base de datos
            $conexion = Conectar::conexion();
    
            // Consulta SQL preparada
            $sql = "INSERT INTO juego (titulo, descripcion, genero, plataforma, anio, imagen) 
                    VALUES (:titulo, :descripcion, :genero, :plataforma, :anyo, :imagen)";
    
            $stmt = $conexion->prepare($sql);
    
    
            // Vincular parámetros
            $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":genero", $genero, PDO::PARAM_STR);
            $stmt->bindParam(":plataforma", $plataforma, PDO::PARAM_STR);
            $stmt->bindParam(":anyo", $anyo, PDO::PARAM_INT);
            $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
         
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Error al crear el juego.";
                return false;
            }
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error en CrearJuego: " . $e->getMessage(), 3);
            echo "Ocurrió un problema, por favor intenta más tarde.";
            return false;
        } finally {
            // Cerrar conexión utilizando el método existente en la clase Conectar
            Conectar::cerrarConexion();
        }
    }

    public static function listarAnios()
    {
        // Vamos a hacer una consulta general de los usuarios.
        try {

            // Procedemos a gestionar la base de datos y generar el objeto para realizar las consultas
            // La variable llama al metodo estatico de conectar con la base de datos.
            $conexion = Conectar::conexion();

            // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.

            $stmt = $conexion->prepare("SELECT DISTINCT j.anio FROM juego j ORDER BY j.anio DESC");

            // Ejecutar la consulta con el email proporcionado
            $stmt->execute();

            // Obtener el resultado pero de uno solo y yo quiero de varios

            $resultado = $stmt->fetchAll(PDO::FETCH_COLUMN);
            // Retornar el resultado o null si no existe
            return $resultado ?: null;

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en Listar Anios: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada

        } finally {
            Conectar::cerrarConexion(); // Cerramos la conexión.
        }
    }

    public static function listarGeneros()
    {
        // Vamos a hacer una consulta general de los usuarios.
        try {

            // Procedemos a gestionar la base de datos y generar el objeto para realizar las consultas
            // La variable llama al metodo estatico de conectar con la base de datos.
            $conexion = Conectar::conexion();

            // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.

            $stmt = $conexion->prepare("SELECT DISTINCT j.genero FROM juego j");

            // Ejecutar la consulta con el email proporcionado
            $stmt->execute();

            // Obtener el resultado pero de uno solo y yo quiero de varios

            $resultado = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $resultado = self::dividirFilas($resultado);
            // Retornar el resultado o null si no existe
            return $resultado ?: null;

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en Listar Generos: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada

        } finally {
            Conectar::cerrarConexion(); // Cerramos la conexión.
        }
    }
    
    public static function listarPlataformas()
    {
        // Vamos a hacer una consulta general de los usuarios.
        try {

            // Procedemos a gestionar la base de datos y generar el objeto para realizar las consultas
            // La variable llama al metodo estatico de conectar con la base de datos.
            $conexion = Conectar::conexion();

            // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.

            $stmt = $conexion->prepare("SELECT DISTINCT j.plataforma FROM juego j");

            // Ejecutar la consulta con el email proporcionado
            $stmt->execute();

            // Obtener el resultado pero de uno solo y yo quiero de varios

            $resultado = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $resultado = self::dividirFilas($resultado);
            // Retornar el resultado o null si no existe
            return $resultado ?: null;

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en Listar Plataformas: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada

        } finally {
            Conectar::cerrarConexion(); // Cerramos la conexión.
        }
    }

    private static function dividirFilas($filas){
        $valores = [];

        foreach($filas as $fila) {
            $partes = array_map('trim', explode(',', $fila)); // Dividir y limpiar espacios
            $valores = array_merge($valores, $partes);
        }

        return array_unique($valores); // Eliminar duplicados
    }
}
//añadimos en esta clase por cuales filtros se buscan los juegos
class FiltroJuegos{

private $plataforma;
private $genero;
private $titulo;
private $anyo;



public function __construct($genero, $plataforma,$titulo,$anyo){
    $this->genero=$genero;
    $this->titulo=$titulo;
    $this->anyo=$anyo;
    $this->plataforma=$plataforma;
}

public function getPlataforma(){
    return $this->plataforma;
}
public function getGenero(){
    return $this->genero;

}

public function getTitulo(){
    return $this->titulo;

}

public function getAnyo(){
    return $this->anyo;

}







}

?>