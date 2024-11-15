<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="barraMenu">
<?php

require 'php/ej1.php';

?>
</div>
<article class="contenedor">
    <div>
        <?php

            if (isset($_GET['ej'])) {
                $ejercicio = $_GET['ej'];
                require 'php/' . $ejercicio;
            } else {
                print "Elige el ejercicio a visualizar >:D";
            }

        ?>
    </div>
</article>
</body>
</html>