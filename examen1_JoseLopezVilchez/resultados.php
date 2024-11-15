<?php
    include_once 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Examen 6 de noviembre de 2024</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Pantalla de resultados <small>Examen 6 de noviembre de 2024</small></h1>
            <small><?php ejercicio1(); ?></small> <!-- ej 1 -->
        </div>
        <br>
        <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header">Comprobar la contraseña</div>
                <div class="card-body">
                    <p class="card-text"><?php ejercicio2($_GET['pass']); ?></p> <!-- ej 2 -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header">Contar caracteres del nombre</div>
                <div class="card-body">
                    <p class="card-text">El nombre tiene <b><?php ejercicio3($_GET['nombre']); ?> caracteres</b></p> <!-- ej 3 -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header">Descuentos seleccionados</div>
                <div class="card-body">
                    <p class="card-text"><?php ejercicio4($_GET['descuentos']); ?></p> <!-- ej 4 -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header">Descuento total</div>
                <div class="card-body">
                    <p class="card-text"><?php ejercicio5($_GET['descuentos']); ?></p> <!-- ej 5 -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header">Identificador</div>
                <div class="card-body">
                    <p class="card-text">El identificador del envío es: <?php ejercicio6(); ?></p> <!-- ej 6 -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card bg-light mb-3">
                <div class="card-header">¿La edad es un dato de tipo entero?</div>
                <div class="card-body">
                    <p class="card-text"> <?php esEntero($_GET['edad']) ?> </p> <!-- ej 8 -->
                </div>
            </div>
        </div>

        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
