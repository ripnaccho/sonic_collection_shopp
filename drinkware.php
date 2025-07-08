<?php
session_start();

$productos = [
    ['id' => 6, 'nombre' => 'Taza Sonic', 'precio' => 2200, 'imagen' => 'img/tazita.jpg'],
    
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
  <title>Drinkware - Sonic Shop</title>
  <style>
    .producto {
      border: 1px solid #ccc;
      padding: 10px;
      margin: 15px auto;
      max-width: 300px;
      text-align: center;
      border-radius: 6px;
    }
    .producto img {
      width: 100%;
      max-width: 250px;
      border-radius: 4px;
    }
    .boton {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 14px;
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
  </style>
</head>
<body>
  <h2 style="text-align:center">Sección: Drinkware</h2>
  <?php foreach ($productos as $producto): ?>
    <div class="producto">
      <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" />
      <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
      <p>Precio: $<?= number_format($producto['precio'], 0, ',', '.') ?></p>
      <a href="?agregar=<?= $producto['id'] ?>" class="boton">Agregar al carrito</a>
    </div>
  <?php endforeach; ?>
  <div style="text-align:center; margin-top:20px;">
    <a href="index.php">Volver al inicio</a>
  </div>
</body>
</html>
