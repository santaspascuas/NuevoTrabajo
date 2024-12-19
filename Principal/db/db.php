<?php

// Vamos a proceder a crear la conexion con la base de datos

class Conectar{
    // Propiedad para guardar la conexión a la base de datos
    // Usamos `static` porque queremos que sea compartida entre todos los métodos de la clase
    // Con el estatico no invocamos un objeto, directamente lo podemos utilizar,

    private static $conexion = null; // Propiedad para guardar la conexión a la base de datos


    public static function conexion(){
        try {
            // Intentamos conectar a la base de datos usando PDO
            // `self::$conexion` es la forma de acceder a la propiedad estática desde dentro de la clase
            self::$conexion = new PDO('mysql:host=localhost;dbname=trabajoluis', "root", "");
            // Asignamos  la propieda a la xonexion. Creando un obejto de conexión o variable.
            //echo "La conexión ha sido buena";
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return self::$conexion;
        // Se añade el retorno de la conexión porquesino no puedes utilizarla para hacer consultas a la base de datos.
    }

        // Método para cerrar la conexión
        public static function cerrarConexion() {
            // Comprobamos si la conexión existe (es decir, que no sea `null`)
            if (self::$conexion !== null) {
                self::$conexion = null; // Cerrar la conexión asignando null
                // Para cerrar las conexion, debemos de asignar null a la varuables.
                //echo "La conexión ha sido cerrada";
            } else {
                echo "No hay conexión para cerrar";
            }
        }

        //Crear metodo existe usuario.
        // Hacer consulta sql a pelo para ver si existe. Con retorno. 
        // Deberia de ir a comprobar email en el formulario. Si existe el usuario, deberia retorna el usuario ebn la base de datos
        // Sino existe que continue y luego seria meter las cosas

        // Aqui seria metodo de inyección de todo. 


        // En formulario introducir el metodo de usuariop.

        // todas las consultas se cierran.






        // crear usuario y cerrramos conexion.
        
    }


?>