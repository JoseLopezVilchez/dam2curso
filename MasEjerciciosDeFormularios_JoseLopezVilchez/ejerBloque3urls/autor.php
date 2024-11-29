<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor</title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div {
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 2px solid black;

            h1 {
                margin: 0px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<?php

/*
Ejercicio 3 Bloque 3: controlar los datos que se pasan por la URL

Indicaciones:

 En un nuevo directorio, copia los scripts commun.inc.php, index.php y autor.php
desarrollados en el ejercicio 2.

 En el script autor.php, alimenta la variable $autor con el nombre del autor, únicamente
si el número que se pasa en la URL es un entero y este número se corresponde con un
número de un autor (índice en la tabla $autores).

 En la página HTML, muestra el nombre del autor si está definido o "Autor no existente"
en caso contrario.

 Comprueba el script modificado llamándolo directamente en su navegador con
diferentes casos: autor.php (sin argumento), autor.php?numero (argumento vacío),
autor.php?numero=abc (argumento de tipo incorrecto), autor.php?numero=99
(número que no existe) y autor.php?numero=0 (argumento correcto).
*/

require 'commun.inc.php';
?>

<div>
    <h1><?php print (is_numeric($_GET['numero']) && array_key_exists($_GET['numero'], $autores)) ? $autores[$_GET['numero']] : 'Autor no existente' ?></h1>
    <a href="index.php">Volver a la lista</a>
</div>

</body>
</html>