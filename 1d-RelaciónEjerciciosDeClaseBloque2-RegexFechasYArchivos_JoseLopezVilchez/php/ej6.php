<?php

/*6. A partir de una fecha, averiguar qué día de la semana fue el último día de ese mes (si fue lunes, jueves etc..).
Usar para ello las funciones strtotime, strftime y date. Debe mostrar este mensaje:
Fecha original: 2021-04-24
El último día del mes de abril del año 2021 fue: viernes*/

$fecha = '2021-04-24';

$mes = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiemnbre',
    'Octubre',
    'Noviembre',
    'Diciembre'
];

$dia = [
    'Sunday' => 'Domingo',
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes',
    'Wednesday' => 'Miércoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sábado',
];

$timestamp = strtotime($fecha);

$ultimoDiaDelMes = date('Y-m-t', $timestamp); // 't' da el NÚMERO DE DÍAS del mes

$diaDeLaSemana = strftime('%A', strtotime($ultimoDiaDelMes)); // '%A' devuelve el nombre del día de la semana

echo 'Dada la fecha <span>' . $fecha . '</span>, el último día del mes de <span>' . $mes[(Int) date('m', $timestamp) - 1] . '</span> del año <span>' . date('Y', $timestamp) . '</span> fue <span>' . $dia[$diaDeLaSemana] . '</span>.';

?>