<?php
require('Views/commons/header.php');
?>
    
    <form action="index.php?controller=Usuario&action=guardar" method="POST">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username"><br/>

        <label for="nombre">Nombre real</label>
        <input type="text" name="nombre"><br/>

        <label for="password">Contraseña</label>
        <input type="password" name="password"><br/>
        
        <label for="email">Correo electrónico</label>
        <input type="email" name="email"><br/>

        <input type="submit">
    </form>

</body>
</html>