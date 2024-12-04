<?php

/*
//Autentificacion a lo sucio (esta hardcodeado, algo que no debes hacer)

$user = 'alumno';
$pass = '1234';

if (!isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] == $user && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_PW'] == $pass) {
    header('WWW-Authenticate: Basic realm="EsTech"');
}

var_dump($_SERVER);*/

/*$sentCookie = setcookie('nombre', 'Paco', time()+(30*24*3600)); //mete una cookie

var_dump($_COOKIE);

$sentCookie = setcookie('nombre'); //Sobreescribo (y por tanto elimino) la cookie

print '<br><hr>';
var_dump($_COOKIE);*/

/*$antes = (isset($_COOKIE ['hora'])) ? $_COOKIE ['hora'] : '';

$ok = setcookie('hora', date('H:i:s'));

$despues = (isset($_COOKIE ['hora'])) ? $_COOKIE ['hora'] : '';

$actual = date('H:i:s');

print 'Actual: ' . $actual .  ' - Antes: ' . $antes .  ' - Después: ' . $despues;*/

session_start(); //Crea sesión

$sessionId = session_id(); //Almacena el valor de session id

var_dump($sessionId); //Muestra session id previamente almacenado

session_id('4523452342'); //Cambia el session id por valor introducido



?>