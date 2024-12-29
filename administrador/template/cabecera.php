<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("location:../index.php");
  }else{

      if($_SESSION['usuario']=="ok"){
        $nombreusuario=$_SESSION["nombreUsuario"];

      }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
          
               
        }

        .navbar {
            margin-bottom: 200px;
            
            
            
          
           
        }

        .nav-link {
            font-weight: bold;
            text-transform: uppercase;
            
            
            
            
        }

        .nav-link:hover {
            color: #fff;
            border-radius: 2000px;
            
        }

        .navbar-nav .nav-item:not(:last-child) {
            margin-right: 100px;
            
            
        }
    </style>
  </head>
  <body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/SitiowebRebocol"?>


    <nav class="navbar navbar-expand navbar-light bg-primary">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link" href="<?php echo $url;?>/Administrador/inicio.php">Inicio</a>
            
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/productos.php">Productos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar Seccion</a>

            <a class="nav-item nav-link" href="<?php echo $url;?>">Pagina Web</a>
        </div>
    </nav>
        <div class="container">
        <br/>    
            <div class="row">