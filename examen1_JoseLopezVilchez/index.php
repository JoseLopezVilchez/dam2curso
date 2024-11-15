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
            <h1>Examen 6 de noviembre de 2024</h1>
        </div>
        <div class="row">
        <form action="gracias.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe tu nombre"/>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="********"/>
                <small id="passhelp" class="form-text text-muted">La contraseña debe tener al menos 10 caracteres, incluyendo mayúsculas, minúsculas, números y algún símbolo.</small>
            </div>
            <div class="form-group">
                <label for="descuentos">¿Qué descuentos deseas aplicar?</label>
                <select class="form-control" id="descuentos" name="descuentos[]" multiple>
                    <option>Black-Friday (10%)</option>
                    <option>Rebajas (20%)</option>
                    <option>Trae a un amigo (10%)</option>
                    <option>Compromiso 12 meses (10%)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edad">Selecciona tu edad</label>
                    <?php include '_edad.php'; ?>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        </div>
    </div>
</body>
</html>