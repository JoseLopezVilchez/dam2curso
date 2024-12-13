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
    case "guardar":
        //Guarda la información del nuevo usuario
        // $result = $con->insertUser();
        break;
    case "crearUsuario":
        
        break;
    case "editarUsuario":
        
        break;
    case "mostrarUsuario":
        
        break;
    case "eliminarUsuario":
        
        break;
}
    

?>