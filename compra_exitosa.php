<?php
session_start();
// Vaciar carrito tras compra
$_SESSION['carrito'] = [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Compra Exitosa - Sonic Shop</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin-top: 100px;
      color: #28a745;
    }
    h1 {
      font-size: 3em;
    }
    p {
      font-size: 1.5em;
    }
    a {
      display: inline-block;
      margin-top: 30px;
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>¡Compra realizada con éxito!</h1>
  <p>Gracias por tu compra en Sonic Shop.</p>
  <a href="index.php">Volver al inicio</a>
</body>
</html>
