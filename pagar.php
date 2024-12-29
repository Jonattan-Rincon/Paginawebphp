<?php
session_start();

if (empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit;
}

// Verificar si se ha enviado el formulario de pago
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $monto = array_sum(array_map(function ($producto) {
        return $producto['precio'] * $producto['cantidad'];
    }, $_SESSION['carrito']));

    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datosclientes";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO pagos (nombre, apellidos, correo, telefono, direccion, ciudad, monto) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssd", $nombre, $apellidos, $correo, $telefono, $direccion, $ciudad, $monto);

    if ($stmt->execute()) {
        echo "Pago realizado con éxito. Gracias, " . htmlspecialchars($nombre) . "!";

        // Vaciar el carrito después del pago
        unset($_SESSION['carrito']);
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Mostrar el formulario de pago
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Pagar</title>
    </head>
    <body>
        <h1>Formulario de Pago</h1>
        <form action="pagar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="telefono">Telefono:</label>
            <input type="num" id="correo" name="correo" required><br><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="telefono" name="telefono" required><br><br>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required><br><br>

            <p>Total a Pagar: $<?php echo number_format(array_sum(array_map(function ($producto) {
                return $producto['precio'] * $producto['cantidad'];
            }, $_SESSION['carrito'])), 2); ?></p>

            <input type="submit" value="Confirmar Pago">
        </form>
        <a href="carrito.php">Volver al Carrito</a>
    </body>
    </html>
    <?php
}
?>
