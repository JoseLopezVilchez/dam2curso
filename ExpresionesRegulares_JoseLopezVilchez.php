<?php

//1. Valida si una cadena es un número entero.

$cadena = 'CadenablerghA';

print 'Ej 1: es la cadena "' . $cadena . '" un numero entero?: ' . (preg_match('/^[0-9]+$/', $cadena) ? '¡Si!' : '¡No!') .  "<br/><br/>";

//2. Comprueba si una cadena empieza por una letra minúscula.

print 'Ej 2: empieza la cadena "' . $cadena . '" por una letra minuscula?: ' . (preg_match('/^[a-z]/', $cadena) ? '¡Si!' : '¡No!') .  "<br/><br/>";

//3. Comprobar que una cadena no termina con la letra a (mayúscula o minúscula).

print 'Ej 3: termina la cadena "' . $cadena . '" por la letra "a" (mayuscula o minuscula)?: ' . (preg_match('/[aA]$/', $cadena) ? '¡Si!' : '¡No!') .  "<br/><br/>";

//4. Validar si una cadena es un número de teléfono internacional (+34953636000)
//Un número de teléfono internacional se compone por un signo +, seguido de 2 o 3 números que indican el país y 9 o 10 números más que indican el número de teléfono nacional.

$tlf = '+34953636000';

print 'Ej 4: es la cadena "' . $tlf . '" un telefono internacional?: ' . (preg_match('/^\+[0-9]{2,3}[0-9]{9,10}$/', $tlf) ? '¡Si!' : '¡No!') .  "<br/><br/>";

//5. Validar si una cadena es una dirección válida de correo electrónico. 
/*
El nombre de usuario puede contener letras, números y los signos ._-
El dominio como mínimo debe contener 2 caracteres (letras, números y ._-) un punto y entre 2 y 4 caracteres de la extensión.
(Opcional: que acepte también dominios del tipo .com.es o .online)
*/

$correo = 'randomnegaposi@gobble.kom';

print 'Ej 5: es la cadena "' . $correo . '" una direccion de correo electronico valida?: ' . (preg_match('/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]{2,}\.[a-z]{2,4}$/', $correo) ? '¡Si!' : '¡No!') .  "<br/><br/>";

//6. Validar si una cadena contiene una dirección IP v4 válida

$cadena = '100.255.255.255';

$iparray = explode('.', $cadena);
$esValida = count($iparray) == 4;
foreach ($iparray as $key => $value) {
    if (!preg_match('/^(25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)$/', $value)) { //TODO hay partes que salen como verdaderas cuando son falsas
        $esValida = false;
    }
}

print 'Ej 6: es la cadena "' . $cadena . '" una direccion IPv4 valida?: ' . ($esValida ? '¡Si!' : '¡No!') .  "<br/><br/>";

//7. Validar si una cadena es una ruta de archivo válido de Windows (Ejemplo: C:\documentos\p.pdf)

$cadena = 'C:\documentos\p.pdf';
print 'Ej 7: es la cadena "' . $cadena . '" una ruta de archivo valido en windows?: ';

$esValida = (substr($cadena, -1) !== '.' && strlen($cadena) < 255);

$cadena = explode('\\', $cadena);

$patron = '/^[a-zA-Z1-9]{1,255}$/';

if ($esValida) {
    
    foreach ($cadena as $key => $value) {
    
        if (empty($value) || strlen($value) > 255) {
            $esValida = false;
            break;
        }
        if ($key == 0) {
            if (!(preg_match('/^[A-Z]{1}:$/', $value) || preg_match('/^[.]{1,2}$/', $value) || preg_match($patron, $value))) {
                $esValida = false;
                break;
            }
        } 
        elseif ($key == array_key_last($cadena)) {
            if (!preg_match('/^[a-zA-Z1-9.]+\.[a-zA-Z1-9]+$/', $value)) {
                $esValida = false;
                break;
            }
        }
        else {
            if (!preg_match($patron, $value)) {
                $esValida = false;
                break;
            }
        }
    }  
}

print ($esValida ? '¡Si!' : '¡No!') .  "<br/><br/>";

//8. Extraer el id de un vídeo de Youtube
/* Ejemplos:
https://www.youtube.com/watch?v=Wgw94BoIlJA
https://youtu.be/Wgw94BoIlJA
www.youtube.com/watch?v=Wgw94BoIlJA
En todos estos casos, la ID sería Wgw94BoIlJA
*/

$cadena = 'https://www.youtube.com/watch?v=Wgw94BoIlJA';
$patron = '/(\/watch\?v=[^&]+|\/[^\/]+)$/';
$resultado;
preg_match($patron, $cadena, $resultado);

print 'Ej 8: dada la cadena "' . $cadena . '", el id de video es: ' . end(explode('=', $resultado[0])) . '.<br/><br/>';

//9. Verificar que una cadena comienza por una letra y va seguida de al menos 3 letras o dígitos o caracteres especiales _(#*$).

$esValida = preg_match('/^[a-zA-Z][a-zA-Z0-9\W_]{3,}/', $cadena);

print 'Ej 9: dada la cadena "' . $cadena . '", comienza por una letra seguida de al menos 3 letras o dígitos o caracteres especiales?: ' . ($esValida ? '¡Si!' : '¡No!') .  "<br/><br/>";

//10. Verificar que una cadena tiene una estructura conforme a la de una fecha con formato [D]D/[M]M/AAAA y recuperar los 3 componentes día, mes y año. Utilizar un bucle para comprobar si son válidas las fechas del array $fechas
$fechas[] = '21/09/2001'; // OK
$fechas[] = '1/2/2001'; // OK
$fechas[] = '21/09/01'; // año incompleto

print 'Ej 10: evaluando si los formatos de fecha son validos: <br/>';
foreach ($fechas as $key => $value) {
    print 'Evaluando fecha "' . $value; 
    if (preg_match('/^([0-2]?\d|3[0-1])\/(0?\d|1[0-2])\/\d{4}$/', $value)) { //TODO, AUN POR TERMINAR EL PREG
        $varlocal = explode('/', $value);
        print '"... Si es un formato valido! El dia es: ' . $varlocal[0] . ', el mes es: ' . $varlocal[1] . ', y el anyo es: ' . $varlocal[2] . '.<br/><br/>';
    } else {
        print '"... No es un formato valido!<br/><br/>';
    }
}

//11. Crear una expresión regular para leer números de DNI y de NIE (extranjeros).
/* El formato para el DNI es de la forma a la que estamos acostumbrados:
11223344-A. Y el formato para el NIE es de la forma X-1223344-A, donde el primer carácter pueden ser las detrás X, Y o Z.
El guión separador es opcional. */

$cadena = 'X-1223344-A';

print 'Ej 11: dada la cadena "' . $cadena . '", es esta un formato de DNI o NIF valido?: ' . (preg_match('/^(([XYZ]\-?\d{7})|(\d{8}))\-?[TRWAGMYFPDXBNJZSQVHLCKE]$/', $cadena) ? '¡Si!' : '¡No!') .  "<br/><br/>";

//12. Comprobar si un string es un código hexadecimal de color. Ejemplos válidos: #fff, #12A453

$cadena = '#12A453';

print 'Ej 12: dada la cadena "' . $cadena . '", es este un codigo hexadecimal valido?: ' . (preg_match('/^\#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/', $cadena) ? '¡Si!' : '¡No!') .  "<br/><br/>";

?>