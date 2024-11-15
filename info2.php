<?php

/*$email = 1;

$valores = [
    'options' => [
        'min_range' => 0,
        'max_range' => 100
    ]
];

if (filter_var($email, FILTER_VALIDATE_INT, $valores)) { //El tercer parametro es opcional, depende del filtro usado
    print 'El email es valido';
} else {
    print 'El email no es correcto';
}

//Hay muchos tipos de filtro, como FILTER_VALIDATE_URL, FILTER_VALIDATE_EMAIL o FILTER_SANITIZE_STRING

$datos = [
    'nobre' => 'Antonio<script>',
    'edad' => 27,
    'email' => 'antonio@dominio.es',
    'url' => 'https://escuelaestech.es'
];

$filtros = [
    'nombre' => FILTER_SANITIZE_STRING,
    'edad' => [
        'filter' => FILTER_VALIDATE_INT,
        'options' => ['min_range' => 18, 'max_range' => 100]
    ],
    'email' => FILTER_VALIDATE_EMAIL,
    'url' => FILTER_SANITIZE_URL
];

$resultado = filter_var_array($datos, $filtros);

print_r($resultado);*/

/*$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL); //Filtra $_GET. Puedes poner INPUT_POST para filtrar $_POST

var_dump($email);*/

var_dump($_REQUEST);
var_dump($_FILES);

$file = [
    'filename' => $_FILES['fichero']['name'],
    'tempPath' => $_FILES['fichero']['tmp_name'],
    'filetype' => $_FILES['fichero']['type'],
    'filesize' => $_FILES['fichero']['size']
];

if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] === UPLOAD_ERR_OK) {

    if ($file['filesize'] > 10000) {
        print 'El fichero es demasiado grande';
    } else {
        $rutaDestino = 'res/' . $file['filename'];

        if (move_uploaded_file($file['tempPath'], $rutaDestino)) {
            print 'El archivo se ha subido correctamente';
        } else {
            print 'No se ha podido subir el fichero';
        }
    }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre"/><br/>

    <input type="file" name="fichero" accept=".png .jpg .jpef"/><br/>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000"/>

    <input type="submit" name="ok" value="OK"/>
</form>