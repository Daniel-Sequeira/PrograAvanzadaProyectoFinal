<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Zapatería SM</title>
</head>

<body>
    <?php require __DIR__ . '/../../layout/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php require  __DIR__ . '/../../layout/sidebar.php'?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="h2">Dashboard</h1>
                <div class="container">
                    <!-- Buscador -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form class="d-flex" onsubmit="buscarProducto(); return false;">
                                <input class="form-control me-2" type="search" placeholder="Buscar producto..." id="busqueda">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>

                    <!--Tabla de productos -->
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
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-productos">
                                <!-- Ejemplo de fila -->
                                <tr>
                                    <td>001</td>
                                    <td>Nike</td>
                                    <td>Zapatillas deportivas</td>
                                    <td>42</td>
                                    <td>$75.00</td>
                                    <td>10</td>
                                    <td>13%</td>
                                    <td><button class="btn btn-success btn-sm">Agregar al carrito</button></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <script src="/js/search.js"></script>
            </main>
        </div>

        <?php require  __DIR__ . '/../../layout/footer.php'?>
</body>

</html>