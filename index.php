<?php include("template/cabecera.php"); ?>

<style>
      /* Estilos para el contenedor principal */
      .jumbotron {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .jumbotron h1 {
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
        color: #343a40;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .jumbotron p.lead {
        font-size: 1.25rem;
        color: #6c757d;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .jumbotron img {
        transition: transform 0.3s ease;
        border-radius: 10px;
    }

    .jumbotron p {
        font-family: 'Open Sans', sans-serif;
        color: #495057;
        line-height: 1.6;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    /* Efecto de aumento al pasar el cursor */
    .jumbotron h1:hover,
    .jumbotron p:hover,
    .jumbotron p.lead:hover {
        transform: scale(1.05);
        color: #007bff;
    }

    .jumbotron img:hover {
        transform: scale(1.1);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
    <div class="container">
        <div class="row">

            <div class="jumbotron">
                <h1 class="display-3">Bienvenidos a Rebocol</h1>
                <p class="lead">¡Bienvenido a Rebocol! Somos tu socio confiable para todas tus necesidades de envolturas plásticas. Aquí encontrarás una amplia gama de productos de alta calidad diseñados para proteger y conservar tus productos de manera eficiente y segura. Explora nuestra selección y descubre cómo podemos ayudarte a optimizar tu empaque. ¡Gracias por visitarnos y confiar en nosotros!</p>
                <hr class="my-2">
            <br/>
            <img width="400" src="Imagenes/Imagenvista.png" class="img-thumbnail rounded mx-auto d-block" />
                <br/>
                <br/>
                <p>Nuestra empresa, Rebocol, se encuentra estratégicamente ubicada en la vibrante ciudad de Medellín, corazón industrial y comercial de Colombia. Situados en el Valle de Aburrá, gozamos de una excelente accesibilidad y conectividad, lo que nos permite atender de manera eficiente a nuestros clientes tanto en la ciudad como en sus alrededores. Esta privilegiada ubicación nos facilita el suministro ágil y oportuno de nuestros productos de alta calidad, garantizando un servicio excepcional en toda la región. ¡Visítanos y descubre cómo podemos satisfacer tus necesidades de empaque con la mejor atención y profesionalismo!</p>
                <br/>
                <br/>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="productos.php" role="button">Comprar Vinipel</a>
                </p>
            </div>

<?php include("template/pie.php"); ?>




      