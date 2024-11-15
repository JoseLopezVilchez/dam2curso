<?php

/*10 - Sin utilizar JavaScript, crear un fichero llamado "gracias.php" para mostrar el mensaje "Gracias por enviar tu respuesta."
y redireccionar a resultados.php, pasados 3 segundos.*/

header('refresh:5;url=resultados.php' . '?' . http_build_query($_POST));

print 'Gracias por enviar tu respuesta.';

?>