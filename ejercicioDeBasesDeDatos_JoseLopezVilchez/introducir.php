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

/*Indicaciones:
 En un nuevo directorio, copie el script introducir.php desarrollado en el
ejercicio 6.
 Al inicio del script, inserte una instrucción que permita ocultar la
visualización de los errores PHP (durante la fase de pruebas, puede
modificar esta instrucción para mostrar todos los mensajes de error).*/

error_reporting(0);

/* En la estructura de control que comprueba el resultado del filtro de
validación de datos, inicialice una variable $ok a FALSE en caso de error
y TRUE en caso de éxito. En caso de éxito, recupere los valores
introducidos en las variables $apellido y $nombre.*/

if (isset($_POST['ok']) && preg_match('/^[a-zA-Z -]{1,40}$/', $_POST['nombre']) && preg_match('/^[a-zA-Z -]{1,40}$/', $_POST['apellido'])) {
        $autor = $_POST['nombre'] . ' ' . $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $ok = true;
} else {
        $ok = false;
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
}

/* Si la validación de datos es correcta (la variable $ok es true), inserte las
instrucciones que van a permitir guardar el nuevo autor en la base de
datos:
 conectarnos y seleccionar la base de datos;
 preparar la consulta preparada de inserción;
 asociar los argumentos (con las variables $apellido y $nombre);
 ejecutar la consulta preparada.*/

/* En el código anterior, en cada etapa compruebe el resultado de la
instrucción, asigne la variable $ok en consecuencia y ejecute la siguiente
instrucción solo en caso de éxito.

 Cuando termine la inserción del nuevo autor en la base de datos,
compruebe que todo haya ido bien. En caso de éxito, prepare un
mensaje del tipo "nombre apellido guardado con éxito." en la variable
$mensaje y reinicialice las variables $apellido y $nombre.
En caso de error, recupere el mensaje de error MySQL y prepare un
mensaje del tipo "Error durante la ejecución de la consulta (texto del
error MySQL)." en la variable $mensaje.*/

/* Se ha podido producir un error eventual durante la conexión, durante la
preparación de la consulta o después; para recuperar el mensaje de
error, debe determinar en qué etapa se produjo el error, por ejemplo
probando el valor del identificador de conexión y de la consulta, para
llamar a la función correspondiente.*/

if ($ok) {
    $conn = new mysqli('127.0.0.1', 'root', '', 'autores');

    $consulta = 'INSERT INTO `autores` (`apellido`, `nombre`) VALUES ("' . $apellido . '", "' . $nombre . '")';

    $conn->query($consulta);

    if ($conn->connect_error || $conn->error) {
        $ok = false;
        $mensaje = 'Error durante la ejecucion de la consulta: ' . ($conn->connect_error ? ($conn->connect_error . ($conn->error ? (' / ' . $conn->error) : '')) : ($conn->error ? $conn->error : '')) ;
    } else {
        print 'Autor ' . $autor . ' anyadido con exito';
        $nombre = '';
        $autor = '';
    }

    $conn->close();
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
    /* En la página HTML, al final, muestre el contenido de la
    variable $mensaje y después añada un enlace llamado "Ver la lista" a la
    página inicio.php.*/

    if (isset($autor)) {
        print $autor;
    } else {
        print 'Los datos introducidos no son correctos.<br/>';
    }

    print $mensaje;

    ?>
    </h4>
    </article>

</body>
</html>