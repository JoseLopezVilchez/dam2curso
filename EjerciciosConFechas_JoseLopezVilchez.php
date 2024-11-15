<?php

//Resuelve al menos 4 de los siguientes ejercicios

/*1. Crea una función que reciba una fecha (día, mes y año) y determine si es válida. Si la fecha es válida, la devuelve en formato "Día/Mes/Año".
Si no es válida, devuelve false e imprime un error.*/

function devuelveFecha (int $dia, int $mes, int $anyo) : String {
    return checkdate($mes, $dia, $anyo) ? ('la fecha ' . $dia . '/' . $mes . '/' . $anyo . ' es valida') : ('fecha no valida');
}

$comprobador1 = ['dia' => 1, 'mes' => 2, 'anyo' => 1000];

print 'Ej 1: dada la fecha ';
print_r($comprobador1);
print ', comprobando su validez: ' . devuelveFecha($comprobador1['dia'], $comprobador1['mes'], $comprobador1['anyo']) . '.<br/><br/>';

/*2. Muestra la fecha y hora actual en varios formatos, como:
Día/Mes/Año Hora:Minutos
Mes/Día/Año
Nombre del día de la semana, seguido de la fecha en formato completo (e.g., "Lunes, 14 de Octubre de 2024").*/

print 'Ej 2: mostrando la fecha actual en varios formatos:<br/>';
print date('d-m-Y H:i') . '<br/>';
print date('m-d-Y') . '<br/>';

$dias = [
    'Domingo',
    'Lunes',
    'Martes',
    'Miercoles',
    'Jueves',
    'Viernes',
    'Sabado'
];

$meses = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
];

print $dias[getdate()['wday']] . ', ' . date('d') . ' de ' . $meses[getdate()['mon']-1] . ' de ' . date('Y') . '<br/><br/>';

//NOTA: echa un ojo a setlocale()

//3. Crea una fecha a partir de este string: "02/02/2005 21:30”. Desglosarla para mostrar el día, mes, año, hora, minutos y segundos por separado. También muestra si la fecha es válida.

$fecha = DateTime::createFromFormat('d/m/Y H:i', '02/02/2005 21:30');

print 'Ej 3: mostrando la fecha "02/02/2005 21:30":<br/>';
if ($fecha) {
    print 'Fecha valida, dividiendo: dia - ' . $fecha->format('d') . ', mes - ' . $fecha->format('m') . ', anyo - ' . $fecha->format('Y') . ', hora - ' . $fecha->format('H') . ', minutos - ' . $fecha->format('i') . ', segundos - ' . $fecha->format('s') . '.<br/><br/>';
} else {
    print 'Fecha no valida.<br/><br/>';
}

//4. Toma dos fechas (en cualquier formato), calcula la diferencia entre ellas en días, horas y segundos, y muestra el resultado.

$fechas = [
    new DateTime('30-06-2020 12:59:23'),
    new DateTime('15-05-2024 23:45:33')
];

$fechas[] = $fechas[0]->diff($fechas[1]);

print 'Ej 4: dadas las fechas ' . $fechas[0]->format('d/m/Y H:i:s') . ' y ' . $fechas[1]->format('d/m/Y H:i:s') . ', la diferencia es de ' . $fechas[2]->days . ' dias, ' . $fechas[2]->h . ' horas, y ' . $fechas[2]->s . ' segundos.<br/><br/>';

//5. Crea una fecha específica (por ejemplo, tu cumpleaños) y compárala con la fecha actual. Muestra cuántos días faltan o han pasado desde esa fecha.

$fechas = [
    new DateTime('07-07-2024'),
    new DateTime()
];

$fechas[] = $fechas[0]->diff($fechas[1]);

print 'Ej 5: dadas las fechas ' . $fechas[0]->format('d/m/Y') . ' y ' . $fechas[1]->format('d/m/Y') . ', la diferencia es de ' . $fechas[2]->days . ' dias.<br/><br/>';

//6. Escribe un script que mida cuánto tiempo (en segundos y microsegundos) tarda en ejecutarse un bloque de código que incluya una pausa de 1 segundo (sleep(1);)

function codigoATestear () {
    sleep(1);
}

function funcionMedidora(callable $funcionAMedir) {

    $inicio = microtime(true);

    $funcionAMedir();
    
    $final = microtime(true);
    
    return $final - $inicio;
}

print 'Ej 6: probando codigo... El tiempo de ejecucion ha durado ' . funcionMedidora('codigoATestear') . ' segundos.<br/><br/>';

?>