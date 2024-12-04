<?php

require('Model/Conexion.php');

$con = new Conexion();

switch ($action) {
    case 'lista':
        $pageTitle = 'Lista de usuarios';
        $usuarios = $con->getUsers();
        require('Views/VerUsuariosView.php');
        break;
    case 'insertar':
        $pageTitle = 'Insertar usuario';
        //Muestra formulario de insertar usuario
        //require('Views/InsertarUsuariosView.php');
        break;
    case 'guardar':
        //Guarda la informacion dle nuevo usuario
        // $result = $con->insertUser();
        break;
    default:
        break;
}



?>