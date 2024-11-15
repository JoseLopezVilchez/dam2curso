<?php

/*Ejercicios con funciones de archivos

8. Crear un script que recorra todas las imágenes de la carpeta "img" y escriba en un archivo de texto su nombre y tamaño, cada uno en una columna.
Además, mostrar por pantalla cada imagen junto con su nombre.*/
//9. Ampliar el ejercicio anterior para que realice una copia de ese directorio en otro llamado copiaseg, dentro de la misma carpeta.

//Este ejercicio es un poco mas jodido, asi que lo voy a comentar un poco

$contenido = array_values(array_diff(scandir('img'), array('.', '..'))); //Escanea directorio con imagenes -> limpia archivos llamados . y .. -> quito indices vacios
mkdir('copiaseg'); //creo directorio de copia

print 'El archivo es visible via el menu superior. Imprimiendo imagenes y nombres:<br/><div class="imagenes">';
$datosAEscribir = array_map(function($i) { //esto es como un .map() de swift, lo aprovecho para crear el archivo de texto e imprimir
    $ruta = 'img/' . $i; //ruta de las imagenes, luego usada junto a sus nombres
    print '<div><h5>' . $i . '</h5><img src="' . $ruta . '"></div>'; //Imprime lo que pide el ejercicio
    copy($ruta, 'copiaseg/' . $i); //copia dentro de carpeta de 'seguridad'
    return 'nombre : ' . $i . ' - tamanyo : ' . (is_file($ruta) ? filesize($ruta) : 0) . " Bytes\n"; //pasa todo a string para poder escribirlo en el txt
}, $contenido);
print '</div>';

file_put_contents('php/imagedata.txt', $datosAEscribir); //sobreescribe si existe, no tiene flag de ir anyadiendo mas texto

?>