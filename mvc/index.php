<?php

//index.php?controller=Usuario&action=lista

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Default';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($controller == 'Usuario') {
    require('Controller/VerUsuariosController.php');
}



?>