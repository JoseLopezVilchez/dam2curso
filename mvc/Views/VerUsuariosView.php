<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    
    <table>

        <thead>
            <tr>
                <td>Usuario</td>
                <td>Nombre real</td>
            </tr>
        </thead>

        <tbody>
            
            <?php
                foreach($usuarios as $user){
                    echo "<tr>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['nombre'] . "</td>";
                    echo "</tr>";
                }
            ?>

        </tbody>

    </table>

</body>
</html>