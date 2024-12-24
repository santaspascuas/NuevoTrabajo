<?php
require_once "..\ViewController\Vista.php";
require_once "..\Models\UsuarioModelo.php";

session_start();


class Controlador{


    public function login() {
        // Comprobar si se recibieron las variables del formulario
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = trim($_POST['email']);
            $contrasena = trim($_POST['password']);
    
            // Validar que los campos no estén vacíos
            if (empty($email) || empty($contrasena)) {
                echo "El email y la contraseña son obligatorios.";
                Vista::login();
                return; // Salir para evitar procesamiento adicional
            }
    
            // Determinar si es un email o un nick y buscar en la base de datos
            if (strpos($email, '@') !== false) {
                $consulta = Usuariodb::ConsultaEmail($email); // Buscar por email
            } else {
                $consulta = Usuariodb::ConsultaNick($email); // Buscar por nick
            }
    
            // Verificar si la consulta devolvió resultados
            if (!$consulta) {
                echo "El usuario no existe.";
                Vista::login();
                return; // Salir si no hay resultados
            }
    
            // Verificar la contraseña
            if (
                (isset($consulta['password_hash']) && password_verify($contrasena, $consulta['password_hash'])) || // Caso de contraseña cifrada
                (isset($consulta['password']) && $contrasena === $consulta['password']) // Caso de contraseña en texto plano
            ) {
                // Inicio de sesión correcto
                $_SESSION['usuarioLogueado'] = [
                    'nick' => $consulta['nick'],
                    'email' => $consulta['email'],
                    'nombre' => $consulta['nombre'],
                    'rol' => $consulta['ROL']
                ];
    
                //echo "Inicio de sesión correcto. Bienvenido, " . $consulta['nick'];
    
                // Redirigir al home
                //header("Location:../Views/index.php");
                Vista::muestraHome();
                exit; // Asegurar que no se ejecute más código
            } else {
                echo "Contraseña incorrecta.";
                Vista::login();
            }
        } else {
            // Si no se recibieron datos, mostrar la vista de login
            Vista::login();
        }
    }
    
    

    public function registro(){
            Vista::registro();
           

            if(!empty($_POST['email'])){
                $email = $_POST['email'];
                if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL)){
                echo "El email introducido no es valido";
                }
            }



            if(!empty($_POST['nick'])){
                $nick = $_POST['nick'];
                $nick = trim($nick);
                echo $nick;
            }


            if(!empty($_POST['password'])){
                $pass = $_POST['password'];
                if (preg_match("/^[a-zA-Z]{1,12}$/", $pass)){
                    echo "Tu contraseña no es valida";
                }
            }


            if(!empty($_POST['firstName'])){
                $nombre = $_POST['firstName'];
                $nombre = trim($nombre);
                }

            if(!empty($_POST['lastName'])){
                $apellidos = $_POST['lastName'];
                $apellidos = trim($apellidos);
            }


            if(!empty($_POST['tipoVia'])){
                $via = $_POST['tipoVia'];
            }


            if(!empty($_POST['nombreVia'])){
                $nombrevia = $_POST['nombreVia'];
                $nombrevia = trim($nombrevia);
            }


            if(!empty($_POST['numero'])){
                $numero = $_POST['numero'];
            }

            if(!empty($_POST['telefono'])){
                $telefono = $_POST['telefono'];
            }

        

            // Aqui deberiamos de tener el validador. Funciona pero lo mejor es tenerlo en otra funcion
             $tabla = "usuario";

             if(!empty($email)){
            // Llamamos a la función de comprobar email que a su vez esta usando la funcion de comprobar desde usuario d
            $respuesta = Usuariodb::ConsultarporEmail($tabla,$email);

            
            if($respuesta){
                echo "El email ya esta registrado";
                //Te manda mensaje y deberia de hacer algo diferente
            }else{
                echo "El email no esta registrado. Puedes crear el usuario";
                // Aqui añadimos un nuevo usuario. El nuevo usuario esta creado
                $usuario = new UsuarioNuevo($email,$nombre,$pass,$apellidos,$via,
                $nombrevia,$numero,$telefono,$nick);
                //EL PROBLEMA ESTA QUE QUIERO LLMAR A UNA FUNCION DE LA CLASE
                //USUARIODB PERO NO LA HE INSTANCIADO PARA PODER USAR SUS FUNCIONES.
                $usuarioDB=new Usuariodb();
                $usuarioDB->CrearUsuario($nick,$email,$nombre,$apellidos,$pass);
                // Crearia una session y cookie. ¿Porque cookie? Porque necesit establecer un tiempo de session o mantenimiento en el caso de que el usuario este y tiempo limitado.
                // Dice que puedo crear una array y luego meterlo en una session. ¿ Al loguearse no deberia crear una session?
                // Una vez se confirma que se ha registrado. Me manda a login para comprobar el login. ! Plus añadir envio de correo!

                header("Location:../Views/login.php");
                // Solo con vistas.


            }

             }

    }


    /// Tabla de Administrador con la tabla usuario.

    public static function ctrUsuario(){

        // Aqui deberiamos de tener el validador. Funciona pero lo mejor es tenerlo en otra funcion
         $tabla = "usuario";

         $respuesta = Usuariodb::ctrUsuario($tabla);

         return $respuesta;

    }


    public static function admCrearUsuario(){

        Vista::muestraAdministrador();

        echo "Estoy aqui";

    }



    
















    // Funciones solo para el index.

    public function muestraHome(){
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraHome();
    }

    // Aqui va a ir la funcion del perfil
    public function muestraPerfil(){
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraPerfil();
    }
    public function muestraLogin(){
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraLogin();
    }
    public function muestraRegistro(){
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraRegistro();
    }

    public function muestraAdministrador(){
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraAdministrador();
    }














    }


    

