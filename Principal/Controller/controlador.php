<?php
require_once "..\ViewController\Vista.php";
require_once "..\Models\UsuarioModelo.php";
require_once "./catalogoController.php";
require_once "./api_php_javascript.php";


session_start();


class Controlador
{


    public function login()
    {
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
                    'id' => $consulta['id'],
                    'nick' => $consulta['nick'],
                    'email' => $consulta['email'],
                    'nombre' => $consulta['nombre'],
                    'rol' => $consulta['Rol']
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



    public function registro()
    {
        Vista::registro();


        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            if (!FILTER_VAR($email, FILTER_VALIDATE_EMAIL)) {
                echo "El email introducido no es valido";
            }
        }



        if (!empty($_POST['nick'])) {
            $nick = $_POST['nick'];
            $nick = trim($nick);
            echo $nick;
        }


        if (!empty($_POST['password'])) {
            $pass = $_POST['password'];
            if (preg_match("/^[a-zA-Z]{1,12}$/", $pass)) {
                echo "Tu contraseña no es valida";
            }
        }


        if (!empty($_POST['firstName'])) {
            $nombre = $_POST['firstName'];
            $nombre = trim($nombre);
        }

        if (!empty($_POST['lastName'])) {
            $apellidos = $_POST['lastName'];
            $apellidos = trim($apellidos);
        }


        if (!empty($_POST['tipoVia'])) {
            $via = $_POST['tipoVia'];
        }


        if (!empty($_POST['nombreVia'])) {
            $nombrevia = $_POST['nombreVia'];
            $nombrevia = trim($nombrevia);
        }


        if (!empty($_POST['numero'])) {
            $numero = $_POST['numero'];
        }

        if (!empty($_POST['telefono'])) {
            $telefono = $_POST['telefono'];
        }



        // Aqui deberiamos de tener el validador. Funciona pero lo mejor es tenerlo en otra funcion
        $tabla = "usuario";

        if (!empty($email)) {
            // Llamamos a la función de comprobar email que a su vez esta usando la funcion de comprobar desde usuario d
            $respuesta = Usuariodb::ConsultarporEmail($tabla, $email);


            if ($respuesta) {
                echo "El email ya esta registrado";
                //Te manda mensaje y deberia de hacer algo diferente
            } else {
                echo "El email no esta registrado. Puedes crear el usuario";
                // Aqui añadimos un nuevo usuario. El nuevo usuario esta creado
                $usuario = new UsuarioNuevo(
                    $email,
                    $nombre,
                    $pass,
                    $apellidos,
                    $via,
                    $nombrevia,
                    $numero,
                    $telefono,
                    $nick
                );
                //EL PROBLEMA ESTA QUE QUIERO LLMAR A UNA FUNCION DE LA CLASE
                //USUARIODB PERO NO LA HE INSTANCIADO PARA PODER USAR SUS FUNCIONES.
                $usuarioDB = new Usuariodb();
                $usuarioDB->CrearUsuario($nick, $email, $nombre, $apellidos, $pass);
                // Crearia una session y cookie. ¿Porque cookie? Porque necesit establecer un tiempo de session o mantenimiento en el caso de que el usuario este y tiempo limitado.
                // Dice que puedo crear una array y luego meterlo en una session. ¿ Al loguearse no deberia crear una session?
                // Una vez se confirma que se ha registrado. Me manda a login para comprobar el login. ! Plus añadir envio de correo!

                header("Location:../Views/login.php");
                // Solo con vistas.


            }

        }

    }


    /// Tabla de Administrador con la tabla usuario//////

    public static function ctrUsuario()
    {

        // Aqui deberiamos de tener el validador. Funciona pero lo mejor es tenerlo en otra funcion
        $tabla = "usuario";

        $respuesta = Usuariodb::ctrUsuario($tabla);

        return $respuesta;

    }

