<!-- <form action="" method="POST" accept-charset="utf-8" autocomplete="off"
enctype="application/x-www-form-urlencoded" novalidate target="_blank">

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text" required/>
    <fieldset>
        
        <input type="radio" name="radio" id="radio"/>
        <label for="radio">Click aqui</label>

    </fieldset>
    <input type="submit" value="Enviar"/>

</form> -->

<?php

    if ($_POST['ok']) {
        print 'apellido: ' . $_POST['apellido'] . ', frutas seleccionadas: ';
        foreach ($_POST['fruta'] as $letraFruta) {
            print $frutas[$letraFruta] . '<br/>';
        }
    }

    $apellido = "Marin";

    $frutas = [
        'A' => 'Albaricoque',
        'C' => 'Cerezas',
        'F' => 'Fresas',
        'S' => 'Sandía'
    ];

    $frutasFavoritas = ['C', 'F'];

?>

<form action="entrada.php" method="POST">
    Apellido: <input type="text" name="apellido" value="<?php print $apellido ?>"><br/>

    <select name="fruta[]" multiple>
        <?php
        foreach ($frutas as $letra => $fruta) {
            $seleccionada = in_array($letra, $frutasFavoritas) ? 'selected="selected"' : '';
            print '<option value="' . $letra . '" ' . $seleccionada . '>' . $fruta . '</option>';
        }
        ?>
    </select>

    <input type="submit" name="ok" value="OK">
</form>

