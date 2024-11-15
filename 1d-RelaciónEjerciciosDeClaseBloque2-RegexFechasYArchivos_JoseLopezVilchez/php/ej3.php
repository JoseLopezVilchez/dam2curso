<?php

/*3. Usando expresiones regulares, crear un script que elimine las palabras de una cadena que están entre corchetes.
Entrada: “una cadena con palabras [que estan de mas]”
Salida: “una cadena con palabras”*/

$cadena = 'una cadena con palabras [que estan de mas]';

print 'Dada la cadena <span>' . $cadena;

$cadena = preg_replace('/ \[(\b\w+\b ?)*\]/', '', $cadena);

print '</span>, el resultado de eliminar las palabras entre corchetes es <span>' . $cadena . '</span>.';

?>