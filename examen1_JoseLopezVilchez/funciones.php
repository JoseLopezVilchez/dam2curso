<?php

$dia = [
    'Sun' => 'domingo',
    'Mon' => 'lunes',
    'Tue' => 'martes',
    'Wed' => 'miércoles',
    'Thu' => 'jueves',
    'Fri' => 'viernes',
    'Sat' => 'sábado',
];

$mes = [
    'enero',
    'febrero',
    'marzo',
    'abril',
    'mayo',
    'junio',
    'julio',
    'agosto',
    'septiemnbre',
    'octubre',
    'noviembre',
    'diciembre'
];

// print 'Fecha valida, dividiendo: dia - ' . $fecha->format('d') . ', mes - ' . $fecha->format('m') . ', anyo - ' . $fecha->format('Y') . ', hora - ' . $fecha->format('H') . ', minutos - ' . $fecha->format('i') . ', segundos - ' . $fecha->format('s') . '.<br/><br/>';

//1 - Mostrar la fecha y hora de envío del formulario con una frase con este formato: Recibido el miércoles, 6 de octubre a las 20:00 h.

function ejercicio1 () {
    global $dia, $mes;
    $fecha = new DateTime(); //dia, num. dia, mesletra, hora 00:00 formato 24h
    print 'Recibido el <u>' . $dia[$fecha->format('D')] . ', ' . $fecha->format('d') . ' de ' . $mes[$fecha->format('m')] . ' a las ' . $fecha->format('H:i') . ' h.</u>';
}

//2 - Comprobar que la contraseña contiene al menos 8 caracteres, incluyendo al menos una mayúscula, una minúscula, un número y un símbolo de entre estos: !"·$%&/()=?¿¡'+*^-.,_:;

function ejercicio2 ($pass) {
    $regex = [
        '/^.{8,}$/',
        '/[A-Z]+/',
        '/[a-z]+/',
        '/\d+/',
        '/\W+/'
    ];

    $comprobador = true;

    foreach ($regex as $r) {
        if (!preg_match($r, $pass)) {
            $comprobador = false;
            break;
        }
    }

    if ($comprobador) {
        print 'La contraseña es correcta';
    } else {
        print 'La contraseña es incorrecta';
    }
}

//3 - ¿Cuántos caracteres tiene el nombre de usuario?

function ejercicio3 ($nombre) {
    print strlen($nombre);
}

//4 - Contar los descuentos seleccionados y mostrarlos, por orden alfabético, separadas por comas

function ejercicio4 ($descuentos) {
    if (!is_array($descuentos)) {
        $descuentos = [$descuentos];
    }

    sort($descuentos);
    
    //Se han seleccionado 2 descuentos: Black-Friday (10%), Trae a un amigo (10%)

    print 'Se han seleccionado ' . count($descuentos) . ' descuentos: ' . implode(', ', $descuentos);
}

//5 - Utilizando expresiones regulares, obtener los porcentajes de las opciones seleccionadas. Mostrar el descuento total que se aplicará.

function ejercicio5 ($descuentos) {
    if (!is_array($descuentos)) {
        $descuentos = [$descuentos];
    }

    $sumatoria = 0;
    $arrayPorcentajes = [];

    foreach ($descuentos as $des) {
        preg_match('/[0-9]+%/', $des, $match);
        $arrayPorcentajes[] = str_replace( '%', '', $match[0]);
    }

    foreach ($arrayPorcentajes as $i) {
        $sumatoria += $i;
    }

    //Se aplicará un <b>20%</b> de descuento.
    print 'Se aplicará un <b>' . $sumatoria . '</b> de descuento.';
}

//6 - Crear un identificador único y mostrarlo en la pantalla de resultados

function ejercicio6 () {
    print uniqid();
}

//7 - Crear el archivo "_edad.php" que muestre un selector con los números del 18 al 100

//En otro archivo

/*8 - Implementar el contenido de la función esEntero($valor), que comprueba si $valor es un número entero. 
Llamar a la función para comprobar si la edad es un número entero y mostrar una frase que lo indique en la pantalla de resultados*/

function esEntero ($valor) {
    print is_int((Int) $valor) ? 'Si' : 'No';
}

//9 - Mostrar un listado con los nombres de los archivos que hay en la carpeta donde se encuentra resultados.php

function ejercicio9 () {
    print '<ul>';
    foreach (array_diff(scandir('.'), array('.', '..')) as $fichero) {
        print '<li>' . $fichero . '</li>';
    }
    print '</ul>';
}

/*10 - Sin utilizar JavaScript, crear un fichero llamado "gracias.php" para mostrar el mensaje "Gracias por enviar tu respuesta."
y redireccionar a resultados.php, pasados 3 segundos.*/

//En otro archivo

?>