    public static function admCrearUsuario()
    {


        // Debo de recoger los datos

        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            if (!FILTER_VAR($email, FILTER_VALIDATE_EMAIL)) {
                echo "El email introducido no es valido";
            }
        }



        if (!empty($_POST['nick'])) {
            $nick = $_POST['nick'];
            $nick = trim($nick);
        }


        if (!empty($_POST['password'])) {
            $pass = $_POST['password'];
            if (preg_match("/^[a-zA-Z]{1,12}$/", $pass)) {
                echo "Tu contraseña no es valida";
            }
        }


        if (!empty($_POST['firstName'])) {
            $nombre = $_POST['firstName'];
            $nombre = trim($nombre);
        }

        if (!empty($_POST['lastName'])) {
            $apellidos = $_POST['lastName'];
            $apellidos = trim($apellidos);
        }

        // Aqui deberiamos de tener el validador. Funciona pero lo mejor es tenerlo en otra funcion
        $tabla = "usuario";

        if (!empty($email)) {
            // Llamamos a la función de comprobar email que a su vez esta usando la funcion de comprobar desde usuario d
            $respuesta = Usuariodb::ConsultarporEmail($tabla, $email);


            if ($respuesta) {
                echo "El email ya esta registrado";
                //Te manda mensaje y deberia de hacer algo diferente
            } else {
                echo "El email no esta registrado. Puedes crear el usuario";

                // No me haria falta crear un objeto nuevo de usuario.
                $usuarioDB = new Usuariodb();
                $usuarioDB->CrearUsuario($nick, $email, $nombre, $apellidos, $pass);
                // Crearia una session y cookie. ¿Porque cookie? Porque necesit establecer un tiempo de session o mantenimiento en el caso de que el usuario este y tiempo limitado.
                // Dice que puedo crear una array y luego meterlo en una session. ¿ Al loguearse no deberia crear una session?
                // Una vez se confirma que se ha registrado. Me manda a login para comprobar el login. ! Plus añadir envio de correo!

            }

        }
        Vista::muestraAdministrador();
    }







    ///--------------pagina de update-------------------------------------------------------------
    public static function muestraUpdate()
    {
        // Tengo que verificar si recibo id y poner todos los datos.
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            echo $id;
            // Obtener los datos del usuario
            $datosUsuario = self::ctrId($id);
            //print_r ($datosUsuario);

            if ($datosUsuario) {
                // Pasar los datos a la vista
                include "..\Views\update.php"; // Ahora `update.php` puede usar $datosUsuario directamente.
            } else {
                echo "No se encontró información para el usuario solicitado.";
            }
        } else {

            echo "No he recibido datos del id valido";
        }
        Vista::muestraUpdate();
    }

    // Aqui estamos usando esto para printear con el id

    public static function ctrid($id)
    {

        // Aqui deberiamos de tener el validador. Funciona pero lo mejor es tenerlo en otra funcion
        $tabla = "usuario";
        return Usuariodb::ctrid($tabla, $id);
    }


    public static function muestraActualizacionUser()
    {

        // Aqui iriamos a administrador. Vamos a hacer pruebas primero.
        /// Aqui empezaria a recibir cosas de mi primer formulario de actualizacion.
        /// Una vez recibo los valores. Deberia hacer la query en la cual actualice todo.

        if (isset($_POST['nick']) && !empty($_POST['nick'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $nick = $_POST['nick'];
        }

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $id = $_POST['id'];
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $email = $_POST['email'];
        }
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $nombre = $_POST['nombre'];
        }
        if (isset($_POST['apellidos']) && !empty($_POST['apellidos'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $apellidos = $_POST['apellidos'];
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $pass = $_POST['password'];
        }
        if (isset($_POST['rol']) && !empty($_POST['rol'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $rol = $_POST['rol'];
        }


        // Deberiamos tener algo que lo confirme

        $peticion = Usuariodb::adminActualizarUsers($nick, $email, $nombre, $apellidos, $pass, $rol, $id);

        if ($peticion) {
            // Como ha salido bien. Deberia ir directo a la vista de administrador.

            Vista::muestraAdministrador();
            exit; // Asegurar que no se ejecute más código

        } else {

        }

    }

    public function muestraEliminado()
    {
        // Como ya tengo la información en el formuario. Unicamente activo el boton y recibo el id.
        // Con este id lo que vamos a hacer es realizar un delete.
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $id = $_POST['id'];

            $consulta = Usuariodb::adminEliminarUsers($id);


            if ($consulta) {
                // Como ha salido bien. Deberia ir directo a la vista de administrador y veria la eliminación del usuario.
                Vista::muestraAdministrador();
                exit; // Asegurar que no se ejecute más código
            }
        }


    }


    ///--------------pagina relacionada con los juegos. Carga en la base de datos-------------------------------------------------------------

    public function muestraPaginaJuegos()
    {
        // Es la pagina de Juegos cargada desde el administrador.
        Vista::muestraCargaJuegos();

    }

    public function buscarJuego()
    {
        Vista::muestraCargaJuegos();
        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            // Si se ha enviado el formulario de actualizacion y no esta vacio.
            $titulo = $_POST['titulo'];
            echo $titulo;
            // Aqui deberia instanciar la clase de mi api.
            // Para ello tengo que hacer un required.
            // Instanciar la clase de la API
            $miApi = new MiAPIEjemplo();
            // Debo de obtener la informacion de los juegos.
            $infoJuego = $miApi->getInfoJuego($titulo);
            // Tendria que descodificar el resultado
            $_SESSION['infojuegos'] = $infoJuego;



        }
        // Tengo la variable infojuego con todos los juegos.
        // Ya esta decofigicado en json. Ahora deberia conectar o poder hacer un fecth  a donde tengo la infor




        //print_r($infoJuego);






    }










    // Funciones solo para el index.

    public function muestraHome()
    {
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraHome();
    }

    // Aqui va a ir la funcion del perfil
    public function muestraPerfil()
    {
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraPerfil();
    }
    public function muestraLogin()
    {
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraLogin();
    }
    public function muestraRegistro()
    {
        // Aqui estamos llamando al home por defecto. Empezamos los botones
        Vista::muestraRegistro();
    }

    public function muestraAdministrador()
    {
        // Aqui estamos llamando al home por defecto. Empezamos los botones

        Vista::muestraAdministrador();
    }


    public function muestraCarrito()
    {

        // Aqui estamos llamando al home por defecto. Empezamos los botones

        Vista::muestraCarrito();




    }

    public function muestraCatalogo()
    {

        // Aqui estamos llamando al home por defecto. Empezamos los botones

        $catalogo = new CatalogoController();
        $catalogo->listarCatalogo(null);

    }


    public function filtrarCatalogo($filtro)
    {

        // Aqui estamos llamando al home por defecto. Empezamos los botones

        $catalogo = new CatalogoController();
        $catalogo->listarCatalogo($filtro);

    }

    public function volcarCatalago()
    {

        // Aqui estamos llamando al home por defecto. Empezamos los botones

        $catalogo = new CatalogoController();
        $catalogo->volcarCatalago();

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
    //print_r($_SESSION['usuarioLogueado']);
}

// Control de flujo según las acciones del index.
// cada boton al darle , carga la variable que guarda una funcion , dicha funcion como por ejemplo muestraHome() que es la que se encarga de mostrar la vista de inicio.
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
if (isset($_POST['tmp_inicio_btn_entrar_catalogo'])) {
    $aplicacion->muestraCatalogo();
}
if (isset($_POST['tmp_inicio_btn_entrar_carrito'])) {
    $aplicacion->muestraCarrito();
}
if (isset($_POST['tmp_inicio_btn_entrar_salir'])) {
    session_destroy();
    $aplicacion->muestraHome();
    exit();
}
// ---------------------------------------------------------------------------------------
if (isset($_POST['tmp_catalogo_btn_entrar_home'])) {
    Vista::muestraHome();
}
if (isset($_POST['titulo'])) {
    $aplicacion->filtrarCatalogo($_POST['titulo']);
}
if (isset($_POST['tmp_catalago_btn_volcar'])) {
    $aplicacion->volcarCatalago();
}
if (isset($_POST['tmp_catalogo_btn_aplicar_filtros'])) {
    $titulo = $_POST['catalogo_filtro_titulo'];
    $genero = $_POST['catalogo_filtro_genero'];
    $anyo = $_POST['catalogo_filtro_anyo'];
    $plataforma = $_POST['catalogo_filtro_plataforma'];

    $aplicacion->filtrarCatalogo(new FiltroJuegos($genero, $plataforma, $titulo, $anyo));
}

if (isset($_POST['tmp_catalogo_btn_anadir_carrito'])) {
    $id = $_POST['id'];
    $titulo = $_POST['title'];
    $year = $_POST['year'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $juego = new Juego($id, $titulo, $description, "", $year, $image);

    if (isset($_SESSION['carrito'])) {
        $carrito = unserialize($_SESSION['carrito']);
    } else {
        $carrito = [];

    }

    if (isset($_SESSION['usuarioLogueado'])) {
        Usuariodb::AgregarAlCarrito($_SESSION['usuarioLogueado']['id'], $juego->getId());
        $juego->setPersisted(true);
        foreach ($carrito as $j) {
            if (!$j->isPersisted()) {
                Usuariodb::AgregarAlCarrito($_SESSION['usuarioLogueado']['id'], $j->getId());
                $j->setPersisted(true);
            }
        }
    }

    $carrito[] = $juego;
    $_SESSION['carrito'] = serialize($carrito);



    $catalogo = new CatalogoController();
    $catalogo->listarCatalogo(null);
}


if (isset($_POST['tmp_catalogo_btn_entrar_carrito'])) {
    Vista::muestraCarrito();
}

/*
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    Vista::muestraHome();
}
*/



////-------------------Botones de Registro y Login paginas--------------------------------------///


if (isset($_POST['tmp_inicio_btn_entrar_registro'])) {
    $aplicacion->muestraRegistro();
}

if (isset($_POST['tmp_login_btn_registro'])) {

    $aplicacion->registro();
}

// Boton para tener acceso a login de nuevo y empezaer a recibir los datos

if (isset($_POST['tmp_login_btn_login'])) {

    $aplicacion->login();
}


// Boton para llamar a registro y entrar para las validaciones

if (isset($_POST['tmp_registro_btn_registro'])) {

    $aplicacion->registro();
}


////-------------------Administrador--------------------------------------///

if (isset($_POST['tmp_admin_crear_usuario'])) {

    $aplicacion->admCrearUsuario();
}


if (isset($_POST['tmp_admin_eliminar_usuario'])) {
    $aplicacion->eliminarUsuario();
}

if (isset($_GET['id'])) {
    $aplicacion->muestraUpdate();
}


///------------------UPDATE---------------------------------------------///



// Recibiria el voton eh iria a administrador. Aqui sera mostrar administrador y hacer un update


if (isset($_POST['tmp_update_actualizar_user'])) {

    $aplicacion->muestraActualizacionUser();
}

if (isset($_POST['tmp_update_eliminar_user'])) {

    $aplicacion->muestraEliminado();
}


////------------------------VisualizarJuegos y carga----------------------------------------///


// Viene de Administrador y nos lleva a la pagina de ejemplo Api.

if (isset($_POST['tmp_admin_crearJuegos'])) {
    echo "He entrado desde el administardor.";
    $aplicacion->muestraPaginaJuegos();
}

// Este boton es el boton de busqueda del juego.


if (isset($_POST['tmp_admin_inyectar_juego'])) {
    echo "Boton del juego";
    $aplicacion->buscarJuego();
}






























/*
if (isset($_SESSION['usuarioLogueado'])) {

    $aplicacion ->home();
}
*/

?>