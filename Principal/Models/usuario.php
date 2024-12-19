<?php



class UsuarioNuevo{

   
    private $email;
    private $nombre;
    private $nick;
    private $password;
    private $apellidos;
    private $via;
    private $nombrevia;
    private $numero;
    private $telefono;


    public function __construct($email,$nombre,$password,$apellidos,$via,$nombrevia,$numero,$telefono,$nick) {
        $this->email=$email;
        $this->nombre=$nombre;
        $this->password=$password;
        $this->apellidos=$apellidos;
        $this->via=$via;
        $this->nombrevia=$nombrevia;
        $this->numero=$numero;
        $this->telefono=$telefono;
        $this->nick=$nick;
        echo "Constructor inicializado.\n";
    }
    
        // Método para mostrar las propiedades como texto
        public function __toString() {
            return "Usuario: {$this->nombre}, Email: {$this->email}";
        }




    
    



}























?>