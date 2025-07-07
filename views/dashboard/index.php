<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zapatería SM</title>
</head>
<body>
    <?php require (__DIR__ . '/../../layout/header.php') ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            require (__DIR__ . '/../../layout/sidebar.php') ?>
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="h2">Dashboard</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Marca</th>
                                <th>Descripción</th>
                                <th>Talla</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Impuesto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí puedes agregar los datos de tu tabla -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>

    <?php require (__DIR__ . '/../../layout/footer.php')?>
</body>
</html>