<?php

/*Ejercicio 1: Extracción de números
Dada una cadena de texto que contiene tanto letras como números, escribe una función que use preg_match_all() para extraer todos los números presentes en la cadena y devolverlos en un array.*/

$cadena1 = 'blahblah 0 12 34 ejemplo56 78ejemplo blah9blah';

preg_match_all('/\d+/', $cadena1, $coincidencias);

print 'Ej 1: dada la cadena ' . $cadena1 . ', los numeros contenidos son: ' . implode(' / ', $coincidencias[0]) . '.<br/><br/>';

/*Ejercicio 2: Reemplazo de espacios múltiples
Escribe una función que use preg_replace() para reemplazar todos los espacios múltiples en una cadena por un solo espacio.*/

$cadena2 = 'L   o   n   g   :)';

print 'Ej 2: dada la cadena <pre style="display:inline;">' . $cadena2 . '</pre>, la cadena resultante limpiada de espacios es: ' . preg_replace('/ {2,}/', ' ', $cadena2) . '.<br/><br/>';

/*Ejercicio 3: Remover etiquetas HTML
Dada una cadena que contiene HTML, escribe una función que use preg_replace() para eliminar todas las etiquetas HTML.*/

$cadena3 = '<div><h1>Ejemplo</h1><p>Blah blah blah</p>';

print 'Ej 3: dada la cadena ' . $cadena3 . ', el resultado de eliminar todas las etiquetas html es: ' . preg_replace('/<[^>]*>/', '', $cadena3) . '.<br/><br/>';

/*Ejercicio 4: Validación de contraseña
Escribe una función que valide si una contraseña es válida utilizando preg_match(). Las contraseñas válidas deben tener:

Al menos 8 caracteres.
Al menos una letra mayúscula.
Al menos una letra minúscula.
Al menos un número.
Al menos un carácter especial (por ejemplo, @, #, !, etc.).*/

$cadena4 = '1234567aA#';
$regex = [
    '/^.{8,}$/',
    '/[A-Z]+/',
    '/[a-z]+/',
    '/\d+/',
    '/\W+/'
];

$comprobador = true;
foreach ($regex as $r) {
    if (!preg_match($r, $cadena4)) {
        $comprobador = false;
        break;
    }
}

print 'Ej 4: dada la cadena ' . $cadena4 . ', ¿es una contrasenya valida?: ' . ($comprobador ? '¡Si!' : '¡No!') . '.<br/><br/>';

/*Ejercicio 5: Extraer hashtags de un texto
Dado un texto que contiene hashtags (por ejemplo, #programación, #php), crea una función que use preg_match_all() para extraer todos los hashtags de la cadena y devolverlos en un array.
Pista: Un hashtag comienza con # seguido de una o más letras o números.*/

$cadena5 = 'iufhsiuhf dhuahuda uihduadhauw awhudaid #programación, #php jsifs #hashtag';

preg_match_all('/#[\wáéíóúñÑ-]+/', $cadena5, $coincidencias);

print 'Ej 5: dada la cadena ' . $cadena5 . ', los hashtags son: ' . implode(' / ', $coincidencias[0]) . '.<br/><br/>';

/*Ejercicio 6: Validación de nombres de usuario
Escribe una función que valide un nombre de usuario. Debe tener entre 5 y 15 caracteres, solo letras y números, y comenzar con una letra.*/

$cadena6 = 'CarlitohReshulo';

print 'Ej 6: dada la cadena ' . $cadena6 . ', ¿es el nombre de usuario valido?: ' . (preg_match('/^[a-zA-Z]\w{4,14}$/', $cadena6) ? '¡Si!' : '¡No!') . '.<br/><br/>';

/*Ejercicio 7: Extracción de palabras que empiezan con vocales
Escribe una función que extraiga todas las palabras que comienzan con una vocal en una cadena de texto.*/

$cadena7 = 'aoigjdgj nbfnf oaiwja Opa aPo 1a42j';

preg_match_all('/\b[aeiouAEIOU]\w*\b/', $cadena7, $coincidencias);

print 'Ej 7: dada la cadena ' . $cadena7 . ', las palabras que empiezan por vocales son: ' . implode(' / ', $coincidencias[0]) . '.<br/><br/>';

/*Ejercicio 8: Reemplazo de todas las vocales por asteriscos
Escribe una función que reemplace todas las vocales (tanto mayúsculas como minúsculas) en una cadena de texto por un asterisco (*).*/

$cadena8 = 'AhaO0UulEá mIi0nIed0';

print 'Ej 8: dada la cadena ' . $cadena8;

$cadena8 = preg_replace('/[aeiouAEIOU]/', '*', $cadena8);

print ', el texto con las vocales sustituidas por asteriscos es: ' . $cadena8 . '.<br/><br/>';

/*Ejercicio 9: Remover todas las letras mayúsculas
Escribe una función que elimine todas las letras mayúsculas de una cadena de texto.*/

$cadena9 = 'ShYoJlGa MmGuJnDdUo';

print 'Ej 9: dada la cadena ' . $cadena9;

$cadena9 = preg_replace('/[A-Z]/', '', $cadena9);

print ', el texto sin mayusculas es: ' . $cadena9 . '.<br/><br/>';

/*Ejercicio 10: Validación de direcciones MAC
Escribe una función que valide una dirección MAC. Una dirección MAC válida tiene el formato XX:XX:XX:XX:XX:XX, donde XX son dos caracteres hexadecimales (0-9, A-F).*/

$cadena10 = '09:AB:CD:69:34:EF';

print 'Ej 10: dada la cadena ' . $cadena10 . ', ¿es una direccion MAC valida?: ' . (preg_match('/^([0-9A-F]{2}\:){5}[0-9A-F]{2}$/', $cadena10) ? '¡Si!' : '¡No!') . '.<br/><br/>';

/*Ejercicio 11: Reemplazo de números por su valor al cuadrado
Escribe una función que encuentre todos los números en una cadena y los reemplace por su valor al cuadrado.*/

$cadena11 = '2 5 10 papa frita 4pe pe4 pe4pe';

print 'Ej 11: dada la cadena ' . $cadena11;

$cadena11 = preg_replace_callback('/[0-9]+/', function($coincidencia) {
    return (Int) $coincidencia[0] == 0 ? 'CeroPorCero' : (Int) $coincidencia[0] ** 2;
}, $cadena11);

print ', el texto con sus numeros elevados al cuadrado es: ' . $cadena11 . '.<br/><br/>';

/*Ejercicio 12: Validación de archivos con extensión .jpg o .png
Escribe una función que valide si un nombre de archivo tiene una extensión .jpg o .png.*/

$cadena12 = 'ejemplo.trozoparadarporsaco.png';

print 'Ej 12: dada la cadena ' . $cadena12 . ', ¿tiene una extension jpg o png?: ' . (preg_match('/^[\w.]+\.(jpg|png)$/', $cadena12) ? '¡Si!' : '¡No!') . '.<br/><br/>';

?>