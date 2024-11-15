<?php
/*Ejercicios con expresiones regulares, funciones de fechas y archivos

2. Usando expresiones regulares, crear un script que elimine la última palabra de una cadena.*/

$cadena = 'Ow! - Cha! - Shoo-ca-choo-ca - As he came into the window - Was a sound of a crescendo - He came into her apartment';

print 'Dada la cadena <span>' . $cadena;

$cadena = preg_replace('/ \b\w+\b$/', '', $cadena);

print '</span>, el resultado de eliminar la ultima palabra es <span>' . $cadena . '</span>.';

?>