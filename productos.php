<?php 
include("template/cabecera.php"); 
?>
<style>
    .card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .card-img-top {
        width: 100%;
        height: 300px; /* Ajusta la altura según tus necesidades */
        object-fit: cover; /* Asegura que la imagen cubra el contenedor */
    }
    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-title {
        margin: 0;
    }
    .btn {
        margin-top: auto; /* Empuja el botón al final del card-body */
    }
</style>


<?php
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($listaproductos as $producto) { ?>

<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $producto['Imagen']; ?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $producto['Nombre']; ?></h4>
            <h4 class="card-title">$<?php echo number_format($producto['Valor'], 2); ?></h4>
            <a href="agregar.php?id=<?php echo $producto['ID']; ?>" class="btn btn-primary">Agregar al carrito</a>
        </div>
    </div>
</div>

<?php } ?>








<?php include("template/pie.php"); ?>