<?php
/*1. Crear un fichero index.php con un enlace para cada uno de los siguientes ejercicios, clasificados por la sección correspondiente.
Los script de los diferentes ejercicios pueden estar en el mismo fichero o en ficheros diferentes,
pero cada uno de ellos se debe ejecutar usando el enlace correspondiente.*/

print '<ul>';
foreach (array_diff(scandir('./php'), array('.', '..')) as $fichero) {
    if ($fichero == 'ej1.php') {
        continue;
    }
    print '<li><a href="?ej=' . $fichero . '">' . $fichero . '</a></li>';
}
print '</ul>';
?>