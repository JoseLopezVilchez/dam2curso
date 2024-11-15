<?php

//uniqid - crea clave 'unica' basada en milis
$id = uniqid('prefijo', true);

print $id;

//md5 - pasa a md5
$idmd5 = md5($id);

print $idmd5 . '<br/><br/>';

// ---------------

// DIRECTORY_SEPARATOR //separador de directorios (cambia entre linux, windows y mac)
// PHP_EOL //simbolo de fin de linea

//fopen('path', 'modo')

/*
modos:
r - read
r+ - read & write - Modifica si ya existe, pero va sobreescribiendo desde el principio del fichero.
w - write - Si el archivo ya existe, lo machaca. Si no existe, lo crea.
w+ - write & read - Este tambien reemplaza si ya existe. Si no existe, tambien lo crea.
a - write - Coloca el puntero al final del fichero y va modificando a partir de ahi.
a+ - write & read - 
x - write - Puntero al principio. Si ya existe, no puede crearlo, con lo que falla.
x+ - write & read - Puntero al principio.
c - write - Si el fichero no existe, se crea. Si existe, no es truncado. Puntero al principio.
c+ - write & read - 
*/

$file = fopen('ejemplo.txt', 'r+'); // Sirve para abrir ficheros

$texto = 'testo testo woo woo woo woo heya heya' . PHP_EOL;

if ($file) {

    fwrite($file, $texto); //escribe en un fichero DONDE SEA QUE ESTE EL PUNTERO

    rewind($file); //rebobina el cursor hasta el principio del fichero

    /*while (($linea = fgets($file)) !== false) { //fgets saca un stream, y el bucle lo va imprimiendo a cachos
        echo $linea . '<br/>';
    }*/

    $contenido = fread($file, filesize('ejemplo.txt'));
    print '<br/><br/>' . $contenido . '<br/><br/>'; //sin salto de linea
    print nl2br($contenido); //con salto de linea

    fclose($file); //hay que cerrar los stream
} else {
    echo 'No se ha podido abrir el fichero';
}

$contenido = file('ejemplo.txt'); //saca el contenido de un archivo en forma de array por linea, y no hace falta abrir ni cerrar el archivo, lo hace solo

var_dump($contenido);

print implode('<br/>', $contenido);

readfile('ejemplo.txt'); //imprime directamente el contenido, lee y cierra por su cuenta. No guarda nada, solo imprime y ya

$contenido = file_get_contents('ejemplo.txt');

var_dump($contenido);

//fwrite se usa para escribir en un archivo

$file = fopen('archivo.txt', 'w');

$contenido = 'Texto contenido en el archivo que metemos usando fwrite';

if ($file) {
    fwrite($file, $contenido);

    fclose($file);

    print 'Archivo escrito correctamente.';
} else {
    print 'No se pudo abrir el archivo.';
}

//file_put_contents() es igual a hacer fopen, fwrite y fclose. Si el fichero no existe, se crea. Si existe, se sobreescribe, a menos que la flag FILE_APPEND esté activa

$contenido = 'Texto contenido en el archivo que metemos usando file_put_contents()';

file_put_contents('archivo.txt', $contenido);

//copy

copy('archivo.txt', 'destino.txt');

//rename()

rename('archivo.txt', 'copia.txt');

//unlink

unlink('copia.txt');

//file_exists

file_exists('archivo.txt');

//filesize

filesize('archivo.txt');

//getcwd

getcwd();

//chdir

chdir('.');

//scandir - devuelve un array con todos los archivos

scandir('.');

//opendir, closedir, readdir, is_dir

$dirname = 'res/';

if (is_dir($dirname)) {
    $dir = opendir($dirname);

    if ($dir) {
        while(($file = readdir($dir)) !== false) {
            print 'Nombre: ' . $file . ', tipo de archivo: ' . filetype($file) . '<br>';
        }
    }

    closedir($dir);
}

//

$salida = fopen('php://output', 'w');

