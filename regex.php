<?php

//REGULAR EXPRESSIONS

// el caracter '\' es el caracter de escape.

// el caracter ^ indica inicio de una cadena
//el caracter $ indica el final
//por ejemplo, si busca ^ejemplo$, la búsqueda sólo podrá salir 'ejemplo'

//un punto ('.') indica un caracter comodin, reemplaza a CUALQUIERA salvo al de nueva linea, INCLUSO el espacio.
//por ejemplo, ^blah . blah$ permitiría que saliese cualquier cosa entre los 'blah'. Por ejemplo, 'blah y blah' o 'blah X blah'.

//los corchetes '[]' permite buscar caracteres especificos, o intervalos de caracteres
//por ejemplo, ^[abcd]X$ permitiría que saliese aX, bX, cX o dX.
//otro ejemplo, ^[a-z]$ permitiría que saliese cualquier letra de la 'a' a la 'z', pero minusculas.
//otro ejemplo, ^[0-1]$ permitiría que saliese desde el 0 al 9.

//el caracter '^' dentro de corchetes permite excluir caracteres.
//por ejemplo, ^[^0-9]$ nunca saldría si tuviese un numero del 0 al 9.

//hay clases predefinidas de caracteres para los corchetes. Estas son:
/*
:digit: -> numericos
:alnum: -> alphanumericos
:word: -> 
:alpha: -> 
:lower: -> 
:upper: -> 
:print: -> 
:blank: -> 
:space: -> 
:punct: -> 
*/

//el caracter '|' indica alternativas, y debe ir entre '/'. Tambien puedes usar '()' para subpatrones.
//por ejemplo, ^/ejemplo|worble/$ podria encontrar tanto ejemplo como worble.
//otro ejemplo, ^/cal(do|efaccion|)/$ podria encontrar cal, caldo, o calefaccion.

//puedes usar llaves para indicar un numero de caracteres.
//por ejemplo ^.{0,4}$ podria sacar un fragmento de entre 0 y 4 caracteres de cualquier tipo (por el '.').

//el * seria equivalente a {0,}
//el ? seria equivalente a {0,1}
//el + seria equivalente a {1,}
//por ejemplo ^.*}$ podria sacar cualquier fragmento (. es cualquiera, y * es cualquier numero de ellos).
//otro ejemplo, para sacar un fragmento que tenga una 'a', puedes escribir .*a.*  .

// \b es inicio de palabra, \w es cualquier caracter (letras y numero).
//por ejemplo, \b\w*a\w*\b podria detectar cualquier palabra con una 'a'. \b\w*a\w*a\w*\b detectaria cualquier palabra con dos 'a's.
// \b[b-z0-9B-Z_]*a[b-z0-9B-Z_]*a[b-z0-9B-Z_]*\b permite detectar cualquier palabra con unicamente 2 'a's, ni mas ni menos.

// ? se puede usar para limitar, pues el algoritmo es codicioso


//puedes hacer referencias a otros patrones usando el numero de subgrupo.
// <(nombre|apellido)>(.*?)<\/\1> aplicado a <nombre>Ejemplo</nombre><apellido>Blorble</apellido> produciria <nombre>Ejemplo</nombre> y <apellido>Blorble</apellido>.
// al poner \1 hace referencia al trozo (nombre|apellido)

//aserciones
//permiten probar los caracteres siguientes o anteriores
//(?<=patrón) -> aserción anterior positiva
//(?<!patrón) -> aserción anterior negativa
//(?=patrón) -> aserción posterior positiva
//(?!patrón) -> aserción posterior negativa

//subpatrón condicional
//permite elegir entre dos subpatrones en función del resultadode una condición
//por ejemplo, (?(?=^[a-zA-Z])[a-zA-Z]{3}-\d{2}-\d{4}|\d{2}-\d{2}-\d{4}) permite buscar tanto el patrón de fecha
//00-00-0000 como el patrón mes-00-0000.

//usar # es para comentarios

//Opciones de búsqueda
// i -> no sensible a mayus y minus
// s -> permite que el '.' reemplace a cualquier caracter, incluyendo salto de línea
// m -> los comodines ^ y $ se aplican solo al inicio y fin de la cadena. Con esta opcion aplica a cada linea por separado
// x -> permite ignorar los caracteres de espacio a menos que se escapen o encuentren dentro de una clase de caracteres, así como entre #
// U -> hace que todos los cuantificadores no sean codiciosos, y el comodin '?' los hace codiciosos
// u -> permite detectar caracteres utf-8 (por ejemplo, letras con tilde)

// ---------------------------

$patron = '@^[[:alpha:]][a-zA-Z0-9_()#*$]{3,}@';

$cadenas = [
    'uidrfhsuid',
    'rghateH',
    'atenmt',
    'yyjtdfztd',
    'jrtwerqr',
    'jdftrdra',
    'khkhjgv',
    'weaw'
];

foreach ($cadenas as $cadena) {
    if (preg_match($patron, $cadena) == 0) {
        echo "$cadena => no OK<br/>";
    } else {
        echo "$cadena => OK<br/>";
    }
}

/*Comprobar que una cadena tiene yna estructura de fecha con formato [D]D/[M]M/AAAA
    Recuperar los 3 componebtes dia, mes, y año.
*/

$fechas = [
    '09/10/2024', //debe dar OK
    '9/9/2020', //debe dar OK
    '09/10/24' //debe dar NO
];

$patron = '#^(\d{1,2})\/(\d{1,2})\/(\d{4})$#';

foreach ($fechas as $fecha) {
    $ok = (preg_match($patron, $fecha, $res) > 0);
    if ($ok) {
        echo "$fecha es válida.<br/>";
        echo "Día: $res[1]";
        echo " Mes: $res[2]";
        echo " Año: $res[3]<br/>";
    } else {
        echo "$fecha no válida.";
    }
}

// -------------------

$antes = '12/02/2024';

$patron = '#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#';

$reemplazo = '$3-$2-$1';

$despues = preg_replace($patron, $reemplazo, $antes);

echo "$antes => $despues";

// --------------------



?>