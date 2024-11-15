<?php

/*10. Recorrer el archivo csv anexo con datos de alumnos y mostrarlos en una tabla (preferiblemente bootstrap). Los datos deben aparecer de forma legible.
La columna ‘sexo’ debe mostrar “Masculino” o “Femenino”. Las fechas deben mostrarse en formato dd/mm/yyyy. Los datos deben mostrarse en mayúsculas.*/

$contenido = array();

$file = fopen('alumnos.csv', 'r');

if ($file) {
    while (!feof($file)) {
        $contenido[] = fgetcsv($file);
    }

    fclose($file);
}

print '<table>';
foreach ($contenido as $key => $value) {
    if ($key == 0) {
        print '<thead><tr>';
        foreach ($value as $i) {
            print '<th>' . $i . '</th>';
        }
        print '</tr></thead><tbody>';
    } else {
        print '<tr>';
        foreach ($value as $i) {
            print '<td>' . $i . '</td>';
        }
        print '</tr>';
    }
    print '</tbody>';
}
print '</table>';

?>