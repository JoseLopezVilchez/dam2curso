<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir</title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        article {
            text-align: left;
            padding-top: 5px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            border: 2px solid black;

            h2 {
                margin: 0px;
                margin-bottom: 4px;
            }

            form {
                display: flex;
                flex-direction: column;
                
                div {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;

                    label {
                        margin-right: 5px;
                    }

                    input {
                        width: 300px;
                    }
                }

                #guardar {
                    width: 80px;
                    height: 30px;
                    margin-top: 10px;
                }
            }
        }
    </style>
</head>
<body>

<?php

    /*
        Etapa 1

        Vamos a empezar utilizando un filtro para comprobar los datos introducidos en el formulario y
        adaptar el mensaje mostrado después de guardarlos.

        Indicaciones:

         En un nuevo directorio, copia el script introducir.php desarrollado en el ejercicio 2.

         Define un filtro de tipo expresión regular que permita verificar que el apellido y el
        nombre solo contienen letras, espacios y guiones, con una longitud comprendida entre
        1 y 40 caracteres. En caso de error, el filtro debe devolver NULL en lugar de FALSE.

         Utiliza este filtro para verificar los datos introducidos en los campos "Apellido" y
        “Nombre” del formulario.

         Si son correctos, recupera los valores filtrados para guardar la variable $autor.

         Si no son correctos, muestra en el formulario un mensaje del tipo "Los datos
        introducidos no son correctos.", en lugar del nombre del autor que se muestra en caso
        de éxito.

        Etapa 2

        Deseamos mejorar la solución anterior y dejar los datos introducidos del usuario en los campos
        del formulario en caso de error para que los pueda corregir sin tener que volver a introducirlos.
        Indicaciones:

         Al inicio del script, inicializa dos variables $apellido y $nombre con cadenas vacías.

         Utiliza estas dos variables para volver a asignar el valor de los campos del formulario
        (atributo value).

         Si los datos introducidos no son correctos, alimenta las variables $apellido y $nombre
        con los valores introducidos de nuevo por el usuario. Comprueba que estos valores se
        "limpian" correctamente para poder mostrarse sin riesgo en los campos del formulario
        (se puede utilizar un filtro SANITIZE para esto). Si los datos introducidos son correctos,
        comprueba que los campos del formulario están vacíos.
    */

    if (isset($_POST['ok']) && preg_match('/^[a-zA-Z -]{1,40}$/', $_POST['nombre']) && preg_match('/^[a-zA-Z -]{1,40}$/', $_POST['apellido'])) {
        $autor = $_POST['nombre'] . ' ' . $_POST['apellido'];
        $nombre = '';
        $apellido = '';
    } else {
        $apellido = htmlspecialchars($_POST['apellido']);
        $nombre = htmlspecialchars($_POST['nombre']);
    }

    ?>

<article>
    <h2>Apellido y nombre del nuevo autor:</h2>

    <form action="introducir.php" method="post">
        <div>
            <label for="apellido">Apellido</label><input id="apellido" name="apellido" type="text" maxlength="40" value="<?php print $apellido ?>"/>
        </div>
        <div>
            <label for="nombre">Nombre</label><input id="nombre" name="nombre" type="text" maxlength="40" value="<?php print $nombre ?>"/>
        </div>
        
        <input id="guardar" name="ok" type="submit" value="Guardar"/>
    </form>

    <h4>
    <?php
    if (isset($autor)) {
        print $autor;
    } else {
        print 'Los datos introducidos no son correctos';
    }
    ?>
    </h4>
    </article>

</body>
</html>