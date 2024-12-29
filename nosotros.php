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
        text-align: justify;
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
        text-align: justify;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
<div class="jumbotron">
    <h1 class="display-3">Hola</h1>
    <p class="lead">Rebocol es una empresa comercializadora de todo tipo de vinipel, en difrentes tamaños y colores</p>
    <hr class="my-2">
    <br/>
    <p> Misión:
        En Rebocol, nuestra misión es proporcionar soluciones de empaque innovadoras y de alta calidad que satisfagan las necesidades de nuestros clientes. Nos dedicamos a ofrecer productos de vinipel que protegen, conservan y optimizan la presentación de los bienes, asegurando eficiencia y sostenibilidad en cada etapa del proceso. Comprometidos con la excelencia, trabajamos constantemente en mejorar nuestros procesos y servicios para superar las expectativas de nuestros clientes y contribuir al crecimiento de sus negocios.</p>
        <br/>
        <img width="600" src="Imagenes/Imagenvista2.png" class="img-thumbnail rounded mx-auto d-block" />
                <br/>
                <br/>
                <p> Visión:
                    Ser reconocidos como líderes en el mercado de empaques plásticos, destacándonos por nuestra innovación, calidad y compromiso con la sostenibilidad. Aspiramos a expandir nuestra presencia global, estableciendo estándares de excelencia en la industria y promoviendo prácticas ecológicas que beneficien tanto a nuestros clientes como al medio ambiente. En Plásticos Vinipel, nos esforzamos por ser el socio preferido de las empresas que buscan soluciones de empaque confiables y eficientes, impulsando un futuro más seguro y sostenible para todos.</p>
                    <br/>
                    <p class="lead">
                    <a class="btn btn-primary btn-lg" href="productos.php" role="button">Comprar Vinipel</a>
                
                </p>
                <br/>
                <br/>

</div>



<?php include("template/pie.php"); ?>