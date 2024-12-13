<?php

class Conexion{
    
    private $con;

    public function __construct(){
        $this->con = new mysqli('localhost', 'root', '', 'mvc_users');
    }

    public function getUsers(){
        $query = $this->con->query('SELECT username, nombre FROM usuarios');

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function crearUsuario () {
        $query = $this->con->query('');

        return $query;
    }

    public function editarUsuario () {
        $query = $this->con->query('');

        return $query;
    }

    public function mostrarUsuario ($id) {
        $query = $this->con->query('SELECT username, nombre FROM usuarios WHERE username=' . $id . ';');

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function eliminarUsuario () {
        $query = $this->con->query('');

        return $query;
    }

}


?>