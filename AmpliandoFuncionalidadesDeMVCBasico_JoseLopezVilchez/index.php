<?php

// ?controller=Usuario&action=lista

$controller = isset($_GET['controller']) ? $_GET['controller'] : "Usuario";
$action = isset($_GET['action']) ? $_GET['action'] : "lista";

if($controller == "Usuario"){
    require('Controller/VerUsuariosController.php');
}





?>