<?php

//7 - Crear el archivo "_edad.php" que muestre un selector con los números del 18 al 100

print '<select name="edad" id="cars">';

for ($i = 18; $i < 101; $i++) {
    print '<option value="' . $i . '">' . $i . '</option>';
}

print '</select>';

?>