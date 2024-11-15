<?php

/*5. Realizar una página usando la función date que muestre una salida similar a esta: 
“Cuando se cargó esta página eran las 22:03:10 del día 10 de Febrero del año 2022”
“Este mes de Febrero tiene 28 días”*/

$fecha = new DateTime();
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

print 'Cuando se cargó esta página eran las <span>' . $fecha->format('H:i:s') . '</span> del día <span>' . $fecha->format('d') . '</span> de <span>' . $mes[$fecha->format('m')] . '</span> del año <span>' . $fecha->format('Y') . '</span>.<br/>';

print 'Este mes de <span>' . $mes[$fecha->format('m')] . '</span> tiene <span>' . $fecha->format('t') . '</span> días.';

?>