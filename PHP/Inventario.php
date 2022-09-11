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
    $sql="SELECT * FROM ingreso_seguimiento";
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
    <li class="color_boton1"><a href="IngresoSeguimiento.php"><button >AGREGAR SEGUIMIENTO DE RECOLECTA</button></a></li>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del conductor</th>
            <th>Fecha de recoleccion</th>
            <th>Numero de placa</th>
            <th>Tipo de producto</th>
            <th>Nombre del cliente</th>
            <th>Cedula del cliente</th>
            <th>Foto</th>
            <th>Fecha creacion</th>
            <th>Fecha modificación</th>
            <th>Opciones</th>
        </tr>
        <tbody>
            <?php 
                while($fila=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $fila['id'] ?></td>
                <td><?php echo $fila['nombre_conductor'] ?></td>
                <td><?php echo $fila['fecha_ingreso'] ?></td>
                <td><?php echo $fila['numero_placa'] ?></td>
                <td><?php echo $fila['tipo_producto'] ?></td>
                <td><?php echo $fila['nombre_cliente'] ?></td>
                <td><?php echo $fila['cedula_cliente'] ?></td>
                <td><img style="width: 150px" src="data:image/jpg;base64, <?php echo base64_encode($fila['foto'])?>" alt=""></td>
                <td><?php echo $fila['created_at'] ?></td>
                <td><?php echo $fila['updated_at'] ?></td>
                <td>
                    <div class="hj"> <?php echo "<li><a href='EditarIngresoSeguimiento.php?id=".$fila['id']."'>EDITAR</a></li>";?></div>
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