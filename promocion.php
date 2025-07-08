<?php
session_start();

$productos = [
    ['id' => 1, 'nombre' => 'Promoción Coleccionista', 'precio' => 150000, 'imagen' => 'img/promosito.png']
];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['agregar'])) {
    $idAgregar = (int)$_GET['agregar'];
    foreach ($productos as $producto) {
        if ($producto['id'] === $idAgregar) {
            $en_carrito = false;
            foreach ($_SESSION['carrito'] as $item) {
                if ($item['id'] === $producto['id']) {
                    $en_carrito = true;
                    break;
                }
            }
            if (!$en_carrito) {
                $_SESSION['carrito'][] = $producto;
            }
            break;
        }
    }
    header("Location: carrito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Promoción Coleccionista - Sonic Shop</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
      margin: 40px auto;
      padding: 20px;
      border: 1px solid #ccc;
      text-align: center;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .container img {
      width: 100%;
      max-width: 300px;
      border-radius: 6px;
    }
    .boton {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 18px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .boton:hover {
      background-color: #0056b3;
    }
    .volver {
      margin-top: 25px;
      display: block;
      color: #007bff;
      text-decoration: none;
      font-weight: 600;
    }
    .volver:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Sección: Promoción</h2>
    <img src="img/promosito.png" alt="Promoción Coleccionista" />
    <h3>Promoción Coleccionista</h3>
    <p>Precio: $150,000</p>
    <a href="?agregar=1" class="boton">Agregar al carrito</a>
    <a href="index.php" class="volver">Volver al inicio</a>
  </div>
</body>
</html>
