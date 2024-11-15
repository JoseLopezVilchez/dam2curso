<?php

/* 1 - Programar un script que devuelva los elementos que faltan en un array. Usar las funciones array_diff y range. Ejemplo: [1,2,3,6,7,8] debe devolver:
	Array(                                                                                    
		[3] => 4                                                                         
		[4] => 5)
*/

function encuentraFaltantes($array) {
    return array_diff($array, range(min($array), max($array)));
};

print "Ej 1: usando el ejemplo ofrecido por el ejercicio, el resultado es: " . encuentraFaltantes([1,2,3,6,7,8]) . ".<br/><br/>";

// 2 - Extraer de una cadena en formato dd/mm/yyyy, el día, mes y año. Hacerlo en máximo 2 líneas de código y no usar funciones de fecha.

$fecha = '08/12/1920';
print "Ej 2: Dia " . explode('/', $fecha)[0] . " Mes " . explode('/', $fecha)[1] . " Anyo " . explode('/', $fecha)[2] . ".<br/><br/>";

// 3 - Usar implode para mostrar una lista HTML desordenada a partir de él, en cada elemento de la lista debe aparecer 1 alumno.

$array = ["Alumno A", "Alumno B", "Alumno C", "Alumno D", "Alumno E", "Alumno F"];
print "Ej 3:</br><ul><li>" . implode('</li><li>', $array) . "</li></ul><br/><br/>";

/* 4 - Queremos realizar un explode múltiple(es decir, que se llame a explode solo 1 vez) en la siguiente cadena, indicando que se divida según estos caracteres:
coma (,) punto (.), barra vertical (|) y dos puntos (:).*/
$cadena = "primera parte de la cadena: esta cadena pertenece, al ejercicio número 2. 	esta es la | parte final :)";

print "Ej 4: ";
print_r(preg_split('/[,.|:]+/', $cadena));
print "<br/><br/>";

// 5 - Crear un script que devuelva la clave más alta de un array asociativo, ya sea un entero o una cadena.

$asociativo = [
	"ejemplo1" => "blah",
	"ejemplo2" => "blergh",
	"ejemplo3" => "hya",
	"alelujah" => "blorble",
	"zozozo" => "merk"
];

print "Ej 5: pasando el siguiente array asociativo: ";
print_r($asociativo);
print ", la clave más alta es: '" . max(array_keys($asociativo)) . "'.<br/><br/>";

// 6 - Usar la función array_map para convertir a mayúsculas todas las cadenas en un array de cadenas.

print "Ej 6: pasando el siguiente array: ";
print_r($array);
print ", las cadenas resultantes en mayusculas serian: ";
print_r(array_map(function($val) {
	return strtoupper($val);
}, $array));
print "<br/><br/>";

// 7 - Crear un script que devuelva si todos los valores de un array son cadenas usando la función array_map.

$array = ["ejemplo", 1];
$sonCadenas = true;

array_map(function($val) use (&$sonCadenas) {
	if (!is_string($val)) {
		$sonCadenas = false;
	}
} , $array);

print "Ej 7: pasando el siguiente array: ";
print_r($array);
print ", el resultado de la pregunta de si todos los elementos del array son cadenas es: " . ($sonCadenas ? "SI" : "NO") . ".<br/><br/>";

// 8 - Crear un script para calcular y mostrar la temperatura media, y las 5 temperaturas más bajas y más altas de una secuencia como esta almacenada en un string:
$temps = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73";

function media ($str) {
	$str = explode(', ', $str);

	$total = 0;
	foreach ($str as $valor) {
		$total += (Int) $valor;
	}

	return $total / count($str);
}

function cincoAltas ($str) {
	$str = explode(', ', $str);
	rsort($str);

	return implode(', ', [
		$str[0],
		$str[1],
		$str[2],
		$str[3],
		$str[4]
	]);
}

function cincoBajas ($str) {
	$str = explode(', ', $str);
	sort($str);

	return implode(', ', [
		$str[0],
		$str[1],
		$str[2],
		$str[3],
		$str[4]
	]);
}

print "Ej 8: Dadas las siguientes temperaturas: " . $temps . ", la media es: " . media($temps) . "; las 5 temperaturas mas bajas son: " . cincoBajas($temps) . "; y las cinco temperaturas mas altas son: " . cincoAltas($temps) . ".<br/><br/>";

/* 9 - Crear un script que extraiga el nombre de archivo de cualquier url con esta estructura:
		Entrada: www.dominio.com/htdocs/pagina.php
		Salida: pagina.php
*/
$entrada = 'www.dominio.com/htdocs/pagina.php';

print "Ej 9: dada la siguiente url: " . $entrada . ", el archivo es: " . end(explode('/', $entrada)) . ".<br/><br/>";

