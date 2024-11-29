<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Bloque 3 Formularios 2C</title>
    <style>
        form, div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-color: black;
            border-width: 2px;
            border-style: solid;
        }
        
    </style>
</head>
<body>

    <form action="./ejerBloque3formularios2c/index.php" method="post" enctype="multipart/form-data">
        
        <label for="nombre">Nombre del archivo:</label>
        <input id="nombre" name="nombre" type="text" maxlength="40"/>

        <label for="fichero">Archivo a subir:</label>
        <input type="file" name="fichero" id="fichero" required>
        
        <input id="guardar" name="ok" type="submit" value="Guardar"/>
    </form>
    
    <div>
    <?php

        /*
        1.- Crear un script con un formulario que permita enviar dos campos: un nombre y un fichero.
        2.- El fichero debe guardarse con el nombre indicado en el campo nombre.
        3.- Una vez guardado el fichero, debe aparecer en la pantalla: su nombre, tamaño y un enlace para descargarlo.
        */

        if (isset($_POST) && isset($_FILES) && !empty($_FILES['fichero']) && !empty($_POST['nombre']) && move_uploaded_file($_FILES['fichero']['tmp_name'], './' . htmlspecialchars($_POST['nombre'])) && file_exists('./' . htmlspecialchars($_POST['nombre']))) {
            
            $nombre = htmlspecialchars($_POST['nombre']);
            print '<h4>Nombre de archivo: ' . $nombre . '</h4>';
            print '<p>Tamaño del archivo: ' . filesize('./' . $_POST['nombre']) . '</p>';
            print '<p>Enlace de descarga: <a download href="./' . $nombre . '">' . $nombre . '</a></p>';

        }
    ?>
    </div>

</body>
</html>