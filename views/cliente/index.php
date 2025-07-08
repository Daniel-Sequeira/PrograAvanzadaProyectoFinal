<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Login - Biblioteca</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
</head>
 <main class="form-signin w-100 m-auto">
    <h2>Registro de Clientes</h2>
<form action="guardar_cliente.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" required><br><br>

    <label for="cedula">Cédula:</label>
    <input type="text" id="cedula" name="cedula" required><br><br>

    <label for="estado">Estado:</label>
    <select id="estado" name="estado" required>
        <option value="">Seleccione</option>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select><br><br>

    <button type="submit">Guardar</button>
</form>
 </main>