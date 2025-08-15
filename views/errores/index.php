<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error 404</title>
</head>
<body>
    <?php require (__DIR__ . '/../../layout/header.php') ?>
     <h1>Error 404</h1>
    <h2><?php echo $this->mensaje_error; ?></h2>
    <?php require (__DIR__ . '/../../layout/footer.php')?>
</body>
</html>