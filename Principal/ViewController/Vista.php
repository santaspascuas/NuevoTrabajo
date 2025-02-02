<?php

class Vista
{


    public static function login()
    {

        include_once "../Views/login.php";
    }

    public static function registro()
    {

        include_once "../Views/registro.php";
    }


    public static function perfil()
    {
        include_once "../Views/perfil.php";
    }


    // FUNCIONES DEL INDEX


    public static function muestraRegistro()
    {
        include_once "../Views/registro.php";
    }

    public static function muestraLogin()
    {
        include_once "../Views/login.php";
    }

    public static function muestraPerfil()
    {
        include_once "../Views/perfil.php";
    }

    public static function muestraHome()
    {
        include_once "../Views/index.php";
    }


    //Funciones ocultas del administrador

    public static function muestraAdministrador()
    {
        include_once "../Views/administrador.php";
    }

    public static function muestraUpdate()
    {
        include_once "../Views/update.php";
    }

    public static function muestraCargaJuegos()
    {
        include_once "../Views/EjemploApi.php";
    }





    public static function muestraCarrito()
    {
        if (isset($_SESSION['usuarioLogueado'])) {
            $juegosAsoc = Usuariodb::obtenerCarrito($_SESSION['usuarioLogueado']['id']);
            $juegos = [];
            if ($juegosAsoc != null) {
                foreach ($juegosAsoc as $juego) {
                    //hay que mapear
                    $juegos[] = new Juego($juego['id'], $juego['titulo'], $juego['descripcion'], $juego['genero'], $juego['anio'], $juego['imagen']);
                }
            }
        } else if (isset($_SESSION['carrito'])) {
            $juegos = unserialize($_SESSION['carrito']);
        } else {
            $juegos = [];
        }
        include_once "../Views/carrito.php";
    }












}












?>