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

/*Etapa 2
Ahora vamos a escribir el script PHP que se llama en la página.
Indicaciones:
 Crea un nuevo script PHP llamado autor.php.
 En este script, inserta una sección de código PHP que debe incluir el script
commun.inc.php, recuperando el número del autor que se pasa en la URL, y a
continuación el nombre del autor correspondiente en la tabla $autores.
 Añade el código HTML de la página llamada “Autor” y muestra el nombre del autor en
una etiqueta <h1> (en una versión más completa, esta página se utilizará para mostrar
la información detallada sobre el autor).
 Añade también un enlace "Volver a la lista" que permita volver a la página index.php.*/

require 'commun.inc.php';
?>

<div>
    <h1><?php print $autores[$_GET['numero']] ?></h1>
    <a href="index.php">Volver a la lista</a>
</div>

</body>
</html>