<?php
session_start();

if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    
    if (isset($_SESSION['carrito'][$idProducto])) {
        unset($_SESSION['carrito'][$idProducto]);
    }
}

// Redirigir de nuevo al carrito
header("Location: carrito.php");
exit();
?>
