<?php
/*
Esto lo que es llamar a la clase conexión. 
*/
require_once "..\db\db.php";
require_once "..\Models\usuario.php";

class Usuariodb
{

    // Al haber delcarado un obkjeto. DEBO DE UTILIZAR EL MISMO OBJETO CON SUS PROPIEDADES YA DADAS.

    public function CrearUsuario($nick, $email, $nombre, $apellidos, $password)
    {
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




    public static function ConsultaEmail($email)
    {

        try {
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

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en ConsultarporEmail: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada
        } finally {
            Conectar::cerrarConexion();
        }

    }


    // Consultas para poder revisar el nick en formulario de login

    public static function ConsultaNick($nick)
    {

        try {
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

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en ConsultarporNick: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada
        } finally {
            Conectar::cerrarConexion();
        }

    }

    // Consultas para poder revisar el nick en formulario de Registro
    public static function ConsultarporEmail($tabla, $email)
    {
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
    public static function ctrUsuario($tabla)
    {
        // Vamos a hacer una consulta general de los usuarios.
        try {

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

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en ConsultarporEmail: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada

        } finally {
            Conectar::cerrarConexion(); // Cerramos la conexión.
        }
    }

    //-------------------------------------Administrador/ UPDATE VISUALIZAR-------------------------------------------------//

    public static function ctrid($tabla, $id)
    {
        try {
            // Conectar a la base de datos
            $conexion = Conectar::conexion();

            // Preparar la consulta
            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE id = :id");

            // Enlazar el parámetro de la consulta
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el resultado (solo un registro por ID)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retornar el resultado o null si no existe
            return $resultado ?: null;

        } catch (PDOException $e) {
            // Manejar errores
            error_log("Error en Consultarporid: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada

        } finally {
            // Cerrar la conexión
            if (isset($conexion)) {
                Conectar::cerrarConexion();
            }
        }
    }

    ///-----------------Tabla update/Actualizar datos-----------------------------------------///
    public static function adminActualizarUsers($nick, $email, $nombre, $apellidos, $pass, $rol, $id)
    {
        try {
            // Conexión con la base de datos
            $conexion = Conectar::conexion();

            // Preparar la consulta utilizando parámetros nombrados

            /*          //Preparamos la consulta
            $sql =("UPDATE USUARIO SET nick='$nick', email='$email', nombre='$nombre',
            apellidos='$apellidos',password='$pass',ROL='$rol' WHERE id='$id'");*/

            // Esto esta mal porque estaba inyectado valores directamente sin usar param.
            // La funcion param hace que no pueda ser vulnerable a ataques de inyexccion sql.

            $sql = "UPDATE usuario 
                    SET nick = :nick, 
                        email = :email, 
                        nombre = :nombre, 
                        apellidos = :apellidos, 
                        password = :password, 
                        ROL = :rol 
                    WHERE id = :id";

            $stmt = $conexion->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(":nick", $nick, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
            $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al realizar la actualización del usuario: " . $e->getMessage());
            return null; // O lanzar una excepción personalizada
        } finally {
            // Cerrar la conexión
            if (isset($conexion)) {
                Conectar::cerrarConexion();
            }
        }
    }

    /// Query para eliminar usuarios

    public static function adminEliminarUsers($id)
    {

        try {
            // Conexión con la base de datos
            $conexion = Conectar::conexion();

            $sql = "DELETE FROM usuario 
         WHERE id = :id";

            $stmt = $conexion->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejecutar la consulta y retornamos si ha sido positiva o negativa
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al realizar la actualización del usuario: " . $e->getMessage());
            return null; // O lanzar una excepción personalizada
        } finally {
            // Cerrar la conexión
            if (isset($conexion)) {
                Conectar::cerrarConexion();
            }
        }

    }

        ///Añadir la inyeccion de los datos por la base de datos--------TABLA DE JUEGOS PARA METER EN LA BASE DE DATOS------------------------


        public static function adminInserJuegos($id,$titulo,$desarrollo,$distribuidor,
        $anos,$urlJuego,$discripcion, $urlImagen ) {
        try {
            // Conexión con la base de datos
            $conexion = Conectar::conexion();
    
            // Preparar la consulta utilizando parámetros nombrados

            /*          //Preparamos la consulta
            $sql =("UPDATE USUARIO SET nick='$nick', email='$email', nombre='$nombre',
            apellidos='$apellidos',password='$pass',ROL='$rol' WHERE id='$id'");*/

            // Esto esta mal porque estaba inyectado valores directamente sin usar param.
            // La funcion param hace que no pueda ser vulnerable a ataques de inyexccion sql.

            // Consulta SQL preparada
             $sql = "INSERT INTO juego (id, titulo, desarrollador, distribuidor, anio , ruta, descripcion, rutaImagen) 
             VALUES (:id, :titulo, :desarrollador, :distribuidor, :anio , :ruta, :descripcion, :rutaImagen)";
            
            $stmt = $conexion->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(":id", $id, PDO::PARAM_STR); // ID como string (siempre es mejor asegurarse del tipo)
            $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam(":desarrollador", $desarrollo, PDO::PARAM_STR);
            $stmt->bindParam(":distribuidor", $distribuidor, PDO::PARAM_STR);
            $stmt->bindParam(":anio", $anos, PDO::PARAM_INT);  // Año debe ser un número
            $stmt->bindParam(":ruta", $urlJuego, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $discripcion, PDO::PARAM_STR);
            $stmt->bindParam(":rutaImagen",$urlImagen, PDO::PARAM_STR); // Corregido el tipo de dato
            // Hay que tener cuidado con el tipo de dato que metemos en la base de datos
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al realizar la insercion de los juegos: " . $e->getMessage());
            return null; // O lanzar una excepción personalizada
        } finally {
            // Cerrar la conexión
            if (isset($conexion)) {
                Conectar::cerrarConexion();
            }
        }
    }













    














































    public static function AgregarAlCarrito($idUsuario, $idJuego)
    {
        try {
            // Conexión a la base de datos
            $conexion = Conectar::conexion();

            // Consulta SQL preparada
            $sql = "INSERT INTO carrito (usuario, juego) 
                    VALUES (:usuario, :juego)";

            $stmt = $conexion->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(":usuario", $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(":juego", $idJuego, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error en AgregarCarrito: " . $e->getMessage(), 3, "/ruta/al/log/errores.log");
            echo "Ocurrió un problema, por favor intenta más tarde.";
            return false;
        } finally {
            // Cerrar conexión utilizando el método existente en la clase Conectar
            Conectar::cerrarConexion();
        }
    };

    public static function obtenerCarrito($idUsuario)
    {
        try {
            // Conecto a la base de datos y genero un objeto para hacer las cosultas.
            $conexion = Conectar::conexion();
            
            // Utilizo la variable stmt para realizar las querys sobre lo que quiero buscar.
            $stmt = $conexion->prepare("SELECT j.* FROM carrito c INNER JOIN juego j ON c.juego = j.id WHERE c.usuario = :id");
            $stmt->bindParam(":id", $idUsuario, PDO::PARAM_INT);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Obtener el resultado
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Retornar el resultado o null si no existe
            return $resultado ?: null;

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error en ConsultarporEmail: " . $e->getMessage());
            return null; // Opcional: podrías lanzar una excepción personalizada
        } finally {
            Conectar::cerrarConexion();
        }
    };
}
























































































?>