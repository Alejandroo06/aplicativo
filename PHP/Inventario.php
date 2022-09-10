<?php

    session_start();

    if(!isset($_SESSION['administrador'])){
        echo '
            <script>
                alert("Por favor inice sesión");
                window.location = "../Login.php"
            </script>    
        ';
        session_destroy();
        die();
    }

    include 'conexion.php';
    //SELECT * FROM producto
    $sql="SELECT * FROM producto";
    $resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miscelanea Isabella</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Inventario.css">
    <script type="text/JavaScript">
        function confirmar(){
            return confirm('¿Estas seguro de eliminar este Producto?, se eliminaran todos los datos');
        }
    </script>
</head>
<body>
   <nav class="menu">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="../Administrador.php" class="enlace">
            <img src="../IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>
            <li><a href="Admi_Usuarios.php">administrar usuarios</a></li>
            <li><a href="#">administrar pedidos</a></li>
            <li><a href="#">inventario</a></li>
            <li><a href="Cerrar_Sesion.php">cerrar sesion</a></li>
        </ul>
        
    </nav>


    <h1 class="col">INVENTARIO</h1>

    <main> <li class="bt"><a class="tb" href="Funcion_Inventario.php">AGREGAR PRODUCTO</a></li> </main>


    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Sub Categoria</th>
            <th>Foto</th>
            <th>Precio</th>
        </tr>
        <tbody>
            <?php 
                while($fila=mysqli_fetch_assoc($resultado)){
            
            ?>
            <tr>
                <td><?php echo $fila['id'] ?></td>
                <td><?php echo $fila['nombre_producto'] ?></td>
                <td><?php echo $fila['cantidad'] ?></td>
                <td><?php echo $fila['descripción'] ?></td>
                <td><?php echo $fila['categorias'] ?></td>
                <td><?php echo $fila['sub_categorias'] ?></td>
                <td><img style="width: 150px" src="data:image/jpg;base64, <?php echo base64_encode($fila['foto'])?>" alt=""></td>
                <td><?php echo $fila['precio'] ?></td>
                <td>
                    <div class="hj"> <?php echo "<li><a href='Editar_Producto.php?id=".$fila['id']."'>EDITAR</a></li>";?></div>
                    <br>
                    <br>
                    <div class="jh"> <?php  echo "<li><a href='Eliminar_Inventario.php?id=".$fila['id']."' onclick='return confirmar()'>ELIMINAR</a></li>";?></div>

                </td>
            </tr>
            <?php 
                }
            ?>

            </tbody>
    </table>
    
    
</body>
</html>