//Fin del controlador


// Empiezo a crear el objeto y lo invoco
$aplicacion = new Controlador();

// Creamos una variable de inicio que sera la de por defecto tenerla.
// Esta forma supone tener una variable fija la cual se va a analizar con un switch


// Si hay una sesión activa, ajustamos la vista inicial a la home.
// Asi tendremos controlado po defecto lo que vea. 
if (isset($_SESSION['usuarioLogueado'])) {
    print_r($_SESSION['usuarioLogueado']);
}

// Control de flujo según las acciones del index.
    if (isset($_POST['tmp_inicio_btn_entrar_registro'])) {
        $aplicacion->muestraRegistro();
    }

    if (isset($_POST['tmp_inicio_btn_entrar_login'])) {
        $aplicacion->muestraLogin();
    }

    if (isset($_POST['tmp_inicio_btn_entrar_home'])) {
        $aplicacion->muestraHome();
    }
    if (isset($_POST['tmp_inicio_btn_entrar_perfil'])) {
        $aplicacion->muestraPerfil();
    }
    if (isset($_POST['tmp_inicio_btn_entrar_Administrador'])) {
        $aplicacion->muestraAdministrador();
    }




////-------------------Botones de Registro y Login paginas--------------------------------------///


if (isset($_POST['tmp_inicio_btn_entrar_registro'])) {
    $aplicacion->muestraRegistro();
}

if(isset($_POST['tmp_login_btn_registro'])){
    
    $aplicacion->registro();
}

// Boton para tener acceso a login de nuevo y empezaer a recibir los datos

if(isset($_POST['tmp_login_btn_login'])){
    
    $aplicacion->login();
}


// Boton para llamar a registro y entrar para las validaciones

if(isset($_POST['tmp_registro_btn_registro'])){
    
    $aplicacion->registro();
}


////-------------------Administrador--------------------------------------///

if(isset($_POST['tmp_admin_crear_usuario'])){
    
    $aplicacion->admCrearUsuario();
}

































/*
if (isset($_SESSION['usuarioLogueado'])) {

    $aplicacion ->home();
}
*/

?>