/* 10 - Crear un script que extraiga de una url de una tienda online, el producto que se está consultando:	
		Entrada: http://www.mitienda.com/product-category/iphone?orderby=popularity
		Salida: iphone
*/
$entrada = 'http://www.mitienda.com/product-category/iphone?orderby=popularity';

print "Ej 10: dada la siguiente url: " . $entrada . ", el producto siendo buscado es: " . end(explode('/', explode('?', $entrada)[0])) . ".<br/><br/>";

/* 11 - Insertar una palabra entre otras 2 palabras indicadas de un string:
		Entrada: 'Escuela Estech, Linares'
		Cadena a insertar entre Escuela y Estech: 'de Tecnologías'
		Salida: 'Escuela de Tecnologías Estech, Linares'
*/
$entrada = 'Escuela Estech, Linares';
print "Ej 11: dada la siguiente frase: '" . $entrada;

$entrada = explode(' ', $entrada);
$entrada[0] = $entrada[0] . ' de Tecnologias';

print "', y debiendo insertar 'de Tecnologias', el resultado es: '" . implode(' ', $entrada) . "'.<br/><br/>";

/* 12 - Escribir un script que extraiga de una url el host, el path y el esquema (http, ftp etc..)
Entrada: https://www.dominio.com/descargas/archivo1.pdf
	Ejemplo de salida: 
		Esquema : https ;  	Host : www.dominio.com; 	Path : /descargas/archivo1.pdf
*/

$entrada = 'https://www.dominio.com/descargas/archivo1.pdf';
$entrada = explode('/', $entrada);
$entrada = array_filter($entrada);
$entrada = array_values($entrada);

$path = '';
for ($i = 2; $i < count($entrada); $i++) {
	$path = $path . '/' . $entrada[$i];
}

print "Ej 12: dada la siguiente url: " . $entrada . ", el host es: " . $entrada[1] . ", el esquema es: " . str_replace(':', '', $entrada[0]) . ", y el path es: " . $path . ".<br/><br/>";

/* 13 - Crear un array con los nombres de los alumnos y otro con sus apellidos, de tal forma que en la primera posición de un array salga el nombre de un alumno,
y en la primera posición del otro array, esté su apellido. 
    * Usando array_combine fusionar los 2 en un array asociativo, mostrar el array para comprobarlo.
    * Mostrar en un string todos los nombres usando alguna función de arrays.
    * Mostrar en un string todos los apellidos usando alguna función de arrays.
    * Usando la función array_flip, pon en las claves los apellidos y en los valores los nombres.
    * Usando array_filter, mostrar aquellos nombres cuya longitud sea inferior a 8.
    * Usando array_filter, mostrar aquellos apellidos cuya longitud sea inferior a 8.
    * Usando alguna otra función de arrays, mostrar en una columna los apellidos.
*/

$nombres = ["Nombre0", "Nombre1", "Nombre2", "Nombre3", "Nombre4"];
$apellidos = ["Apellido0", "Apellido1", "Apellido2", "Apellido3", "Apellido4"];

$combinado = array_combine($nombres, $apellidos);

print "Ej 13: los nombres son: " . implode(', ', array_keys($combinado)) . '; ';
print "los apellidos son: " . implode(', ', array_values($combinado)) . '; ';

$combinado = array_flip($combinado);

print 'el nombre japonés seria ' . implode(', ', array_keys($combinado)) . ' ' . implode(', ', array_values($combinado)) . '; ';
print 'los nombres de menos de 8 caracteres son ' . implode(', ', array_filter(array_values($combinado), function($val) {return strlen($val) < 8;})) . '; ';
print 'los apellidos de menos de 8 caracteres son ' . implode(', ', array_filter(array_keys($combinado), function($val) {return strlen($val) < 8;})) . ';<br/>';
foreach (array_keys($combinado) as $val) {
    print $val . "<br/>";
}
print '<br/>';

// 14 - Dado este array que contiene una serie de banners y su descripción:
$tabBanners = array (
1 => array('http://www.su_site.com','https://picsum.photos/seed/picsum/400/200','Descripción 1'),
2 => array('http://www.su_site2.com','https://picsum.photos/seed/picsum/400/300','Descripción 2'),
3 => array('http://www.su_site3.com','https://picsum.photos/seed/picsum/400/250','Descripción 3')
);

/*Crear un script que tome uno de esos banners aleatoriamente y escriba una imagen html enlazada al sitio de la primera posición del array,
que muestre la imagen de la segunda posición, y en cuyo atributo alt y title estén la descripción contenida en la tercera posición del array.*/
$rando = rand(1, 3);

print 'Ej 14: <a href="' . $tabBanners[$rando][0] . '"><img src="' . $tabBanners[$rando][1] . '" alt="' . $tabBanners[$rando][2] . '" title="' . $tabBanners[$rando][2] . '"/></a>';

?>