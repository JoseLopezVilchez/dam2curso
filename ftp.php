<?php

$user = 'dam2';
$pass = 'esDam2';
$host = 'ftp.test3.qastusoft.com.es';

$ruta = "ftp://$user:$pass@$host/clase.log";

$archivo = fopen($ruta, 'a');
if ($archivo !== false) {
    if (fwrite($archivo, 'Hola, soy un sussy impostor :).\n') === false) {
        die('No se pudo aser la abrididura.');
    } else {
        print 'Se iso la escribidura.';
    }
} else {
    die('No se pudo aser la abrididura der fishero.');
}

?>