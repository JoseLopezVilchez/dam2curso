<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        div {
            background-color: red;
            margin: 10px;
            padding: 20px;
            
            h2 {
                color: white;
            }
        }

    </style>
</head>
<body>

<?php
    
/*
2 - Al pulsar el botón "Entrar" del formulario, se mostrará un error si la contraseña no es correcta.
    (Las contraseñas están escritas en plano en la columna "password" de la tabla "users"). (30 pts)
    Cuando el nombre de usuario y contraseña sean correctos, pasará a la pantalla "ListaPelículas"
*/

session_start(); //Inicio global $_SESSION

if (isset($_POST['ok'])) { //Comprueba si ha mandado datos antes
    if ($_POST['email'] == '' || $_POST['pass'] == '') { //Comprueba vacíos
        print '<div><h2>Hay campos vacíos</h2></div>';
        
    } else {

        try { //Por si el servidor está apagado y mysqli lanza error
            $conn = new mysqli('127.0.0.1', 'root', '', 'examen');

            $consulta = "SELECT id FROM `users` WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['pass'] . "';";
            $resultado = $conn->query($consulta);

            $ok = false; //Inicializo fuera o salta error

            if ($conn->connect_error || $conn->error) {
                print '<div><h2>Error durante la ejecucion de la consulta: ' . ($conn->connect_error ? ($conn->connect_error . ($conn->error ? (' / ' . $conn->error) : '')) : ($conn->error ? $conn->error : '')) . '</h2></div>';
            } else if ($resultado->num_rows > 0) {
                $ok = true;
            } else { //Si hay 0 líneas
                print '<div><h2>Error: datos incorrectos</h2></div>';
            }

            $conn->close();

            if ($ok) { //Uso $ok y no meto la lógica antes para que no se me quede la conexión colgando
                $_SESSION['id'] = $resultado->fetch_array()[0] ?? ''; //Saco id de query, lo meto en sesión
                print "<script>window.location.href = './ListaPeliculas.php';</script>"; //Javascript para redirección
            }
        } catch(Exception $e) {
            print '<div><h2>Error: ' .$e->getMessage() . '</h2></div>';
        }
    }
}
    
?>

<!--
/*
    1 - Crear un fichero llamado index.php (20 pts)
    Debe contener un formulario de inicio de sesión con dos campos, llamados:
        "email": para la dirección de correo
        "pass": de tipo password, que contendrá la contraseña
    Los campos del formulario serán obligatorios y se enviarán por POST
*/
-->

    <form action="index.php" method="post">
        <label for="email">Email</label><input id="email" name="email" type="text" maxlength="80" required/>
        <label for="pass">Pass</label><input id="pass" name="pass" type="password" maxlength="80" required/>
        
        <input id="login" name="ok" type="submit" value="Login"/>
    </form>

</body>
</html>