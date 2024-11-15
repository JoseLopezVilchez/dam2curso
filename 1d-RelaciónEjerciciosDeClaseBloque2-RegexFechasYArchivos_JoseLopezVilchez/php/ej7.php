<?php

/*7. Crear un script que ordene un array de fechas. 
Ej: ["2019-03-15", "2005-02-09", "2020-01-03"]
Ej2: ["15-03-2019", "09-02-2005", "03-01-2020"]*/

$ej1 = [
    "2019-03-15",
    "2005-02-09",
    "2020-01-03"
];
$ej2 = [
    "15-03-2019",
    "09-02-2005",
    "03-01-2020"
];

function ordenaFechas (&$arrayFechas) {

    $temporal = [];

    foreach ($arrayFechas as $i) {
        $temporal[] = new DateTime($i);
    }

    usort($temporal, function($a, $b) {
        return $a <=> $b; // Compara los objetos DateTime con el operador '<=>', devuelve -1, 0 o +1, y ese valor lo usa usort para decidir el orden
    });

    $arrayFechas = [];

    foreach ($temporal as $i) {
        $arrayFechas[] = $i->format('d-m-Y');
    }
}

print 'Dadas las fechas <span>' . implode(' ', $ej1);
ordenaFechas($ej1);
print '</span>, cuando son ordenadas el resultado es <span>' . implode(' ', $ej1) . '</span>.<br/>';

print 'Dadas las fechas <span>' . implode(' ', $ej2);
ordenaFechas($ej2);
print '</span>, cuando son ordenadas el resultado es <span>' . implode(' ', $ej2) . '</span>.<br/>';

?>