<?php

require('Model/Conexion.php');

$con = new Conexion();

switch($action){
    case "lista":
        $usuarios = $con->getUsers(); //Llama a la función de obtener la lista de usuarios de la db
        $pageTitle = "Lista de usuarios";
        require('Views/VerUsuariosView.php'); //Muestra a la vista
        break;
    case "insertar":
        //Muestra el formulario de insertar usuarios
        $pageTitle = "Insertar usuario";
        require('Views/InsertarUsuariosView.php');
        break;
    case "crearUsuario":
        $usuarios = $con->crearUsuario();
        require('Views/CrearUsuarioView.php');
        break;
    case "editarUsuario":
        $usuarios = $con->editarUsuario();
        require('Views/EditarUsuarioView.php');
        break;
    case "mostrarUsuario":
        $usuarios = $con->mostrarUsuario();
        require('Views/MostrarUsuarioView.php');
        break;
    case "eliminarUsuario":
        $usuarios = $con->eliminarUsuario();
        require('Views/EliminarUsuarioView.php');
        break;
}
    

?>