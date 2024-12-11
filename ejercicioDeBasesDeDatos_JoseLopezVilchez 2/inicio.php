<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor</title>
    <style>
        table, thead, tbody, tr, th, td {
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid black;
            padding: 4px;
        }

        th {
            background-color: rgb(227, 227, 227);
        }
    </style>
</head>
<body>

<?php

/*Etapa 2
Ahora vamos a crear una página que permita mostrar la lista de los autores
guardados en la base de datos.
Indicaciones:
 En el directorio del ejercicio, copie el script inicio.php desarrollado en el
ejercicio 3 y elimine la instrucción que lee la lista de los autores a partir
del archivo.*/

/* Al inicio del script, inserte una instrucción que permita ocultar la
visualización de los errores PHP (durante la fase de prueba, puede
modificar esta instrucción para mostrar todos los mensajes de error).*/

error_reporting(0);

/* A continuación añada las instrucciones que van a permitir leer la lista de
los autores en la base de datos:

 conectarnos y seleccionar la base de datos;
 preparar la consulta de lectura (los autores se deben ordenar por
su nombre);
 asociar las columnas del resultado con las variables $apellido
y $nombre;
 ejecutar la consulta preparada.*/

/* En el código anterior, en cada etapa, compruebe el resultado de la
instrucción y asigne la variable $ok en consecuencia, y ejecute la
siguiente instrucción solo en caso de éxito.*/

/* Después de la ejecución de la consulta de lectura, compruebe que todo
se haya desarrollado correctamente. En caso de error, recupere el
mensaje de error MySQL y prepare un mensaje del tipo "Error durante la
ejecución de la consulta (texto del error MySQL)." en la
variable $mensaje. Se ha podido producir un eventual error durante la
conexión, durante la preparación de la consulta o después; para
recuperar el mensaje de error, debe determinar en qué etapa se ha
producido el error, por ejemplo probando el valor del identificador de
conexión y del identificador de consulta, para llamar a la función
correspondiente.*/

$conn = new mysqli('127.0.0.1', 'root', '', 'autores');

$consulta = 'SELECT nombre, apellido FROM autores ORDER BY nombre ASC;';

$result = $conn->query($consulta);

if ($conn->connect_error || $conn->error) {
    $ok = false;
    $mensaje = 'Error durante la ejecucion de la consulta: ' . ($conn->connect_error ? ($conn->connect_error . ($conn->error ? (' / ' . $conn->error) : '')) : ($conn->error ? $conn->error : '')) ;
} else {
    $ok = true;
}

/* En la página HTML, modifique el código PHP que genera los registros de
la tabla HTML que muestra la lista de autores:
 ejecute el código solo si la ejecución inicial de la consulta se ha
desarrollado correctamente (variable $ok);*/

/* en el bucle, escriba una instrucción que permita leer los diferentes
registros del resultado de la consulta y asigne la variable $ok con el
resultado de la llamada a la función;*/

/* en el registro de la tabla, muestre el nombre del autor en forma
"nombre (apellido)" (utilice las variables $apellido y $nombre
normalmente relacionado con las columnas del resultado de la
consulta);*/

/* después del bucle de lectura del resultado de la consulta, rellene la
variable $numero_autores con el número de registros extraídos;*/

/* en caso de error durante la extracción, prepare un mensaje del tipo
"Error durante la lectura de los autores (resultado parcial)." en la
variable $mensaje;
 en caso contrario, si la consulta no devuelve ningún registro,
prepare un mensaje del tipo "No hay ningún autor en la base de
datos." en la variable $mensaje;*/

/* Adicionalmente, añada el código que permite no mostrar del todo la tabla
si está vacía. La dificultad está en que la línea del título de la tabla se
muestra antes de que se conozca el resultado. Para resolver este
problema, es posible utilizar un poco de código JavaScript.*/

if ($ok && $result->num_rows > 0) {

    print '<table><thead><tr><th>Autores</th></tr></thead><tbody>';
    $numero_autores = $result->num_rows;

    while ($autor = $result->fetch_assoc()) {

        if ($autor['nombre'] == '' || $autor['apellido'] == '') {
            $mensaje = 'Error durante la lectura de los autores (resultado parcial).';
        } else {
            print '<tr><td>' . $autor['nombre'] . ' (' . $autor['apellido'] . ')</td></tr>';
        }
        
    }
    print '</tbody></table>';
} else { $mensaje = 'No hay ningún autor en la base de datos.'; }

/* Para terminar, muestre el contenido de la variable $mensaje y después
añada un enlace llamado "Introducir un nuevo autor" a la
página introducir.php.*/

print $mensaje . '<br/>';
print '<a href="./introducir.php">Introducir un nuevo autor</a>';

?>

</body>
</html>