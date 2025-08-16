<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Zapatería SM</title>
    <link href="<?php echo constant('URL'); ?>css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . '/../../layout/header.php'; ?>
<<<<<<< HEAD

=======
>>>>>>> parent of 91ed860 (Merge branch 'main' of https://github.com/Daniel-Sequeira/PrograAvanzadaProyectoFinal)
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12 mb-3">
                <?php require  __DIR__ . '/../../layout/sidebar.php'?>
<<<<<<< HEAD
            </nav>
            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="h2">Dashboard</h1>
                <div class="container">
                    <!-- Buscador -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form class="d-flex" onsubmit="buscarProducto(); return false;">
                                <input class="form-control me-2" type="search" placeholder="Buscar producto..."
                                    id="busqueda">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody id="resultados">
                            <!-- Los resultados de la búsqueda se insertarán aquí -->
                        </tbody>
                    </table>
                </div>
                <script src="/js/search.js"></script>
            </main>
=======
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
>>>>>>> parent of 91ed860 (Merge branch 'main' of https://github.com/Daniel-Sequeira/PrograAvanzadaProyectoFinal)
        </div>
    </div>

    <div>
        <?php require  __DIR__ . '/../../layout/footer.php'?>
    </div>
</body>


</html>