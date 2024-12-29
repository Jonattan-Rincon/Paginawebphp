<?php
session_start();
include("administrador/config/bd.php");

// Verificar si se recibió un ID de producto
if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

    // Consultar la información del producto en la base de datos
    $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE ID = :id");
    $sentenciaSQL->bindParam(':id', $idProducto);
    $sentenciaSQL->execute();
    $producto = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // Agregar el producto al carrito
        $nombreProducto = $producto['Nombre'];
        $precioProducto = $producto['Valor'];
        $cantidadProducto = 1;  // Cantidad por defecto

        agregarAlCarrito($idProducto, $nombreProducto, $cantidadProducto, $precioProducto);

        // Redirigir al usuario de nuevo a la página del carrito
        header("Location: carrito.php");
        exit();
    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "No se recibió un ID de producto.";
}

// Función para agregar un producto al carrito
function agregarAlCarrito($idProducto, $nombreProducto, $cantidad, $precio) {
    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];
    } else {
        $carrito = array();
    }

    if (isset($carrito[$idProducto])) {
        $carrito[$idProducto]['cantidad'] += $cantidad;
    } else {
        $carrito[$idProducto] = array(
            'nombre' => $nombreProducto,
            'cantidad' => $cantidad,
            'precio' => $precio
        );
    }

    $_SESSION['carrito'] = $carrito;
}
