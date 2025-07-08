<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['eliminar'])) {
    $idEliminar = (int)$_GET['eliminar'];
    foreach ($_SESSION['carrito'] as $key => $item) {
        if ($item['id'] === $idEliminar) {
            unset($_SESSION['carrito'][$key]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            break;
        }
    }
    header("Location: carrito.php");
    exit();
}

if (isset($_GET['vaciar'])) {
    $_SESSION['carrito'] = [];
    header("Location: carrito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Carrito - Sonic Shop</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 700px;
      margin: 40px auto;
      padding: 20px;
    }
    .producto {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 15px;
      border-radius: 6px;
    }
    .producto img {
      width: 100px;
      border-radius: 5px;
    }
    .detalle {
      flex-grow: 1;
    }
    .precio {
      font-weight: bold;
    }
    .boton-eliminar, .boton-vaciar, .boton-comprar {
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s ease;
      color: white;
      display: inline-block;
      margin-right: 10px;
    }
    .boton-eliminar {
      background-color: #dc3545;
    }
    .boton-eliminar:hover {
      background-color: #a71d2a;
    }
    .boton-vaciar {
      background-color: #dc3545;
    }
    .boton-vaciar:hover {
      background-color: #a71d2a;
    }
    .boton-comprar {
      background-color: #28a745;
    }
    .boton-comprar:hover {
      background-color: #1e7e34;
    }
    .volver {
      display: inline-block;
      margin-top: 20px;
      color: #007bff;
      text-decoration: none;
      font-weight: 600;
    }
    .volver:hover {
      text-decoration: underline;
    }
    .total {
      font-weight: bold;
      font-size: 1.2em;
      margin-top: 15px;
      text-align: right;
    }
  </style>
</head>
<body>
  <h2>Carrito de Compras</h2>

  <?php if (empty($_SESSION['carrito'])): ?>
    <p>Tu carrito está vacío.</p>
  <?php else: ?>
    <?php
      $total = 0;
      foreach ($_SESSION['carrito'] as $item):
        $total += $item['precio'];
    ?>
      <div class="producto">
        <img src="<?= htmlspecialchars($item['imagen']) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>" />
        <div class="detalle">
          <h3><?= htmlspecialchars($item['nombre']) ?></h3>
          <p class="precio">Precio: $<?= number_format($item['precio'], 0, ",", ".") ?></p>
        </div>
        <a href="?eliminar=<?= $item['id'] ?>" class="boton-eliminar" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
      </div>
    <?php endforeach; ?>
    <p class="total">Total: $<?= number_format($total, 0, ",", ".") ?></p>
    <a href="?vaciar=1" class="boton-vaciar" onclick="return confirm('¿Vaciar todo el carrito?')">Vaciar carrito</a>
    <a href="compra_exitosa.php" class="boton-comprar" onclick="return confirm('¿Confirmas la compra?')">Comprar</a>
  <?php endif; ?>

  <a href="index.php" class="volver">Volver al inicio</a>
</body>
</html>
