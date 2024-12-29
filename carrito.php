<?php include("template/cabecera.php"); ?>


<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
    
    <h1>Carrito de Compras</h1>
    <?php if (empty($_SESSION['carrito'])): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
                <li>
                    <?php echo $producto['nombre']; ?> - $<?php echo number_format($producto['precio'], 2); ?> x <?php echo $producto['cantidad']; ?>
                    <a href="eliminar.php?id=<?php echo $id; ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total: $<?php echo number_format(array_sum(array_map(function ($producto) {
            return $producto['precio'] * $producto['cantidad'];
        }, $_SESSION['carrito'])), 2); ?></p>
    <?php endif; ?>
        <a href="pagar.php" class="btn btn-primary">Pagar</a>
        </br>
        </br>
        </br>
        <a href="productos.php">Volver a Productos</a>
</body>
</html>
<?php include("template/pie.php"); ?>