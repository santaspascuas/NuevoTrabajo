<?php
/*
Esto lo que es llamar a la clase conexión. 
*/
require_once "..\db\db.php";
require_once"..\Models\usuario.php";

class Usuariodb{

    // Al haber delcarado un obkjeto. DEBO DE UTILIZAR EL MISMO OBJETO CON SUS PROPIEDADES YA DADAS.
 
    public function CrearUsuario($nick, $email, $nombre, $apellidos, $password) {
        try {
            // Conexión a la base de datos
            $conexion = Conectar::conexion();
    
            // Consulta SQL preparada
            $sql = "INSERT INTO usuario (nick, email, nombre, apellidos, password) 
                    VALUES (:nick, :email, :nombre, :apellidos, :password)";
    
            $stmt = $conexion->prepare($sql);
    
            // Encriptar la contraseña antes de guardarla
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            // Vincular parámetros
            $stmt->bindParam(":nick", $nick, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(":password", $hashedPassword, PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Usuario creado correctamente.";
                return true;
            } else {
                echo "Error al crear el usuario.";
                return false;
            }
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error en CrearUsuario: " . $e->getMessage(), 3, "/ruta/al/log/errores.log");
            echo "Ocurrió un problema, por favor intenta más tarde.";
            return false;
        } finally {
            // Cerrar conexión utilizando el método existente en la clase Conectar
            Conectar::cerrarConexion();
        }
    }
    



    public static function ConsultaEmail($email){

        try{
            // Conecto a la base de datos y genero un objeto para hacer las cosultas.
        $conexion = Conectar::conexion();

        // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.
        $stmt = $conexion->prepare("SELECT *  FROM usuario WHERE email = ?");

         // Ejecutar la consulta con el email proporcionado
         $stmt->execute([$email]);

         // Obtener el resultado
         $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
 
         // Retornar el resultado o null si no existe
         return $resultado ?: null;

        }catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en ConsultarporEmail: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada
        } finally {
            Conectar::cerrarConexion();
        }

    }


            // Consultas para poder revisar el nick en formulario de login

            public static function ConsultaNick($nick){

                try{
                    // Conecto a la base de datos y genero un objeto para hacer las cosultas.
                $conexion = Conectar::conexion();
        
                // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.
                $stmt = $conexion->prepare("SELECT *  FROM usuario WHERE nick = ?");
    
                 // Ejecutar la consulta con el email proporcionado
                 $stmt->execute([$nick]);
        
                 // Obtener el resultado
                 $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
         
                 // Retornar el resultado o null si no existe
                 return $resultado ?: null;
    
                }catch (PDOException $e) {
                    // Manejar errores de la base de datos
                    error_log("Error en ConsultarporNick: " . $e->getMessage());
                    return null; // Opcional: podrías lanzar una excepción personalizada
                } finally {
                    Conectar::cerrarConexion();
                }
    
            }

            // Consultas para poder revisar el nick en formulario de Registro
    public static function ConsultarporEmail($tabla, $email) {
        try {
            // Conecto a la base de datos y genero un objeto para hacer las cosultas.
            $conexion = Conectar::conexion();
    
            // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.

            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE email = ?");
    
            // Ejecutar la consulta con el email proporcionado
            $stmt->execute([$email]);
    
            // Obtener el resultado
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Retornar el resultado o null si no existe
            return $resultado ?: null;
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en ConsultarporEmail: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada
        } finally {
            Conectar::cerrarConexion();
        }
    }




    //-------------------------------------Administrador-------------------------------------------------//
    public static function ctrUsuario($tabla){
        // Vamos a hacer una consulta general de los usuarios.
        try{

            // Procedemos a gestionar la base de datos y generar el objeto para realizar las consultas
            // La variable llama al metodo estatico de conectar con la base de datos.
            $conexion = Conectar::conexion();

             // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.

             $stmt = $conexion->prepare("SELECT * FROM $tabla");

              // Ejecutar la consulta con el email proporcionado
              $stmt->execute();

               // Obtener el resultado pero de uno solo y yo quiero de varios
               
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Retornar el resultado o null si no existe
            return $resultado ?: null;

        }catch (PDOException $e) {
        // Manejar errores de la base de datos
        error_log("Error en ConsultarporEmail: " . $e->getMessage());
        return null; // Opcional: podrías lanzar una excepción personalizada

        }finally{
            Conectar::cerrarConexion(); // Cerramos la conexión.
        }



    }


    






















































}
























































































?>