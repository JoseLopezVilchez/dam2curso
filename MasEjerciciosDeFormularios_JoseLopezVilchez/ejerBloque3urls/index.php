<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio bloque 3 urls</title>
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

/*Ejercicio 1 Bloque 3: Recuperar los datos pasados por la URL
Pasar información de una página a otra, utilizando la URL.

Etapa 1
Vamos a comenzar escribiendo un script PHP que muestre la lista de los autores, cada
elemento de la lista tiene un enlace que permite mostrar una página que da la información
detallada sobre el autor.
Indicaciones:
 En un nuevo directorio, copia el script commun.inc.php.
 Crear un index.php que muestre la lista de autores para que el nombre de cada autor
enlace a una página llamada autor.php ; la URL debe contener un argumento llamado
número cuyo valor es igual al número del autor (índice en la tabla $autor).*/

require 'commun.inc.php';

print '<table><thead><tr><th>Autores</th></tr></thead><tbody>';
foreach ($autores as $key => $value) {
    print '<tr><td><a href="autor.php?numero=' . $key . '">' . $value . '</a></td></tr>';
}
print '</tbody></table>';

?>

</body>
</html>