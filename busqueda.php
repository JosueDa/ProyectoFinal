<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include "header.php"
    ?>

    <div class="container padding-home padd">
        <h2 class="display-4 font-weight-bold naranja"> Resultado de la búsqueda</h2>
            <div class="row">
             <?php
                include "php/conexion.php";
                if(isset($_POST['update'])){
                    $palabra= "%".$_POST['buscar']."%";
                $stmt = $pdo->prepare('SELECT * FROM restaurante.producto where nombre like :buscar or descripcion like :buscar2');
                $stmt->execute(array(
                    ':buscar' => $palabra,
                    ':buscar2' => $palabra
                    ));
                $busqueda=$stmt->fetchAll();
                foreach($busqueda as $fila):
                ?>      
                    <div class="col-lg-4 col-md-6 col-sm-12 padd">
                        <img class="adapt-img limite"  src='data:image/<?php echo $fila['tipo_imagen'];?>; base64,<?php echo base64_encode($fila['imagen']) ?> ' alt="">
                        <div class="text-light ">
                            <h2> <?php echo $fila['nombre'];?>  </h2>
                            <hr>
                            <?php echo $fila['descripcion'];?>
                            <div class="padd"> 
                                <div class="float-left">
                                    <span class="precio">Q <?php echo $fila['precio'];?></span>
                                </div>    
                                    <?php if(isset($_SESSION['rol'])){ ?>
                                        <a class="float-right btn btn-light" href="ordenarP.php?idP=<?php echo $fila['id_producto']; ?>">Ordenalo</a>            
                                    <?php   }; ?>
                                                
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach ?> 

                <?php }; ?> 
            </div>
        
        
            
   </div>

   <?php
          include "footer.php"
            ?>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <script src="js/main.js"></script>

  </body> 

</html>