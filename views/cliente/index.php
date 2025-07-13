<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require(__DIR__ . '/../../layout/header.php') ?>
    <div id="main">
        <h1 class="center">Registro de Clientes</h1>
        <form action="<?php echo constant('URL');?>cliente/registrarCliente" method="POST">
            <p>
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="nombre" id="">
            </p>
            <p>
                <label for="correo">Correo:</label><br>
                <input type="text" name="correo" id="">
            </p>
            <p>
                <label for="cedula">Cédula:</label><br>
                <input type="text" name="cedula" id="">
            </p>
            <p>
                <input type="submit" value="Registrar">
            </p>


        </form>
    </div>

</body>

</html>