fwrite($salida, 'Esto es un ejemplo siendo escrito en el buffer de salida'); //estoy haciendo lo mismo que un echo, pues escribe en el buffer de salida

fclose($salida);

//exec - ejecuta un programa externo. Puede ejecutar comandos de consola

//fgetcsv y fputcsv - csv es un tipo de fichero ('comma-separated values')

$contenido = array();

$file = fopen('ejemplo.csv', 'r+');

if ($file) {
    while (!feof($file)) {
        $contenido[] = fgetcsv($file);
    }

    fclose($file);
}

foreach ($contenido as $fila) {
    $fila = implode(' ', $fila);
    print '<br/>' . $fila . '<br/>';
}

// --------

//JSON

//json_encode y decode - devuelve la representacion json de un valor u objeto dado, o a la inversa
$contenido = [1, 'meme', 99.9];
print json_encode($contenido);

$objeto = json_decode('{ejemplo : "ejemplo"}');

// json_last_error() - dice si hay algun error reciente de json

//header - permite modificar el encabezado, y DEBE SER LLAMADO ANTES DE MOSTRAR NADA POR PANTALLA, Y DEBE PONERSE ANTES DE NINGUN INCLUDE O REQUIRE

//header('', true);

//clojures

$clojure = function($blah) {
    return $blah . ' y ' . $blah;
};

//tipado de parametros, y nullables

function ejemplo (callable $clojure, ?int $ejemplo) { //obliga a que sea int y pueda aceptar null
    print $clojure($ejemplo);
}

$otraforma = 'ejemplo'; //ejemplo de como meter funciones en variables
$otraforma($clojure, 2);

//pasos por referencia

function eyenpol (int &$a) {
    $a = 0;
}
$a = 10;
print $a;
print eyenpol($a);

//func_num_args() - dice cuantos argumentos se han pasado a una función, se invoca vacia desde dentro de una funcion
//func_get_args() - lista de parametros pasados a la funcion (no el numero, los parametros)
//func_get_arg($posicionDelParametroEnInt) - 

//static - se puede tener dentro de funciones para almacenar valores dentro de las propias funciones

//

$clojure = function() use ($a) { //puedes hacer pase por valor o referencia / Esta es la forma vieja de hacer clojures
    print $a;
};

$clojure = fn() => (print('ejemplo')); //forma nueva de hacer clojures

//funcion generadora - genera una lista de valores que podran explorarse en el programa mediante una llamada foreach / genera muchos valores sueltos sin almacenarlos todos, mas eficiente
//es como que una funcion va operando y soltando valores, en vez de dar un return y devolverlo todo de golpe. Usa yield en vez de return, aunque puede tener ambos y conseguir el return via getReturn()
//conserva estado entre ejecuciones de la funcion (cada vez que se llama se sigue ejecutando)
//puedes usar:
/*
Generator::current - obtiene valor producido
Generator::getReturn - obtiene el valor devuelto de un generador
Generator::key - obtiene la clave generada
Generator::next - continua la ejecución del generador
Generator::rewind - rebobina el generador
Generator::send - 
Generator::valid - dice si tiene valores
*/

function numeros () {
    print 'Inicio de generador';

    for ($i = 0; $i < 5; ++$i) {
        yield $i;
        echo 'Se ha hecho yield en ' . $i . '.<br/>';
    }

    print 'Generador terminado';
}

foreach (numeros() as $num) {
    print 'Se ha recibido el numero ' . $num . '.<br/>';
}

function generarSerie($inicio, $fin) {
    for ($i = $inicio; $i <= $fin; $i++) {
        yield $i;
    }
}

$generador = generarSerie(1, 5);

//print $generador->current(); //devuelve el actual sin volver a llamar a la funcion
//print $generador->next(); //avanza al siguiente valor, y se puede hacer mientras tenga valores a devolver. Si se queda sin valores no pasa nada, solo que quedaria vacio
//print $generador->current(); //ahora deberia devolver un valor distinto al haberlo avanzado

while ($generador->valid()) {
    print $generador->current();
    $generador->next();
}

?>