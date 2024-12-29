<?php include("../template/cabecera.php"); ?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$valor=(isset($_POST['valor']))?$_POST['valor']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/bd.php");


switch($accion){
    
        case "Agregar":
            # // todo el codigo de parametrizacion de la carga de imagenes y agregar un nuevo producto
            $sentenciaSQL= $conexion->prepare("INSERT INTO productos (nombre,valor,imagen) VALUES (:nombre,:valor,:imagen);");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);
            $sentenciaSQL->bindParam(':valor',$valor);

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if($tmpImagen!=""){

                    move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
            }

            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();
            header("location:productos.php");
            break;

        case "Modificar":
                $sentenciaSQL= $conexion->prepare("UPDATE productos SET Nombre=:Nombre WHERE ID=:ID");
                $sentenciaSQL->bindParam(':Nombre',$txtNombre);
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();

                $sentenciaSQL= $conexion->prepare("UPDATE productos SET Valor=:Valor WHERE ID=:ID");
                $sentenciaSQL->bindParam(':Valor',$valor);
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();

                if($txtImagen!=""){

                    $fecha= new DateTime();
                    $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                    $tmpImagen=$_FILES["$txtImagen"]["tmp_name"];

                    move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                    $sentenciaSQL= $conexion->prepare("SELECT Imagen FROM productos WHERE ID=:ID");
                    $sentenciaSQL->bindParam(':ID',$txtID);
                    $sentenciaSQL->execute();
                    $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                    if(isset($producto["Imagen"]) &&($producto["Imagen"]!="imagen.jpg")){

                        if(file_exists("../../img/".$producto["Imagen"])){

                        unlink("../../img/".$producto["Imagen"]);

                        }
                    }
                    $sentenciaSQL= $conexion->prepare("UPDATE productos SET Imagen=:Imagen WHERE ID=:ID");
                    $sentenciaSQL->bindParam(':Imagen',$nombreArchivo);
                    $sentenciaSQL->bindParam(':ID',$txtID);
                    $sentenciaSQL->execute();
                    
                }
                header("location:productos.php");

            
            break;

        case "Cancelar":
            header("location:productos.php");
            
            break;

        case "Seleccionar":
                $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE ID=:ID");
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtNombre=$producto['Nombre'];
                $valor=$producto['Valor'];
                $txtImagen=$producto['Imagen'];
                
                
            //echo "Presionado boton de Seleccionar";
            break;

        case "Borrar":

                $sentenciaSQL= $conexion->prepare("SELECT Imagen FROM productos WHERE ID=:ID");
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($producto["Imagen"]) &&($producto["Imagen"]!="imagen.jpg")){

                    if(file_exists("../../img/".$producto["Imagen"])){

                        unlink("../../img/".$producto["Imagen"]);

                    }
                }



                $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE ID=:ID");
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();
                header("location:productos.php");
            //echo "Presionado boton de Borrar";
            break;



}

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de productos
        </div>

        <div class="card-body">
            
        <form method="POST" enctype="multipart/form-data" >

    <div class = "form-group">
    <label for="txtID">ID</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="Id">
    </div>

    <div class = "form-group">
    <label for="txtnombre">Nombre</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del libro">
    </div>

    <div class = "form-group">
    <label for="valor">Valor</label>
    <input type="number" required  class="form-control" value="<?php echo $valor;?>" name="valor" id="valor" placeholder="Digite el valor">
    </div>

    <div class = "form-group">
    <label for="txtnombre">Imagen</label>

    <br/>

    <?php if($txtImagen!=""){ ?>

        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="50" alt="" srcset="">


    <?php       } ?>



    


    <input type="file"  class="form-control" name="txtImagen" id="txtImagen" placeholder="">
    </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

    </form>

        </div>

    </div>

   
   
   
   
   
</div>


<div class="col-md-7">

   <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Producto</th>
            <th>Valor</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($listaproductos as $productos) {?>
        <tr>
            <td><?php echo $productos['ID']; ?></td>
            <td><?php echo $productos['Nombre']; ?></td>
            <td><?php echo $productos['Valor']; ?></td>
            <td>
                
            <img class="img-thumbnail rounded" src="../../img/<?php echo $productos['Imagen']; ?>" width="50" alt="" srcset="">
            
            <td>
            
            <td>
            
            <form method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $productos['ID']; ?>" />

                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

            </form>
        
            
            </td>

        </tr>
        <?php } ?>
    </tbody>
   </table>


</div>

<?php include("../template/pie.php"); ?>

