<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link href="fontawesome/fontawesome-free-6.6.0-web/css/all.css" rel="stylesheet" />

<style>
       
        .btn-wsp{
            position: fixed;
            bottom: 40px;
            right: 100px;
            width: 100px;
            height: 100px;
            text-align: center;
            line-height: 60px;
            font-size: 24px;
            cursor: pointer;
        }
        .btn-wsp:hover{
            text-decoration: none;
            transform: scale(1.7);
            border-radius: 200px;
        }
        /* Estilo del menú de navegación */
        .navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            padding: 15px 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #004080;
            color: #ffcc00;
            border-radius: 5px;
        }

        /* Estilo del carrito */
        .navbar-nav .nav-item .nav-link i {
            margin-right: 8px;
        }

        .navbar-nav .nav-item .nav-link:hover i {
            color: #ffcc00;
        }
    </style>
    </head>
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav d-flex justify-content-end w-50">
           <li class="nav-item">
               <a class="nav-link" href="index.php">Inicio</a>
           </li>

           <li class="nav-item">
               <a class="nav-link" href="productos.php">Productos</a>
           </li>

           <li class="nav-item">
               <a class="nav-link" href="nosotros.php">Quienes somos</a>
           </li>
           <li class="nav-item">
                <a class="nav-link" href="carrito.php">
                     <i class="fa-solid fa-cart-shopping"></i> Carrito
                </a>
           </li>
       </ul>
   </nav>

   <div class="container">
    <br/><br/>
        <div class="row">