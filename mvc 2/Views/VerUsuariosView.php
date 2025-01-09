<?php
require('Views/commons/header.php');
?>
    
    <table border="1">

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
                    echo "<td>
                        <a class='btn btn-primary' href='index.php?controller=Usuario&action=editar&id=" . $user['id'] . "'>Editar</a>
                        <a class='btn btn-danger' href='index.php?controller=Usuario&action=eliminar&id=" . $user['id'] . "'>Elliminar</a>
                    </td>";
                    echo "</tr>";
                }
            ?>

        </tbody>

    </table>


<?php
require('Views/commons/footer.php');
?>