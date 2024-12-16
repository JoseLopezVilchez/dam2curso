<?php
// Create Reat Update Delete
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
        $actionForm = "guardar";
        require('Views/InsertarUsuariosView.php');
        break;

    case "guardar":
        //Guarda la información del nuevo usuario
        if(isset($_POST['username']) && $_POST['username'] != "" 
            && isset($_POST['nombre']) && $_POST['nombre'] != "" 
            && isset($_POST['password']) && $_POST['password'] != "" 
            && isset($_POST['email']) && $_POST['email'] != ""){
            $result = $con->insertUser($_POST['username'], $_POST['nombre'], $_POST['password'], $_POST['email']);

            if($result === TRUE){
                header('Location: index.php?controller=Usuario&action=lista&msgError=Se ha registrado el usuario ' . $_POST['username']);
            }else{
                header('Location: index.php?controller=Usuario&action=lista&msgError=No se ha podido registrar el usuario');
            }
        }else{
            //Vuelve a la vista de insertar usuario
            header('Location: index.php?controller=Usuario&action=insertar&msgError=Es necesario rellenar todos los datos');
        }
        
        break;

    case "editar":
        $usuario = $con->getUser($_GET['id']);
        $pageTitle = "Editar usuario";
        $actionForm = "actualizar";
        require('Views/InsertarUsuariosView.php');

        break;

    case "actualizar":
        if(isset($_POST['username']) && $_POST['username'] != "" 
            && isset($_POST['nombre']) && $_POST['nombre'] != "" 
            && isset($_POST['password']) && $_POST['password'] != "" 
            && isset($_POST['email']) && $_POST['email'] != ""){
            
            $result = $con->updateUser($_POST['userId'], $_POST['username'], $_POST['nombre'], $_POST['password'], $_POST['email']);

            if($result === TRUE){
                header('Location: index.php?controller=Usuario&action=lista&msgError=Se ha actualizado el usuario ' . $_POST['username']);
            }else{
                header('Location: index.php?controller=Usuario&action=lista&msgError=No se ha podido actualizar el usuario');
            }
        }else{
            //Vuelve a la vista de insertar usuario
            header('Location: index.php?controller=Usuario&action=insertar&msgError=Es necesario rellenar todos los datos');
        }

        break;

    case "eliminar":
        if(isset($_GET['id'])){
            $res = $con->deleteUser($_GET['id']);

            if($res === TRUE){
                header('Location: index.php?controller=Usuario&action=lista&msgError=Se ha eliminado el usuario con id ' . $_GET['id']);
            }else{
                header('Location: index.php?controller=Usuario&action=lista&msgError=No se ha podido eliminar el usuario');
            }
        }

        break;
}
    

?>