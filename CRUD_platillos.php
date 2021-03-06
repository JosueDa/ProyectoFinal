<?php
 session_start();
 if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 2){
    header("location: login.php");
 };
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

  <div >
    <div class="register">
    
    <div class="padd2">
    <h2 class=" float-left col-lg-6 col-md-3">Listado de productos</h2>
      <a class="btn btn-secondary " href="agregarP.php"> Agregar producto</a>
      <a class="btn btn-secondary " href="platillosfav.php"> Platillos favoritos</a>
      <a class="btn btn-secondary " href="top10.php"> Top 12 </a>

    </div>

      <div class="adapt-table padd">
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th >Id </th>
              <th >Nombre</th>
              <th >Descripción</th>
              <th >Precio</th>
              <th >Tiempo de preparación</th>
              <th >Tipo de imagen</th>
              <th>imagen</th>
              <th COLSPAN="2"> Acciones</th>
              
              
            </tr>
          </thead>
          <tbody>
            
              <th scope="row">
              </th>
              <?php
                  include "php/conexion.php";
                  $stmt = $pdo->prepare('SELECT * FROM restaurante.producto');
                  $stmt->execute();
                  $resultado=$stmt->fetchAll();
                  foreach($resultado as $fila):?>
              <tr>
              <td><?php echo $fila['id_producto'];?></td>
              <td><?php echo $fila['nombre'];?></td>
              <td><?php echo $fila['descripcion'];?></td>
              <td><?php echo $fila['precio'];?></td>
              <td><?php echo $fila['tiempo_preparacion'];?></td>
              <td><?php echo $fila['tipo_imagen'];?></td>
              <td><img class="adapt-img limite3"  src='data:image/jpg; base64,<?php echo base64_encode($fila['imagen']) ?> ' alt=""></td>
              <td>
                  <a href="individual.php?idP=<?php echo $fila['id_producto']; ?>"  class="btn btn-block btn-sm btn-outline-info" >Ver</a>
                  <a href="ingreXpro.php?id=<?php echo $fila['id_producto']; ?>" class="btn btn-block btn-sm btn-outline-success">Ingredientes</a>
              </td>
              <td>
                <a href="delete.php?idP=<?php echo $fila['id_producto']; ?>" class="btn btn-block btn-sm btn-outline-danger">Delete</a>
                <a href="updateP.php?id=<?php echo $fila['id_producto']; ?>"  class="btn btn-block btn-sm btn-outline-info" >Update</a>
              </td>
              
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

<?php
          include "footer.php"
            ?>

</body>

</html>