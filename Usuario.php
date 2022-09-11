<?php

    session_start();

    if(!isset($_SESSION['usuarios'])){
        echo '
            <script>
                alert("Por favor inice sesión");
                window.location = "Login.php"
            </script>    
        ';
        session_destroy();
        die();
    }
    include 'conexion.php';

   
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
    <link rel="stylesheet" href="CSS/Diseño-Admi.css">
    <link rel="stylesheet" href="CSS/UsuariosTable.css">  

</head>
<body>
   <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="#" class="enlace">
            <img src="IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>
            <li><a href="PHP/Editar_Perfil.php">perfil</a></li>
            <li><a href="PHP/Cerrar_Sesion.php">cerrar sesion</a></li>
        </ul>
    </nav>
    <section></section>
    <h1>SEGUIMIENTO</h1>
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
                <td>
                    <div class="hj"> <?php echo "<li><a href='/aplicativo/PHP/ImprimirFactura.php?id=".$fila['id']."'>Imprimir Factura</a></li>";?></div>
                    <br>
                </td>
            </tr>
            <?php 
                }
            ?>

            </tbody>
    </table>
</body>
</html>