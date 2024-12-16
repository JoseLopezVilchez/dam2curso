<?php

class Conexion{
    
    private $con;

    public function __construct(){
        $this->con = new mysqli('localhost', 'root', '', 'mvc_users');
    }

    public function getUsers(){
        $query = $this->con->query('SELECT id, username, nombre FROM usuarios');

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function getUser($userId){

        $query = $this->con->query("SELECT * FROM `usuarios` WHERE `id` = $userId");

        $usuario = $query->fetch_assoc();

        return $usuario;
    }

    public function insertUser($username, $nombre, $password, $email){
        $query = $this->con->query("INSERT INTO `usuarios` VALUES (NULL, '$username', '$nombre', '$email', '$password')");

        return $query;
        
    }


    public function updateUser($id, $username, $nombre, $password, $email){
        $query = $this->con->query("UPDATE `usuarios` SET `username` = '$username', `nombre` = '$nombre', `pass` = '$password', `email` = '$email' WHERE `id` = $id");

        return $query;
    }

    public function deleteUser($id){
        $query = $this->con->query("DELETE FROM `usuarios` WHERE `id` = $id");

        return $query;
    }


}


?>