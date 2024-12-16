<?php
require('Views/commons/header.php');
?>
    
    <form action="index.php?controller=Usuario&action=<?php echo $actionForm; ?>" method="POST">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" <?php echo isset($usuario) ? 'value="' . $usuario['username'] . '"' : ""; ?> required><br/>

        <label for="nombre">Nombre real</label>
        <input type="text" name="nombre" <?php echo isset($usuario) ? 'value="' . $usuario['nombre'] . '"' : ""; ?> required><br/>

        <label for="password">Contraseña</label>
        <input type="password" name="password" <?php echo isset($usuario) ? 'value="' . $usuario['pass'] . '"' : ""; ?> required><br/>
        
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" <?php echo isset($usuario) ? 'value="' . $usuario['email'] . '"' : ""; ?> required><br/>

        <?php if(isset($usuario)){ ?>
            <input type="hidden" name="userId" value="<?php echo $usuario['id'] ?>">
        <?php } ?>
        <input type="submit" value="<?php echo $actionForm; ?>">
    </form>


<?php
require('Views/commons/footer.php');
?>