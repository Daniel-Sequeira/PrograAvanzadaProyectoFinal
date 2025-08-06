<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Zapatería SM</title>
    <link href="<?php echo constant('URL'); ?>css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . '/../../layout/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12 mb-3">
                <?php require  __DIR__ . '/../../layout/sidebar.php'?>
            </div>
            <div class="col-md-9 col-12">
                <!-- Buscador por marca -->
                <form method="GET" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="marca" placeholder="Buscar por marca"
                            value="<?php echo isset($_GET['marca']) ? htmlspecialchars($_GET['marca']) : ''; ?>">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
                <?php
                // Ejemplo de filtrado (ajusta según tu lógica y datos)
                if (isset($_GET['marca']) && $_GET['marca'] !== '') {
                    $marca = $_GET['marca'];
                    // Aquí iría la consulta a la base de datos para filtrar por marca
                    echo "<p>Resultados para la marca: <strong>" . htmlspecialchars($marca) . "</strong></p>";
                    // Mostrar resultados...
                }
                ?>
            </div>
        </div>
    </div>

    <div>
        <?php require  __DIR__ . '/../../layout/footer.php'?>
    </div>
</body>


</html>