<?php
require('Views/commons/header.php');
?>
    
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